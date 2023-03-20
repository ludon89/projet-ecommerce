<x-app-layout>
    <x-slot name="slot">
        <div class="container text-white border-4 border-yellow rounded-lg p-10 m-10">
            {{-- Product's name --}}
            <h1 class="font-display text-3xl font-semibold mb-2">
                {{ $product->name }}
            </h1>

            <img src="{{ asset('storage/' . $product->picture) }}" alt="image produit">
            <p>{{ $product->price }}</p>
            <p>{{ $product->description }}</p>

            {{-- Buttons --}}
            <div class="flex justify-end">

                {{-- modifier --}}
                <x-success-button>
                    <a href="{{ route('products.edit', $product->id) }}">
                        Modifier
                    </a>
                </x-success-button>

                {{-- supprimer --}}
                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
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

            <x-primary-button>
                <a href="{{ route('admin') }}">
                    Retour
                </a>
            </x-primary-button>
        </div>
    </x-slot>
</x-app-layout>
