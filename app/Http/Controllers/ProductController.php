<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();

        return view('products.index', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'stok' => 'required',
            'price' => 'required|integer'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'stok' => $request->stok,
            'price' => $request->price
        ]);
        return redirect(route('product.index'))->with('success', 'New Car Added!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'stok' => 'required',
            'price' => 'required|integer'
        ]);

        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'stok' => $request->stok,
            'price' => $request->price
        ]);
        return redirect(route('product.index'))->with('success', 'Car Updated!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect(route('product.index'))->with('success', 'Car Deleted!');
    }
}
