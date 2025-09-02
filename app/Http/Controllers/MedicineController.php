<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicinesRequest;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Tag;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by= request()->query('sort_by','name');
        $sort_dir= request()->query('sort_dir','asc');
        
        $medicines = Medicine::getAllSorted($sort_by,$sort_dir);
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Medicine::createMedicine();
        return view('medicines.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicinesRequest $request)
    {
        Medicine::storeMedicine(
            $request->validated(),
            $request->input('tags',[])
        );

        return redirect()->route('medicines.index')
        ->with('success', 'A gyógyszer sikeresen hozzáadva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicine = Medicine::getSingle($id);
        return view('medicines.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Medicine::editMedicine($id);
        return view('medicines.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicinesRequest $request, string $id)
    {
        Medicine::updateMedicine(
        $id, 
        $request->validated(), 
        $request->input('tags',[]) 
        );

        return redirect()->route('medicines.index')
        ->with('success', 'A gyógyszer sikeresen frissítve.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Medicine::deleteMedicine($id);
        return redirect()->route('medicines.index')
        ->with('success', 'A gyógyszer sikeresen törölve.'); 
    }
}
