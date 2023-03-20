<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("fireshop.index");
    }

    public function admin_index(User $user): View
    {
        if (!Gate::allows('access-admin', $user)) {
            abort(403);
        }

        $products = Product::latest()->get();
        return view("fireshop.admin", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user): View
    {
        if (!Gate::allows('access-admin', $user)) {
            abort(403);
        }

        return view("fireshop.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:10000',
            'picture' => 'image|max:1024',
        ]);

        $imgpath = Storage::putFile('img', $request->file('picture'));

        Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "picture" => $imgpath,
        ]);

        return redirect(route('admin'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view("fireshop.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, User $user): View
    {
        if (!Gate::allows('access-admin', $user)) {
            abort(403);
        }

        return view('fireshop.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $rules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:10000',
        ];

        if ($request->hasFile('picture')) {
            $rules['picture'] = 'image|max:1024';
        }

        $this->validate($request, $rules);

        $imgpath = "";

        if ($request->hasFile('picture')) {
            $imgpath = Storage::putFile('img', $request->file('picture'));
            if ($product->picture) {
                Storage::delete($product->picture);
            }
        } else {
            $imgpath = $product->picture;
        }

        // dd($imgpath);

        $productData = [
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "picture" => $imgpath,
        ];

        $product->update($productData);

        return redirect(route('admin'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect(route('admin'));
    }
}
