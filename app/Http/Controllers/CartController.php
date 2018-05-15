<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart -> status = "Pending";
    	$cart -> save();	// UPDATE SQL
    	
    	$notification = "Tu pedido de compra se registro correctamente, te contactaron por e-mail !";
    	return back()->with(compact('notification'));
    }
}
