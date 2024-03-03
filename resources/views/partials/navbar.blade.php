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
                        <a href="/zero-dechet" class="-m-2 block p-2 font-medium text-gray-900">À la une</a>
                    </div>
                </div>
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/boutique" class="-m-2 block p-2 font-medium text-gray-900">Boutique</a>
                    </div>
                </div>
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/contact" class="-m-2 block p-2 font-medium text-gray-900">Contact</a>
                    </div>
                </div>
                @auth
                    @if (Auth::user()->role == 0)
                        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                            <div class="flow-root">
                                <a href="{{ route('admin.products.index') }}"
                                    class="-m-2 block p-2 font-medium text-gray-900">Admin</a>
                            </div>
                        </div>
                    @endif
                @endauth
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/register" class="-m-2 block p-2 font-medium text-black">Créer un compte</a>
                    </div>
                    <div class="flow-root">
                        <a href="/login" class="-m-2 block p-2 font-medium text-black">Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Laptop Menu -->
    <header class="relative z-10" x-data="{ isSticky: false }"
        @scroll.window="isSticky = window.scrollY >= $refs.nav.offsetHeight">
        <nav aria-label="Top">
            <!-- Top navigation -->
            <div class="bg-[#FFED91]" x-ref="nav">
                <div class="ml-auto flex h-10 w-full items-center justify-end gap-2 px-4 sm:px-6 lg:px-8">
                    @guest
                        <div class="flex items-center space-x-6">
                            <a href="/login" class="text-sm font-medium text-black hover:text-gray-500">Se connecter</a>
                            <a href="/register" class="text-sm font-medium text-black hover:text-gray-500">Créer un compte
                            </a>
                            <a href="/register">
                                <svg width="24" height="24" viewBox="-1.28 0 22.015264 22.015264" xmlns="http://www.w3.org/2000/svg"><defs id="defs2"><clipPath clipPathUnits="userSpaceOnUse" id="clipPath23"><rect height="170.00711" id="rect25" style="opacity:1;fill:none;fill-opacity:1;stroke:#000000;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.97641512" transform="rotate(90)" width="263.84616" x="6.7847877" y="110.36194"></rect></clipPath></defs><g id="layer1" transform="translate(93.907898,-380.07327)"><rect height="58.184261" id="rect8011" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="150.11761" x="-377.22021" y="-198.90477"></rect></g><g id="g8681" transform="translate(93.907898,-380.07327)"><rect height="58.184261" id="rect8677" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="150.11761" x="-377.22021" y="-198.90477"></rect></g><g id="g9233" transform="translate(93.907898,-380.07327)"><rect height="58.184261" id="rect9229" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="150.11761" x="-377.22021" y="-198.90477"></rect><rect height="368.83194" id="rect9311" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="313.2399" x="-594.38983" y="-161.63449"></rect><ellipse cx="-84.68187" cy="401.70398" id="path981-7" rx="4.7929468" ry="0.3845554" style="opacity:1;fill:#b3b3b3;fill-opacity:1;stroke:none;stroke-width:0.98528439;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"></ellipse><path d="m -87.519525,401.26091 h 5.809952" id="path977-8" style="opacity:1;fill:none;fill-opacity:1;stroke:#241f1c;stroke-width:0.64254844;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"></path><path d="m -88.28548,393.90715 c 0,0 -0.265975,3.34555 3.137411,2.68481" id="path972-85" style="opacity:1;fill:none;fill-opacity:1;stroke:#241f1c;stroke-width:0.74110579;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"></path><path d="m -85.046401,398.83771 6.321522,-8.18582 0.982417,0.61423 -6.288626,8.19611 z" id="path979-8" style="opacity:1;fill:#784421;fill-opacity:1;stroke:#241f1c;stroke-width:0.80890197;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"></path><circle cx="-83.715378" cy="384.13559" id="path837-7-1-6" r="3.5532026" style="opacity:1;fill:#64748b;fill-opacity:1;stroke:#241f1c;stroke-width:1.0182327;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.98823529"></circle><path d="m -85.227156,401.16307 -0.03933,-9.52096 1.291069,-1.3e-4 0.07541,9.51292 z" id="path979-8-6" style="opacity:1;fill:#475569;fill-opacity:1;stroke:#241f1c;stroke-width:0.80890197;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"></path><ellipse cx="-88.172424" cy="388.7153" id="path837-7-80" rx="5.226357" ry="4.9187932" style="opacity:1;fill:#94a3b8;fill-opacity:1;stroke:#241f1c;stroke-width:1.0182327;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.98431373"></ellipse><circle cx="-79.798553" cy="389.70914" id="path837-2" r="4.8287106" style="opacity:1;fill:#cbd5e1;fill-opacity:1;stroke:#241f1c;stroke-width:1.0182327;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.98823529"></circle><ellipse cx="-89.029747" cy="391.79663" id="ellipse8289" rx="3.0242589" ry="2.8062947" style="opacity:1;fill:#cbd5e1;fill-opacity:1;stroke:#241f1c;stroke-width:1.01823282;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"></ellipse></g></svg>
                            </a>
                        </div>
                    @elseif(Auth::user()->role == 0)
                        <p class="text-white mr-3">Bienvenue administrateur {{ Auth::user()->username }}</p>
                        <a href="/mon-compte">
                          <svg width="24" height="24" viewBox="-1.28 0 22.015264 22.015264" xmlns="http://www.w3.org/2000/svg"><defs id="defs2"><clipPath clipPathUnits="userSpaceOnUse" id="clipPath23"><rect height="170.00711" id="rect25" style="opacity:1;fill:none;fill-opacity:1;stroke:#000000;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.97641512" transform="rotate(90)" width="263.84616" x="6.7847877" y="110.36194" /></clipPath></defs><g id="layer1" transform="translate(93.907898,-380.07327)"><rect height="58.184261" id="rect8011" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="150.11761" x="-377.22021" y="-198.90477" /></g><g id="g8681" transform="translate(93.907898,-380.07327)"><rect height="58.184261" id="rect8677" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="150.11761" x="-377.22021" y="-198.90477" /></g><g id="g9233" transform="translate(93.907898,-380.07327)"><rect height="58.184261" id="rect9229" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="150.11761" x="-377.22021" y="-198.90477" /><rect height="368.83194" id="rect9311" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="313.2399" x="-594.38983" y="-161.63449" /><ellipse cx="-84.68187" cy="401.70398" id="path981-7" rx="4.7929468" ry="0.3845554" style="opacity:1;fill:#b3b3b3;fill-opacity:1;stroke:none;stroke-width:0.98528439;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><path d="m -87.519525,401.26091 h 5.809952" id="path977-8" style="opacity:1;fill:none;fill-opacity:1;stroke:#241f1c;stroke-width:0.64254844;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><path d="m -88.28548,393.90715 c 0,0 -0.265975,3.34555 3.137411,2.68481" id="path972-85" style="opacity:1;fill:none;fill-opacity:1;stroke:#241f1c;stroke-width:0.74110579;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><path d="m -85.046401,398.83771 6.321522,-8.18582 0.982417,0.61423 -6.288626,8.19611 z" id="path979-8" style="opacity:1;fill:#784421;fill-opacity:1;stroke:#241f1c;stroke-width:0.80890197;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><circle cx="-83.715378" cy="384.13559" id="path837-7-1-6" r="3.5532026" style="opacity:1;fill:#2ca02c;fill-opacity:1;stroke:#241f1c;stroke-width:1.0182327;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.98823529" /><path d="m -85.227156,401.16307 -0.03933,-9.52096 1.291069,-1.3e-4 0.07541,9.51292 z" id="path979-8-6" style="opacity:1;fill:#784421;fill-opacity:1;stroke:#241f1c;stroke-width:0.80890197;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><ellipse cx="-88.172424" cy="388.7153" id="path837-7-80" rx="5.226357" ry="4.9187932" style="opacity:1;fill:#37c837;fill-opacity:1;stroke:#241f1c;stroke-width:1.0182327;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.98431373" /><circle cx="-79.798553" cy="389.70914" id="path837-2" r="4.8287106" style="opacity:1;fill:#5fd35f;fill-opacity:1;stroke:#241f1c;stroke-width:1.0182327;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.98823529" /><ellipse cx="-89.029747" cy="391.79663" id="ellipse8289" rx="3.0242589" ry="2.8062947" style="opacity:1;fill:#2ca02c;fill-opacity:1;stroke:#241f1c;stroke-width:1.01823282;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /></g></svg>
                        </a>
                        <a class="text-rose-700" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg height="24px" width="24px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><circle style="fill:#E5E5E5;" cx="256" cy="256" r="244.87"/><g><circle style="fill:#AFAFAF;" cx="77.913" cy="256" r="22.261"/><circle style="fill:#AFAFAF;" cx="144.696" cy="367.304" r="44.522"/><circle style="fill:#AFAFAF;" cx="367.304" cy="211.478" r="66.783"/></g><path d="M437.02,74.98C388.667,26.628,324.381,0,256,0S123.333,26.628,74.98,74.98C26.628,123.333,0,187.62,0,256s26.628,132.667,74.98,181.02C123.333,485.372,187.619,512,256,512s132.667-26.628,181.02-74.98C485.372,388.667,512,324.38,512,256S485.372,123.333,437.02,74.98z M256,489.739C127.116,489.739,22.261,384.884,22.261,256S127.116,22.261,256,22.261S489.739,127.116,489.739,256S384.884,489.739,256,489.739z"/><path d="M256,44.522c-48.272,0-95.484,16.691-132.939,46.999c-4.779,3.867-5.518,10.876-1.651,15.654c2.199,2.718,5.415,4.129,8.658,4.129c2.459,0,4.935-0.811,6.994-2.479C170.571,81.714,212.808,66.783,256,66.783c6.146,0,11.13-4.983,11.13-11.13S262.146,44.522,256,44.522z"/><path d="M99.286,130.753c2.119,1.881,4.756,2.805,7.384,2.805c3.072,0,6.131-1.264,8.329-3.743l0.158-0.176c4.115-4.567,3.749-11.605-0.818-15.72c-4.566-4.115-11.606-3.749-15.718,0.818l-0.27,0.302C94.268,119.638,94.688,126.672,99.286,130.753z"/><path d="M111.304,256c0-18.412-14.979-33.391-33.391-33.391S44.522,237.588,44.522,256s14.979,33.391,33.391,33.391S111.304,274.412,111.304,256z M77.913,267.13c-6.137,0-11.13-4.993-11.13-11.13c0-6.137,4.993-11.13,11.13-11.13s11.13,4.993,11.13,11.13C89.043,262.137,84.05,267.13,77.913,267.13z"/><path d="M144.696,311.652c-30.687,0-55.652,24.966-55.652,55.652s24.966,55.652,55.652,55.652s55.652-24.966,55.652-55.652S175.382,311.652,144.696,311.652z M144.696,400.696c-18.412,0-33.391-14.979-33.391-33.391s14.979-33.391,33.391-33.391s33.391,14.979,33.391,33.391S163.108,400.696,144.696,400.696z"/><path d="M367.304,133.565c-42.961,0-77.913,34.952-77.913,77.913s34.952,77.913,77.913,77.913s77.913-34.952,77.913-77.913S410.266,133.565,367.304,133.565z M367.304,267.13c-30.687,0-55.652-24.966-55.652-55.652s24.966-55.652,55.652-55.652s55.652,24.966,55.652,55.652S397.991,267.13,367.304,267.13z"/></svg>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    @else
                        <p class="text-white">Bienvenue {{ Auth::user()->username }}</p>
                            <svg width="24" height="24" viewBox="-1.28 0 22.015264 22.015264" xmlns="http://www.w3.org/2000/svg"><defs id="defs2"><clipPath clipPathUnits="userSpaceOnUse" id="clipPath23"><rect height="170.00711" id="rect25" style="opacity:1;fill:none;fill-opacity:1;stroke:#000000;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.97641512" transform="rotate(90)" width="263.84616" x="6.7847877" y="110.36194" /></clipPath></defs><g id="layer1" transform="translate(93.907898,-380.07327)"><rect height="58.184261" id="rect8011" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="150.11761" x="-377.22021" y="-198.90477" /></g><g id="g8681" transform="translate(93.907898,-380.07327)"><rect height="58.184261" id="rect8677" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="150.11761" x="-377.22021" y="-198.90477" /></g><g id="g9233" transform="translate(93.907898,-380.07327)"><rect height="58.184261" id="rect9229" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="150.11761" x="-377.22021" y="-198.90477" /><rect height="368.83194" id="rect9311" ry="1.1433572" style="opacity:1;fill:none;fill-opacity:1;stroke:none;stroke-width:1.10699999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" width="313.2399" x="-594.38983" y="-161.63449" /><ellipse cx="-84.68187" cy="401.70398" id="path981-7" rx="4.7929468" ry="0.3845554" style="opacity:1;fill:#b3b3b3;fill-opacity:1;stroke:none;stroke-width:0.98528439;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><path d="m -87.519525,401.26091 h 5.809952" id="path977-8" style="opacity:1;fill:none;fill-opacity:1;stroke:#241f1c;stroke-width:0.64254844;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><path d="m -88.28548,393.90715 c 0,0 -0.265975,3.34555 3.137411,2.68481" id="path972-85" style="opacity:1;fill:none;fill-opacity:1;stroke:#241f1c;stroke-width:0.74110579;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><path d="m -85.046401,398.83771 6.321522,-8.18582 0.982417,0.61423 -6.288626,8.19611 z" id="path979-8" style="opacity:1;fill:#784421;fill-opacity:1;stroke:#241f1c;stroke-width:0.80890197;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><circle cx="-83.715378" cy="384.13559" id="path837-7-1-6" r="3.5532026" style="opacity:1;fill:#2ca02c;fill-opacity:1;stroke:#241f1c;stroke-width:1.0182327;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.98823529" /><path d="m -85.227156,401.16307 -0.03933,-9.52096 1.291069,-1.3e-4 0.07541,9.51292 z" id="path979-8-6" style="opacity:1;fill:#784421;fill-opacity:1;stroke:#241f1c;stroke-width:0.80890197;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /><ellipse cx="-88.172424" cy="388.7153" id="path837-7-80" rx="5.226357" ry="4.9187932" style="opacity:1;fill:#37c837;fill-opacity:1;stroke:#241f1c;stroke-width:1.0182327;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.98431373" /><circle cx="-79.798553" cy="389.70914" id="path837-2" r="4.8287106" style="opacity:1;fill:#5fd35f;fill-opacity:1;stroke:#241f1c;stroke-width:1.0182327;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.98823529" /><ellipse cx="-89.029747" cy="391.79663" id="ellipse8289" rx="3.0242589" ry="2.8062947" style="opacity:1;fill:#2ca02c;fill-opacity:1;stroke:#241f1c;stroke-width:1.01823282;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" /></g></svg>
                        <a class="text-rose-700" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           <svg height="24px" width="24px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><circle style="fill:#E5E5E5;" cx="256" cy="256" r="244.87"/><g><circle style="fill:#AFAFAF;" cx="77.913" cy="256" r="22.261"/><circle style="fill:#AFAFAF;" cx="144.696" cy="367.304" r="44.522"/><circle style="fill:#AFAFAF;" cx="367.304" cy="211.478" r="66.783"/></g><path d="M437.02,74.98C388.667,26.628,324.381,0,256,0S123.333,26.628,74.98,74.98C26.628,123.333,0,187.62,0,256s26.628,132.667,74.98,181.02C123.333,485.372,187.619,512,256,512s132.667-26.628,181.02-74.98C485.372,388.667,512,324.38,512,256S485.372,123.333,437.02,74.98z M256,489.739C127.116,489.739,22.261,384.884,22.261,256S127.116,22.261,256,22.261S489.739,127.116,489.739,256S384.884,489.739,256,489.739z"/><path d="M256,44.522c-48.272,0-95.484,16.691-132.939,46.999c-4.779,3.867-5.518,10.876-1.651,15.654c2.199,2.718,5.415,4.129,8.658,4.129c2.459,0,4.935-0.811,6.994-2.479C170.571,81.714,212.808,66.783,256,66.783c6.146,0,11.13-4.983,11.13-11.13S262.146,44.522,256,44.522z"/><path d="M99.286,130.753c2.119,1.881,4.756,2.805,7.384,2.805c3.072,0,6.131-1.264,8.329-3.743l0.158-0.176c4.115-4.567,3.749-11.605-0.818-15.72c-4.566-4.115-11.606-3.749-15.718,0.818l-0.27,0.302C94.268,119.638,94.688,126.672,99.286,130.753z"/><path d="M111.304,256c0-18.412-14.979-33.391-33.391-33.391S44.522,237.588,44.522,256s14.979,33.391,33.391,33.391S111.304,274.412,111.304,256z M77.913,267.13c-6.137,0-11.13-4.993-11.13-11.13c0-6.137,4.993-11.13,11.13-11.13s11.13,4.993,11.13,11.13C89.043,262.137,84.05,267.13,77.913,267.13z"/><path d="M144.696,311.652c-30.687,0-55.652,24.966-55.652,55.652s24.966,55.652,55.652,55.652s55.652-24.966,55.652-55.652S175.382,311.652,144.696,311.652z M144.696,400.696c-18.412,0-33.391-14.979-33.391-33.391s14.979-33.391,33.391-33.391s33.391,14.979,33.391,33.391S163.108,400.696,144.696,400.696z"/><path d="M367.304,133.565c-42.961,0-77.913,34.952-77.913,77.913s34.952,77.913,77.913,77.913s77.913-34.952,77.913-77.913S410.266,133.565,367.304,133.565z M367.304,267.13c-30.687,0-55.652-24.966-55.652-55.652s24.966-55.652,55.652-55.652s55.652,24.966,55.652,55.652S397.991,267.13,367.304,267.13z"/></svg>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    @endguest <!-- Secondary navigation -->
                </div>

            </div>
            <div :class="{ 'fixed top-0 w-full': isSticky }" class="bg-[#000000] bg-opacity-60 backdrop-blur-md backdrop-filter border-t-8 border-[#FFED91]">

                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div>
                        <div class="flex h-16 items-center justify-between">
                            <!-- Logo (lg+) -->
                            <div class="hidden lg:flex lg:flex-1 lg:items-center">
                                <a href="/">
                                    <span class="sr-only">HippoGuard</span>
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
                                                    onclick="window.location.href='{{ url('/') }}'"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">
                                                    À la une
                                                    <!-- Open: "bg-white", Closed: "" -->
                                                    <span
                                                        class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                        aria-hidden="true"></span>
                                                </button>
                                            </div>

                                            <!--
                                                    'Women' flyout menu, show/hide based on flyout menu state.

                                                    Entering: "transition ease-out duration-200"
                                                        From: "opacity-0"
                                                        To: "opacity-100"
                                                    Leaving: "transition ease-in duration-150"
                                                        From: "opacity-100"
                                                        To: "opacity-0"
                                                    -->
                                            <div class="absolute inset-x-0 top-full text-sm text-gray-500">
                                                <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                <div class="absolute inset-0 top-1/2 bg-white shadow"
                                                    aria-hidden="true"></div>


                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="relative flex">
                                                <button type="button"
                                                    onclick="window.location.href='{{ url('/boutique') }}'"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">
                                                    Boutique
                                                    <!-- Open: "bg-white", Closed: "" -->
                                                    <span
                                                        class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                        aria-hidden="true"></span>
                                                </button>
                                            </div>

                                            <!--
                                                    'Women' flyout menu, show/hide based on flyout menu state.

                                                    Entering: "transition ease-out duration-200"
                                                        From: "opacity-0"
                                                        To: "opacity-100"
                                                    Leaving: "transition ease-in duration-150"
                                                        From: "opacity-100"
                                                        To: "opacity-0"
                                                    -->

                                        </div>
                                        <button type="button" onclick="window.location.href='{{ url('/contact') }}'"
                                            class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                            aria-expanded="false">
                                            Contact
                                            <!-- Open: "bg-white", Closed: "" -->
                                            <span
                                                class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out"
                                                aria-hidden="true"></span>
                                        </button>


                                        @auth
                                            @if (Auth::user()->role == 0)
                                                <a href="{{ route('admin.products.index') }}"
                                                    class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out"
                                                    aria-expanded="false">Admin</a>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile menu and search (lg-) -->
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
                                <img src="https://image.noelshack.com/fichiers/2024/09/6/1709410781-7a8338f69e139fcb21c949c087a45332.png" alt="" class="h-12 w-auto">
                            </a>

                            <div class="flex flex-1 items-center justify-end">
                                <div class="flex items-center lg:ml-8">
                                    <!-- Cart -->
                                    <div x-data="{ totalQuantity: 0 }" x-init="totalQuantity = Object.values(JSON.parse('{{ json_encode(session('cart', [])) }}')).reduce((acc, curr) => acc + parseInt(curr.quantity), 0)"
                                        class="ml-4 flow-root lg:ml-8">
                                        <a href="{{ route('panier') }}" class="group -m-2 flex items-center p-2">
                                            <svg class="h-6 w-6 flex-shrink-0 text-white" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>
                                            <span class="ml-2 text-sm font-medium text-white"
                                                x-text="totalQuantity"></span>
                                            <span class="sr-only">items in cart, view bag</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
