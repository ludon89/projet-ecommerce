<x-app-layout>
  {{-- @section('content') --}}
  <div class="container">

    @if (session()->has('message'))
      <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    <h1 class="text-white">Mon panier</h1>
    <div class="flex justify-between text-white">
      <h2 class="font-semibold text-2xl">
        Votre panier
      </h2>
    </div>
    <div class="my-8 text-white">
      <hr>
      <br>
      {{-- @foreach ($products as $product) --}}
      {{-- Product's name --}}
      <h2 class="font-display text-xl font-semibold mb-2">
        <a href="">
          Nom du produit
        </a>
      </h2>

      {{-- Picture --}}
      <img src="" alt="image produit" class="my-2">

      {{-- Description --}}
      <p class="my-2">Description du produit</p>

      {{-- Prices --}}
      <p class="font-bold text-xl my-2">Prix unitaire</p>

      <div class="flex justify-end">
        {{-- Update button --}}
        <x-primary-button class="mx-1">
          <a href="">Modifier</a>
        </x-primary-button>

        {{-- Delete button --}}
        <form method="POST" action="">
          @csrf
          @method('DELETE')
          <x-danger-button class="mx-1">
            <a href=""
              onclick="event.preventDefault(); this.closest('form').submit();">Supprimer</a>
          </x-danger-button>
        </form>
      </div>
      <br>
      <hr>
      {{-- @endforeach --}}
    </div>

    <!-- Lien pour vider le panier -->
    <a class="btn btn-danger text-white" href="#"
      title="Retirer tous les produits du panier">Vider le panier</a>

    {{-- <div class="alert alert-info">Aucun produit au panier</div> --}}

  </div>
  {{-- @endsection --}}
</x-app-layout>
