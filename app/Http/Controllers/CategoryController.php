<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all()
            ->load([
                'admin',
            ])
            ->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $validated = $request->safe()->all();

        $category = Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'created_by' => Auth::id() ?? 1,
        ]);
    
        return redirect()->route('categories.show', $category)->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category->load([
            'admin',
        ])
        ->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->safe()->all();

        $category->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'created_by' => Auth::id() ?? 1,
        ]);
    
        return redirect()->route('categories.show', $category)->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully.'], 200);
    }
}
