@extends('layout')
@section('pageTitle', $product->name)
@section('content')
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
                <!-- Image gallery -->
                <div class="flex flex-col-reverse border-r-2 border-gray-200 p-4">
                    <div class="aspect-h-1 aspect-w-1 w-full">
                        <!-- Tab panel, show/hide based on tab state. -->
                        <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                            <img src="{{ asset('storage/app/public/images/' . $product->media) }}" alt="{{ $product->name }}"
                                class="h-full w-full object-cover object-center sm:rounded-lg">
                        </div>
                    </div>
                </div>

                <!-- Product info -->
                <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                    <h1 class="text-3xl sm:w-7/12 font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>

                    <div class="mt-3">
                        <h2 class="sr-only">{{ $product->name }}</h2>
                        <p class="mt-2 font-bold text-gray-900 text-4xl">{{ $product->price }}€</p>
                    </div>

                    <div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900">Description</h2>

                        <div class="prose prose-sm mt-4 text-gray-500">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>

                    <form action="{{ route('addToCart', ['productId' => $product->id]) }}" method="POST" class="mt-6">
                        @csrf
                        <div class="mt-10 flex">
                            <button type="submit"
                                class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-[#1c3242] px-8 py-3 text-base font-medium text-white hover:bg-[#374a56] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full mr-6"
                                @if ($product->quantity == 0) disabled @endif>
                                Ajouter au panier
                            </button>
                            <input type="number" name="quantity" value="1" min="1"
                                max="{{ $product->quantity }}"
                                class="w-10 text-center rounded-md border border-gray-300 py-1.5 text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-[#1c3242] focus:outline-none focus:ring-1 focus:ring-[#1c3242] sm:text-sm mr-4"
                                onkeydown="return false;">
                        </div>
                    </form>
                    @if ($product->quantity == 0)
                        <div class="prose prose-sm mt-4 text-gray-500">
                            <p class="text-red-800">En rupture de stock !</p>
                        </div>
                    @else
                        <div class="prose prose-sm mt-4 text-gray-500">
                            <p>Il en reste {{ $product->quantity }} en stock !</p>
                        </div>
                    @endif

                    {{-- <form action="{{ route('remove', ['productId' => $product->id]) }}" method="POST" class="mt-6">
            @csrf
            <div class="mt-10 flex">
                <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-[#1c3242] px-8 py-3 text-base font-medium text-white hover:bg-[#374a56] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Ajouter au panier</button>
            </div>
          </form>       --}}

                    <div class="mt-8 border-t border-gray-200 pt-8">
                        <h2 class="text-sm font-medium text-gray-900">Composition &amp; Fabrication</h2>

                        <div class="prose prose-sm mt-4 text-gray-500">
                            <ul role="list">
                                <li>Matériaux Écologiques</li>
                                <li>Fabrication Locale et Éthique</li>
                                <li>Mode d'Entretien Respectueux de l'Environnement</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <p class="prose prose-sm mt-4 text-gray-500">{{ $product->information }}</p>
                <section aria-labelledby="policies-heading" class="mt-10">
                    <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                        <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
                            <dt>
                                <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                </svg>
                                <span class="mt-4 text-sm font-medium text-gray-900">Livraison rapide</span>
                            </dt>
                            <dd class="mt-1 text-sm text-gray-500">Entre 3/4 jours ouvrables</dd>
                        </div>
                        <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 text-center">
                            <dt>
                                <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="mt-4 text-sm font-medium text-gray-900">10% reversé</span>
                            </dt>
                            <dd class="mt-1 text-sm text-gray-500">Un beau geste pour la planète</dd>
                        </div>
                    </dl>
                </section>
            </div>

            @if ($relatedProducts->isNotEmpty())
                <!-- Category section -->
                <section aria-labelledby="category-heading" class="pt-24 sm:pt-32 xl:mx-auto xl:max-w-7xl xl:px-8">
                    <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
                        <h2 id="category-heading" class="text-2xl font-bold tracking-tight text-gray-900">Vous aimerez peut
                            être...
                        </h2>
                        <a href="/boutique"
                            class="hidden text-m font-semibold text-[#1c3242] hover:text-[#374a56] sm:block">
                            Voir tous les produits
                            <span aria-hidden="true"> &rarr;</span>
                        </a>
                    </div>

                    <div class="mt-4 flow-root">
                        <div class="-my-2">
                            <div class="relative box-content h-80 overflow-x-auto py-2 xl:overflow-visible">
                                <div
                                    class="absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-x-8 xl:space-x-0 xl:px-0">
                                    @foreach ($relatedProducts as $product)
                                        <a href="{{ route('shop.productName', $product->id) }}"
                                            class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                                            <span aria-hidden="true" class="absolute inset-0">
                                                <img class="h-full w-full object-cover object-center"
                                                    src="{{ asset('storage/app/public/images/' . $product->media) }}"
                                                    alt="{{ $product->name }}">
                                            </span>
                                            <span aria-hidden="true"
                                                class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                            <span
                                                class="relative mt-auto text-center text-xl font-bold text-white">{{ $product->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 px-4 sm:hidden">
                        <a href="/boutique" class="block text-sm font-semibold text-[#1c3242] hover:text-[#374a56]">
                            Voir tous les produits
                            <span aria-hidden="true"> &rarr;</span>
                        </a>
                    </div>
                </section>
            @endif

        </div>
    </div>
    @if ($message = Session::get('success'))
        <div id="successMessage"
            class="hidden md:flex fixed top-28 right-4 w-1/3 border-l-8 border-[#34D399] bg-[#CBF5E6] px-7 py-8 shadow-md">
            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#34D399]">
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.2984 0.826822L15.2868 0.811827L15.2741 0.797751C14.9173 0.401867 14.3238 0.400754 13.9657 0.794406L5.91888 9.45376L2.05667 5.2868C1.69856 4.89287 1.10487 4.89389 0.747996 5.28987C0.417335 5.65675 0.417335 6.22337 0.747996 6.59026L0.747959 6.59029L0.752701 6.59541L4.86742 11.0348C5.14445 11.3405 5.52858 11.5 5.89581 11.5C6.29242 11.5 6.65178 11.3355 6.92401 11.035L15.2162 2.11161C15.5833 1.74452 15.576 1.18615 15.2984 0.826822Z"
                        fill="white" stroke="white"></path>
                </svg>
            </div>
            <div class="mt-4 text-center">
                <h5 class="mb-2 text-lg font-bold text-[#34D399]">
                    Ajout au panier
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                    L'article a bien été ajouté au panier.
                </p>
                <a href="/panier" class="mt-2 text-sm text-[#34D399] underline font-semibold">Voir
                    mon panier</a>
            </div>
        </div>
        <div id="successMessage"
            class="flex md:hidden fixed top-28 ml-2 mr-2 w-full border-l-8 border-[#34D399] bg-[#CBF5E6] px-2 py-3 shadow-md">
            <div class="mr-3 flex h-8 w-8 items-center justify-center rounded-lg bg-[#34D399]">
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.2984 0.826822L15.2868 0.811827L15.2741 0.797751C14.9173 0.401867 14.3238 0.400754 13.9657 0.794406L5.91888 9.45376L2.05667 5.2868C1.69856 4.89287 1.10487 4.89389 0.747996 5.28987C0.417335 5.65675 0.417335 6.22337 0.747996 6.59026L0.747959 6.59029L0.752701 6.59541L4.86742 11.0348C5.14445 11.3405 5.52858 11.5 5.89581 11.5C6.29242 11.5 6.65178 11.3355 6.92401 11.035L15.2162 2.11161C15.5833 1.74452 15.576 1.18615 15.2984 0.826822Z"
                        fill="white" stroke="white"></path>
                </svg>
            </div>
            <div class="w-full">
                <h5 class="mb-2 text-lg font-bold text-[#34D399]">
                    Ajout au panier
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                    L'article a bien été ajouté au panier.
                </p>
                <a href="http://127.0.0.1:8000/panier" class="text-sm text-[#34D399] underline font-semibold">Voir mon
                    panier</a>
            </div>
        </div>
    @endif
     <script type="text/javascript">
        setTimeout(function() {
            document.getElementById('successMessage').remove();
        }, 5000); // La popup disparaîtra après 5 secondes (5000 millisecondes)
    </script>
@endsection
