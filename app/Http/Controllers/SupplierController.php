<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Supplier::all()
            ->load([
                'admin'
            ])
            ->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request): RedirectResponse
    {
        $validated = $request->safe()->all();

        $supplier = Supplier::create([
            'name' => $validated['name'],
            'contact_info' => $validated['contact_info'],
            'created_by' => Auth::id() ?? 1,
        ]);
    
        return redirect()->route('suppliers.show', $supplier)->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return $supplier
            ->load([
                'admin'
            ])
            ->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $validated = $request->safe()->all();

        $supplier->update([
            'name' => $validated['name'],
            'contact_info' => $validated['contact_info'],
            'created_by' => Auth::id() ?? 1,
        ]);
    
        return redirect()->route('suppliers.show', $supplier)->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json(['message' => 'Supplier deleted successfully.'], 200);
    }
}
