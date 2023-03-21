<x-app-layout>
    <x-slot name="slot">
        <h1 class="font-semibold text-3xl font-display text-yellow mb-5">
            Dashboard
        </h1>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg border-2 border-yellow ">
                    <div class="p-6 text-white">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>

    </x-slot>

    
</x-app-layout>
