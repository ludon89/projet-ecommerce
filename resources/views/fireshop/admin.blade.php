<x-app-layout>
  <x-slot name="slot">
    <div class="container text-white mx-auto px-5 py-5">
      <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8 text-white">
        <h1 class="font-semibold text-3xl font-display text-yellow mb-5">
          Dashboard
        </h1>

        <div class="flex justify-between">
          <h2 class="font-semibold text-2xl">
            Produits
          </h2>
          <x-success-button>
            <a href="{{ route('products.create') }}">
              Ajouter un produit
            </a>
          </x-success-button>
        </div>
        <div class="my-8 text-white">
          <hr>
          <br>
          @foreach ($products as $product)
            {{-- Product's name --}}
            <h2 class="font-display text-xl font-semibold mb-2">
              <a href="{{ route('products.show', $product) }}">
                {{ $product->name }}
              </a>
            </h2>

            {{-- Picture --}}
            <img src="{{ asset('storage/' . $product->picture) }}" alt="image produit" class="my-2">

            {{-- Description --}}
            <p class="my-2">{{ $product->description }}</p>

            {{-- Prices --}}
            <p class="font-bold text-xl my-2">{{ $product->price }} €</p>

            <div class="flex justify-end">
              {{-- Update button --}}
              <x-primary-button class="mx-1">
                <a href="{{ route('products.edit', $product->id) }}">Modifier</a>
              </x-primary-button>

              {{-- Delete button --}}
              <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                @csrf
                @method('DELETE')
                <x-danger-button class="mx-1">
                  <a href="{{ route('products.destroy', $product->id) }}"
                     onclick="event.preventDefault(); this.closest('form').submit();">Supprimer</a>
                </x-danger-button>
              </form>
            </div>
            <br>
            <hr>
          @endforeach
        </div>
      </div>
    </div>
  </x-slot>

</x-app-layout>
