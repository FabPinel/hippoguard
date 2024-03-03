@extends('layout')
@section('pageTitle', 'Eco-Service')
@section('content')

    <div class="bg-white">
        <!-- Hero section -->
        <div class="relative bg-gray-900 h-screen">
            <!-- Decorative image and overlay -->
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden h-screen">
                <img src="https://image.noelshack.com/fichiers/2024/09/6/1709409874-hero.jpg"
                    alt="" class="h-full w-full object-cover object-center">
            </div>
            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>

            <div class="relative mx-auto flex max-w-3xl flex-col items-center px-6 py-32 text-center sm:py-64 lg:px-0">
                <h1 class="text-2xl font-bold tracking-tight text-white lg:text-6xl">La coque de demain est là</h1>
                <p class="mt-4 text-xl text-white">Protégez votre précieux compagnon numérique avec style grâce à notre gamme exclusive de coques de téléphone. Chez HippoGuard, nous comprenons à quel point votre téléphone est important pour vous. C'est pourquoi nous avons développé une collection de coques qui allient parfaitement fonctionnalité, durabilité et esthétique.</p>
                <a href="/boutique" class="mt-8 inline-block rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-gray-900 hover:bg-gray-100">Voir le Magasin</a>
            </div>
        </div>

        <main>
            <!-- Category section -->
            <section aria-labelledby="category-heading" class="pt-24 sm:pt-32 xl:mx-auto xl:max-w-7xl xl:px-8">
                <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
                    <h2 id="category-heading" class="text-2xl font-bold tracking-tight text-gray-900">Découvrez nos produits
                    </h2>
                    <a href="/boutique" class="hidden text-m font-semibold text-[#1c3242] hover:text-[#374a56] sm:block">
                        Voir tous les produits
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="mt-4 flow-root">
                    <div class="-my-2">
                        <div class="relative box-content h-80 overflow-x-auto py-2 xl:overflow-visible">
                            <div class="absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-x-8 xl:space-x-0 xl:px-0">
                                @foreach ($productsHome as $product)
                                    <a href="{{ route('shop.productName', $product->id) }}"
                                        class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                                        <span aria-hidden="true" class="absolute inset-0">
                                            <img class="h-full w-full object-cover object-center"
                                                src="{{ asset('storage/images/' . $product->media) }}"
                                                alt="{{ $product->name }}">
                                        </span>
                                        <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                        <span class="relative mt-auto text-center text-xl font-bold text-white">{{ $product->name }}</span>
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

            <!-- Collection section -->
            <section aria-labelledby="collection-heading"
                class="mx-auto max-w-xl px-4 pt-24 sm:px-6 sm:pt-32 lg:max-w-7xl lg:px-8">
                <h2 id="collection-heading" class="text-2xl font-bold tracking-tight text-gray-900">Par Marques et modèle</h2>
                <p class="mt-4 text-base text-gray-500">Explorez l'art du DIY écologique avec nos articles pour créer des
                    solutions durables à la maison. Faites place à la créativité et à la responsabilité environnementale !
                    🌱🛠️</p>
                {{-- <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                    @foreach ($diyHome as $diy)
                        <a href="{{ route('diy.diyName', $diy->id) }}" class="group block">
                            <div aria-hidden="true"
                                class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                <img src="{{ asset('storage/images/' . $diy->image) }}"
                                    class="h-full w-full object-cover object-center">
                            </div>
                            <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $diy->title }}</h3>
                            <p class="mt-2 text-sm text-gray-500">{{ $diy->description }}</p>
                        </a>
                    @endforeach
                </div> --}}
            </section>

            <!-- Featured section -->
            <section aria-labelledby="social-impact-heading" class="mx-auto max-w-7xl px-4 pt-24 sm:px-6 sm:pt-32 lg:px-8">
                <div class="relative overflow-hidden rounded-lg">
                    <div class="absolute inset-0">
                        <img src="https://image.noelshack.com/fichiers/2024/09/6/1709410033-eddfc6736e404d126b20823318e9c4d0.png"
                            alt="" class="h-full w-full object-cover object-center">
                    </div>
                    <div class="relative bg-gray-900 bg-opacity-50 px-6 py-32 sm:px-12 sm:py-40 lg:px-16">
                        <div class="relative mx-auto flex max-w-3xl flex-col items-center text-center">
                            <h2 id="social-impact-heading" class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                                <span class="block sm:inline">The Great Wave I</span>
                            </h2>
                            <p class="mt-3 text-xl text-white">
                                Découvrez la Coque HIPPOGUARD SolidSuit personnalisée "[The Great Wave I]" pour iPhone 15. Inspirée par l'œuvre d'art classique "The Great Wave off Kanagawa", cette coque offre une protection robuste et un style incomparable à votre appareil. Fabriquée avec des matériaux de haute qualité, elle protège votre iPhone 15 des chocs et des rayures tout en ajoutant une touche artistique à votre quotidien. Commandez dès maintenant pour allier protection et esthétique!</p>
                            <a href="/zero-dechet" class="mt-8 block w-full rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">Je
                                découvre !</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
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
                   Connexion réussie
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                   {{ $message }}
                </p>
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
                   Connexion réussie
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                   {{ $message }}
                </p>
            </div>
        </div>
        @endif
         <script>
            setTimeout(function() {
                document.getElementById('successMessage').remove();
            }, 5000); // La popup disparaîtra après 5 secondes (5000 millisecondes)
        </script>
    </div>


@endsection
