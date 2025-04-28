<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    // Visualizza il profilo dell'utente
    public function profile()
    {
        $user = Auth::user();
        $articles = $user->articles;

        return view('profile', compact('user', 'articles'));
    }

    // Aggiorna i dati dell'utente, incluso il profilo e l'immagine
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validazione dei dati
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female,other',
            'birth_date' => 'nullable|date',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Nuovi campi
            'phone' => 'nullable|string|max:15', // Numero di telefono
            'biography' => 'nullable|string|max:1000', // Biografia
            'linkedin' => 'nullable|url|max:255', // URL LinkedIn
            'twitter' => 'nullable|url|max:255', // URL Twitter
            'website' => 'nullable|url|max:255', // URL del sito web
        ]);

        // Aggiornamento dei dati dell'utente
        $user->name = $validated['name'];
        $user->surname = $validated['surname'] ?? null;
        $user->gender = $validated['gender'] ?? null;
        $user->birth_date = $validated['birth_date'] ?? null;
        $user->email = $validated['email'];

        // Se è presente un'immagine di profilo, aggiorna il campo
        if ($request->hasFile('profile_image')) {
            // Elimina la vecchia immagine, se esiste
            if ($user->profile_image) {
                Storage::delete('public/'.$user->profile_image);
            }

            // Carica la nuova immagine
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }

        // Aggiornamento dei nuovi campi
        $user->phone = $validated['phone'] ?? null;
        $user->biography = $validated['biography'] ?? null;
        $user->linkedin = $validated['linkedin'] ?? null;
        $user->twitter = $validated['twitter'] ?? null;
        $user->website = $validated['website'] ?? null;

        // Salva le modifiche nel database
        $user->save();

        // Redirige con un messaggio di successo
        return redirect()->route('profile')->with('success', 'Profilo aggiornato con successo!');
    }

    // Visualizza la pagina per creare un nuovo articolo
    public function createArticle()
    {
        return view('create.article'); // View per creare un nuovo articolo
    }

    // Salva un nuovo articolo
    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $user = Auth::user();
        $article = new Article;
        $article->user_id = $user->id;
        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->save();

        return redirect()->route('profile')->with('success', 'Articolo creato con successo!');
    }

    public function editPassword(Request $request)
    {
        $remainingAttempts = $request->input('remaining_attempts', 3); // Default a 3 se non passato

        return view('password-edit', compact('remainingAttempts'));
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Recupera i tentativi rimanenti dalla sessione, se non presenti imposta 3
        $remainingAttempts = session('remaining_attempts', 3);

        // Controlla se sono passati più di 15 minuti dall'ultimo tentativo
        if ($user->last_attempt) {
            $lastAttempt = Carbon::parse($user->last_attempt);
            if ($lastAttempt->diffInMinutes(now()) > 15) {
                // Resetta il contatore dei tentativi nel database e nella sessione
                $user->last_attempt = null;
                $user->save();
                session(['remaining_attempts' => 3]);
            }
        }

        // Se l'utente ha esaurito i tentativi, non consentire più il tentativo
        if ($remainingAttempts <= 0) {
            return back()->withErrors(['error' => 'Hai esaurito i tentativi. Riprova più tardi.']);
        }

        // Validazione della password
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        // Verifica la password attuale
        if (! Hash::check($validated['current_password'], $user->password)) {
            // Decrementa i tentativi rimanenti e salvalo nella sessione
            session(['remaining_attempts' => $remainingAttempts - 1]);

            // Salva l'ora dell'ultimo tentativo nel database
            $user->last_attempt = now();
            $user->save();

            // Ritorna con errore e mostra i tentativi rimanenti
            return back()->withErrors(['current_password' => 'La password attuale non è corretta.'])
                ->with('remainingAttempts', $remainingAttempts - 1); // Passa i tentativi aggiornati alla vista
        }

        // Se la password è corretta, aggiorna la password e resetta i tentativi
        $user->password = Hash::make($validated['new_password']);
        $user->last_attempt = null; // Resetta il tempo dell'ultimo tentativo
        $user->save();

        // Resetta i tentativi rimanenti a 3
        session(['remaining_attempts' => 3]);

        return redirect()->route('profile')->with('status', 'Password aggiornata con successo!');
    }

    public function deleteAccount(Request $request)
    {
        // Conferma che l'utente ha effettuato l'accesso
        if (Auth::check()) {
            $user = Auth::user();

            // Elimina l'utente
            $user->delete();

            // Effettua il logout dell'utente
            Auth::logout();

            // Reindirizza alla home page con un messaggio di successo
            return redirect()->route('homepage')->with('success', __('ui.account_deleted_successfully'));
        }

        // In caso di errore, rimanda all'home
        return redirect()->route('homepage')->with('error', __('ui.error_deleting_account'));
    }
}
