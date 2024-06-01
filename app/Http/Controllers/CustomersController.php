<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomersController extends Controller
{

    public function index(Request $request)
    {
        $query = Customers::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        }

        $title = 'Daftar kostumer';
        $customers = $query->get();

        return view('customers.index', compact('customers', 'title'));
    }

    public function create()
    {

       
        $title = 'Tambah Kostumer';
        return view('customers.create', compact('title'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Buat produk baru
        Customers::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Kostumer Berhasiil Ditambahkan.');
    }
    public function edit(Customers $customer)
    {
        
        $title = 'Edit Kategori Produk';
        return view('customers.edit', compact('title', 'customer'));
    }

    public function update(Request $request, Customers $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        if($request->email != $customer->email) {

            $rules['email'] = 'required|email|unique:customers,email';
        }

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'kostumer berhasil diperbarui.');
    }

    public function destroy(Customers $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Kostumer berhasil dihapus.');
    }
}
