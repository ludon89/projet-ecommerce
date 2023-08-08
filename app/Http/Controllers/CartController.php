<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CartInterfaceRepository;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'quantity' => 'numeric|min:1',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['product_id'] = $request->product;

        Cart::create($validated);

        return redirect(route('catalogue'))
            ->with('message', 'Produit(s) ajouté(s) au panier');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }





    // protected $cartRepository; // L'instance cartSessionRepository

    // public function __construct (CartInterfaceRepository $cartRepository) {
    // 	$this->cartRepository = $cartRepository;
    // }

    // # Affichage du panier
    // public function show () {
    // 	return view("cart.show"); // resources\views\cart\show.blade.php
    // }

    // # Ajout d'un produit au panier
    // public function add (Product $product, Request $request) {

    // 	// Validation de la requête
    // 	$this->validate($request, [
    // 		"quantity" => "numeric|min:1"
    // 	]);

    // 	// Ajout/Mise à jour du produit au panier avec sa quantité
    // 	$this->cartRepository->add($product, $request->quantity);

    // 	// Redirection vers le panier avec un message
    // 	return redirect()->route("cart.show")->withMessage("Produit ajouté au panier");
    // }

    // // Suppression d'un produit du panier
    // public function remove (Product $product) {

    // 	// Suppression du produit du panier par son identifiant
    // 	$this->cartRepository->remove($product);

    // 	// Redirection vers le panier
    // 	return back()->withMessage("Produit retiré du panier");
    // }

    // // Vider la panier
    // public function empty () {

    // 	// Suppression des informations du panier en session
    // 	$this->cartRepository->empty();

    // 	// Redirection vers le panier
    // 	return back()->withMessage("Panier vidé");

    // }
}
