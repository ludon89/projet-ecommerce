<x-app-layout>
    <h1>{{ $product->name }}</h1>
    <img src="{{ $product->picture }}" alt="image produit">
    <p>{{ $product->price }}</p>
    <p>{{ $product->description }}</p>
    <a href="{{ route('products.edit', $product->id) }}">Modifier</a>
    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
        @csrf
        @method('DELETE')
        <a href="{{ route('products.destroy', $product->id) }}"
           onclick="event.preventDefault(); this.closest('form').submit();">Supprimer</a>
    </form>
    <hr>
    <a href="{{ route('admin') }}">Retour</a>
</x-app-layout>
