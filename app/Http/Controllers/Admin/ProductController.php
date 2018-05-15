<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	public function index()
	{
		$products = Product::paginate(5);
		return view('admin.products.index')->with(compact('products'));	// Listado
	}


	public function create()
	{
		return view('admin.products.create')->with(compact('products'));	// Abrir form de alta
	}


	public function store(Request $request)
	{
		// Validaciones
		$messages = [
			'name.required'=>'El nombre es obligatorio',
			'name.min'=>'El nombre es obligatorio',
			'price.min'=>'El precio debe cer mayor o igual a cero...'
			];

		$rules = [
			'name'=>'required|min:3',
			'description'=>'required|max:200',
			'price'=>'numeric|min:0'
			];
		
		$this->validate($request, $rules, $messages);
		// Grabar en bbdd los cambios del form de alta
		// dd($request->all());

		$product = new Product();
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->description = $request->input('description');
		$product->long_description = $request->input('long_description');
		$product->save();   // INSERT INTO - SQL
		return redirect('/admin/products');

	}


	public function edit($id)
	{
		// return "Mostrar form de edit $id";
		$product = Product::find($id);
		return view('admin.products.edit')->with(compact('product'));	// Abrir form de modificacion
	}

	public function update(Request $request, $id)
	{
		// Validaciones
		$messages = [
			'name.required'=>'El nombre es obligatorio',
			'name.min'=>'El nombre es obligatorio',
			'price.min'=>'El precio debe cer mayor o igual a cero...'
			];

		$rules = [
			'name'=>'required|min:3',
			'description'=>'required|max:200',
			'price'=>'numeric|min:0'
			];
		
		$this->validate($request, $rules, $messages);


		// Grabar en bbdd los cambios del form de alta
		// dd($request->all());
		$product = Product::find($id);
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->description = $request->input('description');
		$product->long_description = $request->input('long_description');
		$product->save();   // UPDATE - SQL
		return redirect('/admin/products');

	}


	public function destroy($id)
	{
		// dd($request->all());

		$product = Product::find($id);
		$product->delete();   // DELETE-SQL
		return back();	// redirect('/admin/products');

	}
}
