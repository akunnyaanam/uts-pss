<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::all()
            ->load([
                'category',
                'category.admin',
                'supplier',
                'supplier.admin',
                'admin',
            ])
            ->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request): RedirectResponse
    {
        $validated = $request->safe()->all();

        $item = Item::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'category_id' => $validated['category_id'],
            'supplier_id' => $validated['supplier_id'],
            'created_by' => Auth::id() ?? 1,
        ]);
    
        return redirect()->route('items.show', $item)->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return $item->load([
            'category',
            'category.admin',
            'supplier',
            'supplier.admin',
            'admin',
        ])
        ->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item): RedirectResponse
    {
        $validated = $request->safe()->all();

        $item->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'category_id' => $validated['category_id'],
            'supplier_id' => $validated['supplier_id'],
            'created_by' => Auth::id() ?? 1,
        ]);

        return redirect()->route('items.show', $item)->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json(['message' => 'Item deleted successfully.'], 200);
    }
}
