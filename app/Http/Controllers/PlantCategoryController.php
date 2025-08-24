<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Str;

class PlantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas = Category::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $datas->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }
        
        // If you want to filter categories based on a search term
        return view('master.plant-category.index', [
            'datas' => $datas->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.plant-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'common_examples' => 'nullable|string|max:1000',
        ]);

        Category::create(array_merge(
            $request->only('name', 'description'),
            [
                'slug' => Str::slug($request->name, '-'),
            ]
        ));

        return redirect()->route('category')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Category::findOrFail($id);
        
        return view('master.plant-category.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'common_examples' => 'nullable|string|max:1000',
        ]);

        $data->update(array_merge(
            $request->only('name', 'description'),
            [
                'slug' => Str::slug($request->name, '-'),
            ]
        ));
        return redirect()->route('category')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()->route('category')->with('success', 'Category deleted successfully.');
    }
}
