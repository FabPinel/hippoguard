<footer aria-labelledby="footer-heading" class="bg-[#101827] mt-10">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="h-auto mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="py-10 xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="grid grid-cols-2 gap-8 xl:col-span-2">
                <div class="space-y-12 md:grid md:grid-cols-2 md:gap-8 md:space-y-0">
                    <div>
                        <h3 class="text-sm font-medium text-white">Boutique</h3>
                        <ul role="list" class="mt-6 space-y-6">
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Produit ménager</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-white">Zéro-déchet</h3>
                        <ul role="list" class="mt-6 space-y-6">
                            <li class="text-sm">
                                <a href="/zero-dechet" class="text-gray-300 hover:text-white">Je découvre !</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="space-y-12 md:grid md:grid-cols-2 md:gap-8 md:space-y-0">
                    <div>
                        <h3 class="text-sm font-medium text-white">Mon compte</h3>
                        <ul role="list" class="mt-6 space-y-6">
                            @auth
                                <li class="text-sm">
                                    <a href="/mon-compte" class="text-gray-300 hover:text-white">Paramètres</a>
                                </li>
                            @else
                                <li class="text-sm">
                                    <a href="/login" class="text-gray-300 hover:text-white">Se connecter</a>
                                </li>
                            @endauth
                        </ul>
                    </div>                    
                    <div>
                        <h3 class="text-sm font-medium text-white">Connectons-nous !</h3>
                        <ul role="list" class="mt-6 space-y-6">
                            <li class="text-sm">
                                <a href="/contact" class="text-gray-300 hover:text-white">Nous contacter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="">
                <a href="/">
                    <span class="sr-only">Eco-Service</span>
                    <img class="w-20"src="https://image.noelshack.com/fichiers/2024/09/6/1709410781-7a8338f69e139fcb21c949c087a45332.png" alt="">
                </a>
            </div>
        </div>

        <div class="border-t border-[#FFED91] py-10">
            <p class="text-sm text-gray-400">Copyright &copy; 2024 HippoGuard, Inc.</p>
        </div>
    </div>
</footer>