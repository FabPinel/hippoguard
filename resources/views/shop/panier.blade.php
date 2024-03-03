@extends('layout')
@section('pageTitle', 'Mon panier')
@section('content')
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Votre panier</h1>
            <form class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
                <section aria-labelledby="cart-heading" class="lg:col-span-7">
                    <h2 id="cart-heading" class="sr-only">Articles dans votre panier</h2>

                    <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">
                        @foreach (session('cart', []) as $productId => $item)
                            @php
                                $product = App\Models\Product::find($productId);
                            @endphp
                            <li class="py-6 sm:py-10">
                                <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                    <div class="flex justify-between items-center sm:gap-x-6 sm:pr-0">
                                        <img src="{{ asset('storage/app/public/images/' . $product->media) }}"
                                            alt="{{ $product->name }}"
                                            class="h-20 w-20 object-cover object-center sm:rounded-lg">
                                        <div>
                                            <div class="flex justify-between">
                                                <h3 class="text-sm">
                                                    <a href="{{ route('shop.productName', $item['product_id']) }}"
                                                        class="font-medium text-gray-700 hover:text-gray-800">{{ $item['name'] }}</a>
                                                </h3>
                                            </div>
                                            <p class="mt-1 text-sm font-medium text-gray-900">{{ $item['price'] }} €</p>
                                        </div>

                                        <div class="mt-4 sm:mt-0 sm:pr-9">
                                            <label for="quantity-{{ $productId }}" class="sr-only">Quantity,
                                                {{ $item['name'] }}</label>
                                            <input id="quantity-{{ $productId }}" name="quantity-{{ $productId }}"
                                                type="number" value="{{ $item['quantity'] }}"
                                                class="w-10 rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-[#1c3242] focus:outline-none focus:ring-1 focus:ring-[#1c3242] sm:text-sm"
                                                min="1" max="{{ $product->quantity }}" step="1"
                                                inputmode="numeric" data-product-id="{{ $item['product_id'] }}"
                                                onkeydown="return false;">

                                        </div>
                                        <div data-id="{{ $item['product_id'] }}" class="relative right-0 top-0">
                                            <button type="button"
                                                class="-m-2 inline-flex p-2 text-gray-400 hover:text-gray-500 remove-from-cart">
                                                <span class="sr-only">Remove</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <p class="mt-4 flex space-x-2 text-sm text-gray-700">
                                        <svg class="h-5 w-5 flex-shrink-0 text-green-500" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>En stock</span>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>

                <!-- Order summary -->
                <section aria-labelledby="summary-heading"
                    class="mt-16 rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
                    <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Récapitulatif de votre commande</h2>

                    <dl class="mt-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <dt class="text-sm text-gray-600">Sous-total</dt>
                            <dd class="text-sm font-medium text-gray-900">{{ number_format($subtotal, 2) }}€</dd>
                        </div>
                        @if ($subtotal > 0)
                        <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                            <dt class="flex items-center text-sm text-gray-600">
                                <span>dont TVA (20%)</span>
                            </dt>
                            <dd class="text-sm font-medium text-gray-900">{{ number_format($subtotal * 0.2, 2) }}€
                            </dd>
                        </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                                <dt class="flex items-center text-sm text-gray-600">
                                    <span>Frais de livraison</span>
                                </dt>
                                <dd class="text-sm font-medium text-gray-900">4.99€</dd>
                            </div>

                        @endif
                        <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                            <dt class="text-base font-medium text-gray-900">Total de votre commande (TTC)</dt>
                            @if ($subtotal > 0)
                                <dd class="text-base font-medium text-gray-900">{{ number_format($total, 2) }}€</dd>
                            @else
                                <dd class="text-base font-medium text-gray-900">0.00€</dd>
                            @endif
                        </div>
                    </dl>

                    <div class="mt-6">
                        @guest
                            <!-- Bouton désactivé pour les utilisateurs invités -->
                            <form method="POST" action="{{ route('login.authenticate') }}">
                                @csrf
                                <input type="hidden" name="intended" value="{{ url()->current() }}">
                                <button type="submit"
                                    class="w-full rounded-md border border-transparent bg-gray-300 px-4 py-3 text-base font-medium text-gray-700 shadow-sm cursor-not-allowed"
                                    disabled>Commander</button>
                                <p class="text-sm text-gray-500 mb-2">Vous devez être connecté pour passer commande,
                                    connectez-vous
                                    <a href="{{ route('login', ['intended' => url()->current()]) }}"
                                        class="text-[#e88229]">ici</a>.
                                </p>
                            </form>
                        @else
                            <!-- Bouton avec désactivation conditionnelle -->
                            <a href="{{ route('commande') }}"
                                class="w-full rounded-md border border-transparent bg-[#1c3242] px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-[#374a56] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 block text-center"
                                @if ($subtotal == 0) onclick="return false;"
                               style="pointer-events: none; opacity: 0.5;" @endif>
                                Commander
                            </a>
                        @endguest
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".remove-from-cart").on("click", function(e) {
                e.preventDefault();

                var productId = $(this).closest("div").data("id");

                if (confirm("Etes-vous sûr de vouloir supprimer votre article ?")) {
                    $.ajax({
                        url: '{{ route('removeFromCart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            product_id: productId
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("input[type='number']").on("change", function() {
                var productId = $(this).data("product-id");
                var quantity = $(this).val();

                $.ajax({
                    url: '{{ route('updateCart') }}',
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection
