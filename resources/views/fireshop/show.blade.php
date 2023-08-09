<x-app-layout>
  <x-slot name="slot">
    <div
      class="container m-10 rounded-lg border-4 border-yellow p-10 text-white">
      {{-- Product's name --}}
      <h1 class="mb-2 font-display text-3xl font-semibold">
        {{ $product->name }}
      </h1>

      <img src="{{ asset('storage/' . $product->picture) }}" alt="image produit">
      <p>{{ $product->price }}</p>
      <p>{{ $product->description }}</p>

      @auth
        {{-- Condition additionnelle sur l'authentification : si la personne connectée (user) est l'administrateur.rice ('is_admin' === 1),
          alors les boutons de modif et suppr d'articles apparaissent. --}}
        @if (Auth::user()->is_admin)
          {{-- Buttons --}}
          <div class="flex justify-end">
            {{-- modifier --}}
            <x-success-button>
              <a href="{{ route('products.edit', $product->id) }}">
                Modifier
              </a>
            </x-success-button>
            {{-- supprimer --}}
            <form method="POST"
              action="{{ route('products.destroy', $product->id) }}">
              @csrf
              @method('DELETE')
              <x-danger-button>
                <a href="{{ route('products.destroy', $product->id) }}"
                  onclick="event.preventDefault(); this.closest('form').submit();">
                  Supprimer
                </a>
              </x-danger-button>
            </form>
          </div>
        @endif
      @endauth

      <x-primary-button>
        <a href="{{ route('catalogue') }}">
          Retour
        </a>
      </x-primary-button>
    </div>
  </x-slot>
</x-app-layout>
