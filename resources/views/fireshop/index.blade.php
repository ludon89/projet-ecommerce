<x-app-layout>
  <div x-data="{ cartOpen: false, isOpen: false }">
    <x-slot name="slot">
      {{-- Hero --}}
      <section>
        <div
          class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
          <div
            class="lg:flex-grow flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">

            <h1
              class="text-yellow font-display tracking-wide sm:text-3xl md:text-6xl xl:text-7xl mb-4 font-bold ">
              FireShop
            </h1>

            <p class="mb-8 leading-relaxed text-white">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lacus,
              sit ut fermentum posuere platea. Cras
              turpis adipiscing varius id sed leo morbi. Morbi amet, lectus
              pretium et vitae duis lectus in lorem.
            </p>

            <div class="flex justify-center">
              <x-primary-button>
                About
              </x-primary-button>
            </div>
          </div>

          <div class="w-full h- flex justify-center items-center m-auto">
            <img class="object-cover object-center rounded-xl" alt="hero"
              src="images/firework-tower.jpg">
          </div>
        </div>
      </section>

      <section>
        <div class="container mx-auto px-5 py-5">
          <h1
            class="my-3 text-white text-2xl font-semibold font-display underline decoration-yellow decoration-wavy underline-offset-8 sm:mx-3 sm:mt-0">
            New products
          </h1>
          <div class="container flex items-center">
            <div
              class="inline-grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
              <x-product-card />
              <x-product-card />
              <x-product-card />
            </div>
          </div>
        </div>
      </section>
    </x-slot>
</x-app-layout>
