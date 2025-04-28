<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ThrottlePasswordAttempts
{
    public function handle(Request $request, Closure $next)
    {
        $key = $this->throttleKey($request);

        $maxAttempts = 3; // Numero massimo di tentativi
        $decayMinutes = 15; // Tempo di attesa dopo il blocco (minuti)

        // Controllo se i tentativi sono esauriti
        if (Cache::has($key) && Cache::get($key) >= $maxAttempts) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Troppi tentativi, riprova più tardi.'])
                ->withInput();
        }

        // Calcola i tentativi rimanenti
        $remainingAttempts = $maxAttempts - Cache::get($key, 0);

        // Passa il numero di tentativi rimanenti tramite sessione o variabile
        session()->flash('remaining_attempts', $remainingAttempts);

        // Incrementa i tentativi
        Cache::increment($key);

        // Imposta il blocco dei tentativi
        if (! Cache::has($key)) {
            Cache::put($key, 1, now()->addMinutes($decayMinutes));
        }

        return $next($request);
    }

    protected function throttleKey(Request $request)
    {
        return 'password_attempts:'.$request->ip(); // Identifica l'utente tramite IP
    }
}
