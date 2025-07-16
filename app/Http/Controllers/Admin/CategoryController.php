<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Category added successfully!');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('success', 'Category deleted!');
    }
}
