<div x-data="{ isOpen: false }">
    <!-- Mobile menu -->
    <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true" x-show="isOpen" @click.away="isOpen = false">
        <!--
             Off-canvas menu backdrop, show/hide based on off-canvas menu state.

             Entering: "transition-opacity ease-linear duration-300"
                 From: "opacity-0"
                 To: "opacity-100"
             Leaving: "transition-opacity ease-linear duration-300"
                 From: "opacity-100"
                 To: "opacity-0"
         -->
        <div class="fixed inset-0 bg-black bg-opacity-25"></div>

        <div class="fixed inset-0 z-40 flex">
            <!--
                 Off-canvas menu, show/hide based on off-canvas menu state.

                 Entering: "transition ease-in-out duration-300 transform"
                 From: "-translate-x-full"
                 To: "translate-x-0"
                 Leaving: "transition ease-in-out duration-300 transform"
                 From: "translate-x-0"
                 To: "-translate-x-full"
             -->
            <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                <div class="flex px-4 pb-2 pt-5">
                    <button type="button" @click="isOpen = false"
                        class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Links -->
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/admin/dashboard" class="-m-2 block p-2 font-medium text-gray-900">Dashboard</a>
                    </div>
                </div>
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="{{ route('admin.products.index') }}"
                            class="-m-2 block p-2 font-medium text-gray-900">Produits</a>
                    </div>
                </div>
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="{{ route('admin.orders.index') }}" class="-m-2 block p-2 font-medium text-gray-900">Commandes</a>
                    </div>
                </div>
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/admin/messages" class="-m-2 block p-2 font-medium text-gray-900">Messages</a>
                    </div>
                </div>
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/" class="-m-2 block p-2 font-medium text-gray-900">Accueil</a>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/register" class="-m-2 block p-2 font-medium text-gray-900">Créer un compte</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <header class="relative z-10" x-data="{ isSticky: true }"
        @scroll.window="isSticky = window.scrollY >= ($refs.nav?.offsetHeight ?? 0)">
        <nav aria-label="Top">
            <!-- Secondary navigation -->
            <div :class="{ 'fixed top-0 w-full': isSticky }"
                class="bg-[#000000] bg-opacity-60 backdrop-blur-md backdrop-filter border-t-8 border-[#FFED91]">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div>
                        <div class="flex h-16 items-center justify-between">
                            <!-- Logo (lg+) -->
                            <div class="hidden lg:flex lg:flex-1 lg:items-center">
                                <a href="/">
                                    <span class="sr-only">Your Company</span>
                                    <img class="h-12 w-auto"src="https://image.noelshack.com/fichiers/2024/09/6/1709410781-7a8338f69e139fcb21c949c087a45332.png" alt="">
                                </a>
                            </div>

                            <div class="hidden h-full lg:flex">
                                <!-- Flyout menus -->
                                <div class="inset-x-0 bottom-0 px-4">
                                    <div class="flex h-full justify-center space-x-8">
                                        <div class="flex">
                                            <div class="relative flex">
                                                <button type="button"
                                                    onclick="window.location.href='{{ url('/admin/dashboard') }}'"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">
                                                    Dashboard
                                                    <!-- Open: "bg-white", Closed: "" -->
                                                    <span
                                                        class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                        aria-hidden="true"></span>
                                                </button>
                                            </div>
                                            <div class="absolute inset-x-0 top-full text-sm text-gray-500">
                                                <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                <div class="absolute inset-0 top-1/2 bg-white shadow"
                                                    aria-hidden="true"></div>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="relative flex">
                                                <button type="button"
                                                    onclick="window.location.href='{{ route('admin.products.index') }}'"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">
                                                    Produits
                                                    <!-- Open: "bg-white", Closed: "" -->
                                                    <span
                                                        class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                        aria-hidden="true"></span>
                                                </button>
                                            </div>
                                            <div class="absolute inset-x-0 top-full text-sm text-gray-500">
                                                <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                <div class="absolute inset-0 top-1/2 bg-white shadow"
                                                    aria-hidden="true"></div>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="relative flex">


                                                        <a href="{{ route('admin.orders.index') }}" class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out">Commandes</a>

                                            </div>
                                        </div>
                                        <a href="{{ route('admin.messages.index') }}"
                                            class="flex items-center text-sm font-medium text-white">Messages</a>
                                        <button type="button" onclick="window.location.href='{{ url('/') }}'"
                                            class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                            aria-expanded="false">
                                            Accueil
                                            <!-- Open: "bg-white", Closed: "" -->
                                            <span
                                                class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile menu (lg-) -->
                            <div class="flex flex-1 items-center lg:hidden">
                                <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                                <button type="button" class="-ml-2 p-2 text-white" @click="isOpen = !isOpen">
                                    <span class="sr-only">Open menu</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Logo (lg-) -->
                            <a href="/" class="lg:hidden">
                                <span class="sr-only">Eco-Service</span>
                                <img class="h-20 w-auto"src="https://image.noelshack.com/fichiers/2024/04/5/1706279129-logo-eco-service.png"
                                    alt="">

                            </a>
                        </div>
                    </div>
                </div>
            </div>
</div>
</nav>
</header>
</div>
