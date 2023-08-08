@foreach ($products as $product)
  <div class="max-w-2xl mx-auto">
    <div class="bg-dark m-2 border-2 border-yellow rounded-lg max-w-sm">
      <a href="{{ route('products.show', $product) }}">
        <img class="rounded-t-lg" src="{{ $product->picture }}"
          alt="image de feu d'artifice">
      </a>
      <div class="p-5">
        <a href="{{ route('products.show', $product) }}">
          <h5 class="font-bold text-2xl tracking-tight mb-2 text-white">
            {{ $product->name }}</h5>
        </a>
        <p class="font-normal text-white mb-3">
          Aenean scelerisque lorem vel odio eleifend venenatis. Praesent eget
          magna.
        </p>
        <x-primary-button>
          <a href="{{ route('products.show', $product) }}">
            Show more
          </a>
        </x-primary-button>

        @auth
          <div class="bg-white mt-3 p-3 border text-center">
            <p>Commander <strong>{{ $product->name }}</strong></p>
            <form method="POST"
              action="{{ route('carts.store', ['user' => Auth::user()->id, 'product' => $product->id]) }}"
              class="form-inline d-inline-block">
              @csrf
              <input type="number" min="1" name="quantity"
                placeholder="Quantité ?" class="form-control mr-2" value="1">
              <button type="submit" class="btn btn-warning">+ Ajouter au
                panier</button>
              <x-input-error :messages="$errors->all()" class="mt-2" /><br>
              {{-- <p>{{ session()->get('message') }}</p> --}}
            </form>
          </div>
        @endauth

      </div>
    </div>
  </div>
@endforeach

{{--
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h1>{{ $product->name }}</h1>
      <h3 class="text-success">{{ $product->price }} $</h3>
      <div class="mb-3">{!! nl2br($product->description) !!}</div>
      <div class="bg-white mt-3 p-3 border text-center">
        <p>Commander <strong>{{ $product->name }}</strong></p>
        {{-- <form method="POST" action="{{ route('cart.add', $product) }}"
          class="form-inline d-inline-block">
          {{ csrf_field() }}
          <input type="number" name="quantity" placeholder="Quantité ?"
            class="form-control mr-2"
            value="{{ isset(session('cart')[$products->id]) ? session('cart')[$products->id]['quantity'] : null }}">
          <input type="number" name="quantity" placeholder="Quantité ?"
            class="form-control mr-2">
          <button type="submit" class="btn btn-warning">+ Ajouter au
            panier</button>
        </form> --}}
{{--
        <form method="POST" action="#" class="form-inline d-inline-block">
          {{ csrf_field() }}
          <input type="number" name="quantity" placeholder="Quantité ?"
            class="form-control mr-2" value="">
          <input type="number" name="quantity" placeholder="Quantité ?"
            class="form-control mr-2">
          <button type="submit" class="btn btn-warning">+ Ajouter au
            panier</button>
        </form>
      </div>
    </div>
  </div>
</div>
--}}
