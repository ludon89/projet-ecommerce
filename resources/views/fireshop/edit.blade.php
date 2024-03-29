<x-app-layout>
  <x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
      Modifier un article
    </h1>
  </x-slot>

  <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8 text-white">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <label for="name">Nom :</label><br>
          <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                 class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-black">
          <label for="price">Prix :</label><br>
          <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}"
                 class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-black">
          <label for="picture">Illustration :</label>
          <input type="file" name="picture" id="picture">
          <br>
          <label for="description">Description :</label>
          <textarea name="description" id="description" rows=5
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-black">{{ old('description', $product->description) }}</textarea>
          <x-input-error :messages="$errors->get('message')" class="mt-2" />
          <x-primary-button class="mt-4">{{ __('Publier') }}</x-primary-button>
          <a href="{{ route('admin') }}">Retour</a>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
