<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class CartController extends Controller
{   
    public function cartIndex(User $user)
    {   
        $cart = session()->get('cart', []);
        return view('cart', compact('user', 'cart'));
    }

    public function add(Request $request)
    {
        $article = Article::findOrFail($request->article_id);

        $cart = session()->get('cart', []);

        if(isset($cart[$article->id])) {
            $cart[$article->id]['quantity']++;
        } else {
            $cart[$article->id] = [
                "name" => $article->title,
                "quantity" => 1,
                "price" => $article->price,
                "image" => $article->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'articolo aggiunto al carrello');

    }
}
