<x-app-layout>
  <x-slot name="slot">
    <section>
      <div class="container mx-auto px-5 py-5">
        <h1
            class="my-3 text-white text-2xl font-semibold font-display underline decoration-yellow decoration-wavy underline-offset-8 sm:mx-3 sm:mt-0">
          All products
        </h1>
        <div class="container flex-col items-center">
          <div class="inline-grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
            <x-product-card />
            <x-product-card />
            <x-product-card />
          </div>
          <div class="inline-grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
            <x-product-card />
            <x-product-card />
            <x-product-card />
          </div>
        </div>
      </div>
    </section>
  </x-slot>
</x-app-layout>
