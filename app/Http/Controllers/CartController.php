<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartIndex(User $user)
    {
        return view('cart', compact('user'));
    }
}
