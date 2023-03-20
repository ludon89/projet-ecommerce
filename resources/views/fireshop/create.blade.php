<x-app-layout>
    <x-slot name="slot">
        <div class="container text-white mx-auto px-5 py-5">
            <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8 text-white">
                <h1 class="font-semibold text-3xl font-display text-yellow">
                    Modifier un article
                </h1>

                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="m-2 py-2">
                        <label for="name">Nom du produit :</label>

                        <input type="text" name="name" id="name" value=""
                            class=" text-black block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    </div>
                    
                    <div class="m-2 py-2">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" id="price" value=""
                            class="text-black block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    </div>
                   
                    <div class="m-2 py-2">
                        <label for="picture">Illustration :</label>
                        <input type="file" name="picture" id="picture" class="text-black">
                    </div>
                    
                    <div class="m-2 py-2">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" rows=5
                            class="text-black block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>
                    
                    <x-primary-button class="mt-4 mx-1">
                        {{ __('Publier') }}
                    </x-primary-button>
                    <x-danger-button class="mt-4 mx-1">
                        <a href="{{ route('admin') }}">
                            Retour
                        </a>
                    </x-danger-button>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
