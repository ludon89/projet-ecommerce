<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("fireshop.index");
    }

    public function admin_index(): View
    {
        $products = Product::all();
        return view("fireshop.admin", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:10000',
        ]);

        $request->user()->products()->create($validated);

        return redirect(route('admin'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("products.product", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        // $this->authorize('update', $product);

        return view('fireshop.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        // $this->authorize('update', $product);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:10000',
        ]);

        $product->update($validated);

        return redirect(route('admin'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        // $this->authorize('delete', $product);

        $product->delete();

        return redirect(route('admin'));
    }
}
