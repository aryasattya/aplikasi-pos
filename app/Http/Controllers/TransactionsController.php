<?php

namespace App\Http\Controllers;
use App\Models\Transactions;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index(Request $request){

        $query = Transactions::query();

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

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Buat produk baru
        Transactions::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product berhasil ditambah.');
    }
}
