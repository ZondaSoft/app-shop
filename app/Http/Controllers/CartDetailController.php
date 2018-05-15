<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\CartDetail;

class CartDetailController extends Controller
{
    // Store
    public function store(Request $request)
    {
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;       // era cart_id
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

    	$notification = 'El producto se agrego exitosamente al carrito de compras.';
        return back()->with(compact('notification'));
    }


    public function destroy(Request $request)
    {
        $cartDetail = CartDetail::find($request->cart_detail_id);
        
        // Verificacion de seguridad para que el User solo pueda borrar SU carrito ACTIVO
        if ($cartDetail->cart_id == auth()->user()->cart->id)
            $cartDetail->delete();

        $notification = 'El producto se ha eliminado del carrito de compras.';
        return back()->with(compact('notification'));
    }
}
