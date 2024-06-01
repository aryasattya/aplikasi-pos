<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;;

use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $query = Products::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('quantity', 'like', '%' . $search . '%')
                ->orWhere('category_id', 'like', '%' . $search . '%');


        }

        $title = 'Daftar Produk';
        $products = $query->with('category')->get();

        return view('products.index', compact('products', 'title'));
    }

    public function create()
    {

        $categories = Categories::all();
        $title = 'Tambah Produk';
        return view('products.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Buat produk baru
        Products::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product berhasil ditambah.');
    }
    public function edit(Products $product)
    {
        $categories = Categories::all();
        $title = 'Edit Kategori Produk';
        return view('products.edit', compact('title', 'product' ,'categories'));
    }

    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
