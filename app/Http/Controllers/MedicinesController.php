<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Medicine;

class MedicinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('medicines.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $needPresc = $request->has('needPresc');
        if($needPresc){
            $request->merge(['needPresc' => true]);
        } else {
            $request->merge(['needPresc' => false]);
        }
        
        $request->validate(
            [
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|min:3|max:255',
                'description' => 'required|min:10',
                'link' => 'required|url',
                'needPresc' => 'boolean',
                'price' => 'nullable|numeric|max:99999',
            ],
            [
                'category_id.required' => 'A kategória kiválasztása kötelező.',
                'category_id.exists' => 'A kiválasztott kategória érvénytelen.',
                'name.required' => 'A gyógyszer neve megadása kötelező.',
                'name.min' => 'A gyógyszer neve legalább 3 karakter hosszúnak kell legyen.',
                'name.max' => 'A gyógyszer neve maximum 255 karakter hosszú lehet.',
                'description.required' => 'A leírás megadása kötelező.',
                'description.min' => 'A leírásnak legalább 10 karakter hosszúnak kell lennie.',
                'link.required' => 'A link megadása kötelező.',
                'link.url' => 'A megadott link nem érvényes URL.',
                'needPresc.boolean' => 'Az "Szükséges recept" mező csak igaz vagy hamis értéket fogadhat el.',
                'price.numeric' => 'Az árnak numerikus értéknek kell lennie.',
                'price.min' => 'Az ár nem lehet negatív szám.',
            ]
        );

        Medicine::create($request->all());
        return redirect()->route('medicines.index')->with('success', 'A gyógyszer sikeresen hozzáadva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicines = Medicine::findOrFail($id);
        return view('medicines.show', compact('medicines'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicines = Medicine::findOrFail($id);
        $categories = Category::all();
        return view('medicines.edit', compact('medicines', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|min:3|max:255',
                'description' => 'required|min:10',
                'link' => 'required|url',
                'needPresc' => 'boolean',
                'price' => 'nullable|numeric|max:99999',
            ],
            [
                'category_id.required' => 'A kategória kiválasztása kötelező.',
                'category_id.exists' => 'A kiválasztott kategória érvénytelen.',
                'name.required' => 'A gyógyszer neve megadása kötelező.',
                'name.min' => 'A gyógyszer neve legalább 3 karakter hosszúnak kell legyen.',
                'name.max' => 'A gyógyszer neve maximum 255 karakter hosszú lehet.',
                'description.required' => 'A leírás megadása kötelező.',
                'description.min' => 'A leírásnak legalább 10 karakter hosszúnak kell lennie.',
                'link.required' => 'A link megadása kötelező.',
                'link.url' => 'A megadott link nem érvényes URL.',
                'needPresc.boolean' => 'Az "Szükséges recept" mező csak igaz vagy hamis értéket fogadhat el.',
                'price.numeric' => 'Az árnak numerikus értéknek kell lennie.',
                'price.min' => 'Az ár nem lehet negatív szám.',
            ]
        );

        $medicine = Medicine::findOrFail($id);
        $medicine->update($request->all());
        return redirect()->route('medicines.index')->with('success', 'A gyógyszer sikeresen frissítve.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
