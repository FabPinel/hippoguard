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
                                <svg fill="#000000" height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M356.282,278.006c-27.648,0-50.142,22.494-50.142,50.142c0,27.648,22.494,50.142,50.142,50.142 c27.648,0,50.142-22.494,50.142-50.142C406.424,300.499,383.93,278.006,356.282,278.006z M356.282,344.861 c-9.216,0-16.714-7.498-16.714-16.714c0-9.216,7.498-16.714,16.714-16.714c9.216,0,16.714,7.498,16.714,16.714 C372.996,337.363,365.498,344.861,356.282,344.861z"></path> </g> </g> <g> <g> <path d="M155.716,278.006c-27.648,0-50.142,22.494-50.142,50.142c0,27.648,22.494,50.142,50.142,50.142 c27.648,0,50.142-22.494,50.142-50.142C205.857,300.499,183.364,278.006,155.716,278.006z M155.716,344.861 c-9.216,0-16.714-7.498-16.714-16.714c0-9.216,7.498-16.714,16.714-16.714c9.216,0,16.714,7.498,16.714,16.714 C172.429,337.363,164.932,344.861,155.716,344.861z"></path> </g> </g> <g> <g> <path d="M419.324,229.626l-19.19-95.951c-0.262-1.312-0.56-2.609-0.883-3.895l13.695-6.848 c39.642-19.818,48.186-72.527,16.854-103.859c-31.345-31.346-84.147-22.87-103.959,16.755l-15.334,30.555h-99.537l-15.333-30.555 C175.819-3.812,123.013-12.261,91.678,19.072C60.339,50.41,68.9,103.116,108.531,122.931l5.381,2.691 c-0.806,2.63-1.5,5.312-2.048,8.053l-19.19,95.951c-32.427,20.822-53.956,57.205-53.956,98.522 c0,46.953,27.805,87.527,67.812,106.14l24.997,49.995C140.076,501.379,157.261,512,176.376,512h159.248 c19.115,0,36.3-10.621,44.849-27.718l24.997-49.995c40.005-18.614,67.812-59.187,67.812-106.14 C473.28,286.831,451.752,250.448,419.324,229.626z M355.74,50.776c9.586-19.17,35.212-23.279,50.424-8.067 c15.185,15.184,11.037,40.722-8.166,50.324l-13.236,6.618c-9.941-13.077-23.591-23.056-39.206-28.505L355.74,50.776z M115.315,42.709c15.215-15.215,40.839-11.101,50.422,8.067l8.978,17.955c-17.62,4.162-33.285,13.952-44.766,27.536l-6.467-3.234 C104.272,83.427,100.134,57.889,115.315,42.709z M350.572,469.333c-2.849,5.698-8.578,9.239-14.95,9.239H176.375 c-6.371,0-12.1-3.541-14.95-9.239l-12.186-24.37c2.144,0.117,4.302,0.182,6.475,0.182h200.567c2.173,0,4.331-0.065,6.475-0.182 L350.572,469.333z M356.282,411.717H155.716c-46.08,0-83.569-37.489-83.569-83.569c0-59.796,61.252-100.202,116.092-77.01 c9.95,4.21,18.889,10.238,26.57,17.917c6.527,6.527,17.109,6.527,23.637,0c6.527-6.526,6.527-17.109,0-23.637 c-10.738-10.739-23.249-19.172-37.184-25.068c-22.849-9.662-47.93-11.627-71.38-6.32l14.761-73.801 c4.671-23.355,25.349-40.53,49.168-40.53h124.377c23.818,0,44.497,17.175,49.168,40.53l14.761,73.801 c-21.285-4.816-42.752-4.07-67.325,6.321c-13.934,5.894-26.445,14.327-37.183,25.066c-6.527,6.526-6.527,17.109,0,23.637 c6.527,6.527,17.109,6.527,23.637,0c7.681-7.681,16.619-13.708,26.568-17.916c53.585-22.663,112.039,19.354,112.039,77.009 C439.852,374.227,402.363,411.717,356.282,411.717z"></path> </g> </g> <g> <g> <circle cx="194.794" cy="150.303" r="16.714"></circle> </g> </g> <g> <g> <circle cx="317.362" cy="150.303" r="16.714"></circle> </g> </g> </g></svg>                            </a>
                        </div>
                    @elseif(Auth::user()->role == 0)
                        <p class="text-slate-800 font-semibold mr-3">Bienvenue administrateur {{ Auth::user()->username }}</p>
                        <a href="/mon-compte">
                        <svg height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-15.36 -15.36 542.72 542.72" xml:space="preserve" fill="#000000" transform="matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#000000" stroke-width="20.479960000000002"> <path style="fill:#7e7f85;" d="M429.807,19.073c-31.32-31.331-84.143-22.895-103.961,16.753l-19.98,39.958l80.222,60.591 l26.867-13.434C452.593,103.112,461.139,50.405,429.807,19.073z"></path> <path style="fill:#7f8189;" d="M195.637,35.825C175.809-3.819,123.007-12.253,91.67,19.073 c-31.337,31.338-22.783,84.043,16.857,103.869l19.321,9.658l87.741-56.864L195.637,35.825z"></path> <path style="fill:#D8B68A;" d="M406.171,42.709c-15.193-15.204-40.834-11.119-50.422,8.069l-16.949,33.895l32.336,21.798 l26.867-13.434C417.182,83.449,421.376,57.926,406.171,42.709z"></path> <path style="fill:#E6C892;" d="M165.733,50.777c-9.557-19.127-35.196-23.324-50.427-8.069c-15.22,15.232-10.997,40.751,8.172,50.329 l19.321,9.658l38.822-20.14L165.733,50.777z"></path> <path style="fill:#7e7f85;" d="M408.214,428.871l-27.746,55.382c-8.579,17.16-25.74,27.746-44.794,27.746H176.326 c-19.055,0-36.215-10.586-44.794-27.746l-27.746-55.382c-4.124-8.246-0.781-18.275,7.465-22.397h289.499 C408.995,410.598,412.339,420.626,408.214,428.871z"></path> <path style="fill:#7e7f85;" d="M408.214,428.871l-27.746,55.382c-8.579,17.16-25.74,27.746-44.794,27.746H256V406.473h144.75 C408.995,410.598,412.339,420.626,408.214,428.871z"></path> <path style="fill:#a3a5ae;" d="M419.357,229.967l-19.166-96.277c-7.8-38.89-42.343-67.193-82.012-67.193H193.821 c-39.669,0-74.212,28.304-82.012,67.193l-19.166,96.054c-32.429,20.838-53.934,57.164-53.934,98.394 c0,64.519,52.484,117.003,117.003,117.003h200.577c64.519,0,117.003-52.484,117.003-117.003 C473.291,286.909,451.786,250.693,419.357,229.967z"></path> <path style="fill:#a3a5ae;" d="M473.291,328.138c0,64.519-52.484,117.003-117.003,117.003H256V66.497h62.18 c39.669,0,74.212,28.304,81.906,66.659l19.166,96.277C451.786,250.693,473.291,286.909,473.291,328.138z"></path> <path style="fill:#616267;" d="M356.288,378.309c-27.651,0-50.144-22.494-50.144-50.144s22.494-50.144,50.144-50.144 c27.651,0,50.144,22.494,50.144,50.144S383.94,378.309,356.288,378.309z"></path> <g> <path style="fill:#696B6F;" d="M155.711,378.309c-27.651,0-50.144-22.494-50.144-50.144s22.494-50.144,50.144-50.144 s50.144,22.494,50.144,50.144S183.363,378.309,155.711,378.309z"></path> <circle style="fill:#696B6F;" cx="194.794" cy="150.31" r="16.715"></circle> </g> <circle style="fill:#616267;" cx="317.368" cy="150.31" r="16.715"></circle> </g><g id="SVGRepo_iconCarrier"> <path style="fill:#7e7f85;" d="M429.807,19.073c-31.32-31.331-84.143-22.895-103.961,16.753l-19.98,39.958l80.222,60.591 l26.867-13.434C452.593,103.112,461.139,50.405,429.807,19.073z"></path> <path style="fill:#7f8189;" d="M195.637,35.825C175.809-3.819,123.007-12.253,91.67,19.073 c-31.337,31.338-22.783,84.043,16.857,103.869l19.321,9.658l87.741-56.864L195.637,35.825z"></path> <path style="fill:#D8B68A;" d="M406.171,42.709c-15.193-15.204-40.834-11.119-50.422,8.069l-16.949,33.895l32.336,21.798 l26.867-13.434C417.182,83.449,421.376,57.926,406.171,42.709z"></path> <path style="fill:#E6C892;" d="M165.733,50.777c-9.557-19.127-35.196-23.324-50.427-8.069c-15.22,15.232-10.997,40.751,8.172,50.329 l19.321,9.658l38.822-20.14L165.733,50.777z"></path> <path style="fill:#7e7f85;" d="M408.214,428.871l-27.746,55.382c-8.579,17.16-25.74,27.746-44.794,27.746H176.326 c-19.055,0-36.215-10.586-44.794-27.746l-27.746-55.382c-4.124-8.246-0.781-18.275,7.465-22.397h289.499 C408.995,410.598,412.339,420.626,408.214,428.871z"></path> <path style="fill:#7e7f85;" d="M408.214,428.871l-27.746,55.382c-8.579,17.16-25.74,27.746-44.794,27.746H256V406.473h144.75 C408.995,410.598,412.339,420.626,408.214,428.871z"></path> <path style="fill:#a3a5ae;" d="M419.357,229.967l-19.166-96.277c-7.8-38.89-42.343-67.193-82.012-67.193H193.821 c-39.669,0-74.212,28.304-82.012,67.193l-19.166,96.054c-32.429,20.838-53.934,57.164-53.934,98.394 c0,64.519,52.484,117.003,117.003,117.003h200.577c64.519,0,117.003-52.484,117.003-117.003 C473.291,286.909,451.786,250.693,419.357,229.967z"></path> <path style="fill:#a3a5ae;" d="M473.291,328.138c0,64.519-52.484,117.003-117.003,117.003H256V66.497h62.18 c39.669,0,74.212,28.304,81.906,66.659l19.166,96.277C451.786,250.693,473.291,286.909,473.291,328.138z"></path> <path style="fill:#616267;" d="M356.288,378.309c-27.651,0-50.144-22.494-50.144-50.144s22.494-50.144,50.144-50.144 c27.651,0,50.144,22.494,50.144,50.144S383.94,378.309,356.288,378.309z"></path> <g> <path style="fill:#696B6F;" d="M155.711,378.309c-27.651,0-50.144-22.494-50.144-50.144s22.494-50.144,50.144-50.144 s50.144,22.494,50.144,50.144S183.363,378.309,155.711,378.309z"></path> <circle style="fill:#696B6F;" cx="194.794" cy="150.31" r="16.715"></circle> </g> <circle style="fill:#616267;" cx="317.368" cy="150.31" r="16.715"></circle> </g></svg>
                        <a class="text-rose-700" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg height="24px" width="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    @else
                        <p class="text-slate-800 font-semibold">Bienvenue {{ Auth::user()->username }}</p>
                        <a href="/mon-compte">
                        <svg height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-15.36 -15.36 542.72 542.72" xml:space="preserve" fill="#000000" transform="matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#000000" stroke-width="20.479960000000002"> <path style="fill:#7e7f85;" d="M429.807,19.073c-31.32-31.331-84.143-22.895-103.961,16.753l-19.98,39.958l80.222,60.591 l26.867-13.434C452.593,103.112,461.139,50.405,429.807,19.073z"></path> <path style="fill:#7f8189;" d="M195.637,35.825C175.809-3.819,123.007-12.253,91.67,19.073 c-31.337,31.338-22.783,84.043,16.857,103.869l19.321,9.658l87.741-56.864L195.637,35.825z"></path> <path style="fill:#D8B68A;" d="M406.171,42.709c-15.193-15.204-40.834-11.119-50.422,8.069l-16.949,33.895l32.336,21.798 l26.867-13.434C417.182,83.449,421.376,57.926,406.171,42.709z"></path> <path style="fill:#E6C892;" d="M165.733,50.777c-9.557-19.127-35.196-23.324-50.427-8.069c-15.22,15.232-10.997,40.751,8.172,50.329 l19.321,9.658l38.822-20.14L165.733,50.777z"></path> <path style="fill:#7e7f85;" d="M408.214,428.871l-27.746,55.382c-8.579,17.16-25.74,27.746-44.794,27.746H176.326 c-19.055,0-36.215-10.586-44.794-27.746l-27.746-55.382c-4.124-8.246-0.781-18.275,7.465-22.397h289.499 C408.995,410.598,412.339,420.626,408.214,428.871z"></path> <path style="fill:#7e7f85;" d="M408.214,428.871l-27.746,55.382c-8.579,17.16-25.74,27.746-44.794,27.746H256V406.473h144.75 C408.995,410.598,412.339,420.626,408.214,428.871z"></path> <path style="fill:#a3a5ae;" d="M419.357,229.967l-19.166-96.277c-7.8-38.89-42.343-67.193-82.012-67.193H193.821 c-39.669,0-74.212,28.304-82.012,67.193l-19.166,96.054c-32.429,20.838-53.934,57.164-53.934,98.394 c0,64.519,52.484,117.003,117.003,117.003h200.577c64.519,0,117.003-52.484,117.003-117.003 C473.291,286.909,451.786,250.693,419.357,229.967z"></path> <path style="fill:#a3a5ae;" d="M473.291,328.138c0,64.519-52.484,117.003-117.003,117.003H256V66.497h62.18 c39.669,0,74.212,28.304,81.906,66.659l19.166,96.277C451.786,250.693,473.291,286.909,473.291,328.138z"></path> <path style="fill:#616267;" d="M356.288,378.309c-27.651,0-50.144-22.494-50.144-50.144s22.494-50.144,50.144-50.144 c27.651,0,50.144,22.494,50.144,50.144S383.94,378.309,356.288,378.309z"></path> <g> <path style="fill:#696B6F;" d="M155.711,378.309c-27.651,0-50.144-22.494-50.144-50.144s22.494-50.144,50.144-50.144 s50.144,22.494,50.144,50.144S183.363,378.309,155.711,378.309z"></path> <circle style="fill:#696B6F;" cx="194.794" cy="150.31" r="16.715"></circle> </g> <circle style="fill:#616267;" cx="317.368" cy="150.31" r="16.715"></circle> </g><g id="SVGRepo_iconCarrier"> <path style="fill:#7e7f85;" d="M429.807,19.073c-31.32-31.331-84.143-22.895-103.961,16.753l-19.98,39.958l80.222,60.591 l26.867-13.434C452.593,103.112,461.139,50.405,429.807,19.073z"></path> <path style="fill:#7f8189;" d="M195.637,35.825C175.809-3.819,123.007-12.253,91.67,19.073 c-31.337,31.338-22.783,84.043,16.857,103.869l19.321,9.658l87.741-56.864L195.637,35.825z"></path> <path style="fill:#D8B68A;" d="M406.171,42.709c-15.193-15.204-40.834-11.119-50.422,8.069l-16.949,33.895l32.336,21.798 l26.867-13.434C417.182,83.449,421.376,57.926,406.171,42.709z"></path> <path style="fill:#E6C892;" d="M165.733,50.777c-9.557-19.127-35.196-23.324-50.427-8.069c-15.22,15.232-10.997,40.751,8.172,50.329 l19.321,9.658l38.822-20.14L165.733,50.777z"></path> <path style="fill:#7e7f85;" d="M408.214,428.871l-27.746,55.382c-8.579,17.16-25.74,27.746-44.794,27.746H176.326 c-19.055,0-36.215-10.586-44.794-27.746l-27.746-55.382c-4.124-8.246-0.781-18.275,7.465-22.397h289.499 C408.995,410.598,412.339,420.626,408.214,428.871z"></path> <path style="fill:#7e7f85;" d="M408.214,428.871l-27.746,55.382c-8.579,17.16-25.74,27.746-44.794,27.746H256V406.473h144.75 C408.995,410.598,412.339,420.626,408.214,428.871z"></path> <path style="fill:#a3a5ae;" d="M419.357,229.967l-19.166-96.277c-7.8-38.89-42.343-67.193-82.012-67.193H193.821 c-39.669,0-74.212,28.304-82.012,67.193l-19.166,96.054c-32.429,20.838-53.934,57.164-53.934,98.394 c0,64.519,52.484,117.003,117.003,117.003h200.577c64.519,0,117.003-52.484,117.003-117.003 C473.291,286.909,451.786,250.693,419.357,229.967z"></path> <path style="fill:#a3a5ae;" d="M473.291,328.138c0,64.519-52.484,117.003-117.003,117.003H256V66.497h62.18 c39.669,0,74.212,28.304,81.906,66.659l19.166,96.277C451.786,250.693,473.291,286.909,473.291,328.138z"></path> <path style="fill:#616267;" d="M356.288,378.309c-27.651,0-50.144-22.494-50.144-50.144s22.494-50.144,50.144-50.144 c27.651,0,50.144,22.494,50.144,50.144S383.94,378.309,356.288,378.309z"></path> <g> <path style="fill:#696B6F;" d="M155.711,378.309c-27.651,0-50.144-22.494-50.144-50.144s22.494-50.144,50.144-50.144 s50.144,22.494,50.144,50.144S183.363,378.309,155.711,378.309z"></path> <circle style="fill:#696B6F;" cx="194.794" cy="150.31" r="16.715"></circle> </g> <circle style="fill:#616267;" cx="317.368" cy="150.31" r="16.715"></circle> </g></svg>
                        </a>
                        <a class="text-rose-700" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg height="24px" width="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>                        </a>
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
