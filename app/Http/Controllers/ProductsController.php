<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Product::all();

        return view('products.all', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'photo_url' => 'nullable|image'
        ]);

        $product = new \App\Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        if ($request->hasFile('photo_url')) {
            $product->photo_url = $request->file('photo_url')->store('public/products');
        }
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = \App\Product::find($id);

        return view('products.single', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = \App\Product::find($id);

        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required|string|max:100',
           'price' => 'required|numeric',
           'photo_url' => 'nullable|image'
        ]);

        $product = \App\Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');

        if ($request->hasFile('photo_url')) {
            Storage::delete($product->photo_url);
            $product->photo_url = $request->file('photo_url')->store('public/products');
        }elseif ($request->has('delete_photo')) {
            Storage::delete($product->photo_url);
            $product->photo_url = null;
        }

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = \App\Product::find($id);
        Storage::delete($product->photo_url);
        $product->delete();

        return redirect()->route('products.index');
    }
}
