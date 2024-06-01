<?php

namespace App\Http\Controllers;
use App\Models\Transactions;
use App\Models\Products;
use App\Models\Customers;
use App\Models\User;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index(Request $request)
    {
        $query = Transactions::with(['product', 'customer', 'user']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('product', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('customer', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhere('date', 'like', '%' . $search . '%');
        }

        $title = 'Daftar Transaksi';
        $transactions = $query->get();

        return view('transactions.index', compact('transactions', 'title'));
    }

    public function create(){

        $title = "Tambah Transaksi";
        $customers = Customers::all();
        $products = Products::all();
        $users = User::all();

        return view('transactions.create', compact('title', 'customers', 'products', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $product = Products::find($request->input('product_id'));

        if ($product->quantity < $request->input('quantity')) {
            return redirect()->back()->withErrors(['message' => 'Stok tidak cukup untuk melakukan transaksi ini.']);
        }

        $total_price = $product->price * $request->input('quantity');

        $transaction = Transactions::create([
            'product_id' => $request->input('product_id'),
            'customer_id' => $request->input('customer_id'),
            'user_id' => $request->input('user_id'),
            'quantity' => $request->input('quantity'),
            'total_price' => $total_price,
            'date' => $request->input('date')
        ]);

        $product->quantity -= $request->input('quantity');
        $product->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }


    public function edit(Transactions $transaction){

        $title = "Edit Transaksi";
        $customers = Customers::all();
        $products = Products::all();
        $users = User::all();

        return view('transactions.edit', compact('title', 'customers', 'products', 'users', 'transaction'));
    }





    public function update(Request $request, Transactions $transaction)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $product = Products::find($request->input('product_id'));

        $quantityDifference = $request->input('quantity') - $transaction->quantity;

        if ($quantityDifference > 0 && $product->quantity < $quantityDifference) {
            return redirect()->back()->withErrors(['message' => 'Stok tidak cukup untuk melakukan transaksi ini.']);
        }

        $total_price = $product->price * $request->input('quantity');

        $transaction->update([
            'product_id' => $request->input('product_id'),
            'customer_id' => $request->input('customer_id'),
            'user_id' => $request->input('user_id'),
            'quantity' => $request->input('quantity'),
            'total_price' => $total_price,
            'date' => $request->input('date')
        ]);


        $product->quantity -= $quantityDifference;
        $product->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }


    public function destroy(Transactions $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Data transaksi berhasil dihapus.');
    }
}
