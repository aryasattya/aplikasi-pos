<?php

namespace App\Http\Controllers;

use App\Models\Categories;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
 

public function index(Request $request)
    {
        $query = Categories::query();
    
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
                  
        }
        
        $title = 'Daftar Categories';
        $categories = $query->get(); 
        
        return view('categories.index', compact('categories', 'title'));
    }

    public function create(){

        $title = 'Tambah Kategori Produk';
        return view('categories.create', compact('title'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        
        Categories::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function edit(Categories $category){
        $title = 'Edit Kategori Produk';
        return view('categories.edit', compact('title', 'category'));
    }

    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Categories $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'categories berhasil dihapus.');
    }
    
}
