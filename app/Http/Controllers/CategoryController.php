<?php

namespace App\Http\Controllers;

use App\Models\Category;
//use App\Models\Medicine;
use App\Http\Requests\CategoriesRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::getAll();
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
    public function store(CategoriesRequest $request)
    {
        Category::createCategory($request->validated());
        
        return redirect()->route('categories.index')
        ->with('success','Kategória sikeresen létrehozva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::getSingle($id);
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
    public function update(CategoriesRequest $request, string $id)
    {
        Category::updateCategory($id, $request->validated());
        return redirect()->route('categories.index')
        ->with('success', 'Kategória sikeresen frissítve.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::deleteCategory($id);
        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen törölve.');
    }
}
