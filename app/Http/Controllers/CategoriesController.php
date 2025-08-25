<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Medicine;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:255',
            ],
            [
                'name.required' => 'A kategória neve megadása kötelező.',
                'name.min' => 'A kategória neve legalább 3 karakter hosszúnak kell legyen.',
                'name.max' => 'A kategória neve maximum 255 karakter hosszú lehet.',
            ]
        );

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen létrehozva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:255',
            ],
            [
                'name.required' => 'A kategória neve megadása kötelező.',
                'name.min' => 'A kategória neve legalább 3 karakter hosszúnak kell legyen.',
                'name.max' => 'A kategória neve maximum 255 karakter hosszú lehet.',
            ]
        );
        
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen frissítve.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen törölve.');
    }
}
