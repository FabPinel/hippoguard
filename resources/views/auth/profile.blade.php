@extends('layout')
@section('pageTitle', 'Mon compte')
@section('content')
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
            Modification sauvegardée
            </h5>
            <p class="text-sm leading-relaxed text-[#34D399]">
            {{ $message }}
            </p>
        </div>
        </div>
        <div id="successMessage"
        class="md:hidden fixed top-28 ml-2 mr-2 w-full flex border-l-8 border-[#34D399] bg-[#CBF5E6] px-2 py-3 shadow-md">
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
            Modification sauvegardée
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
    }, 5000);
    </script>
    <main x-data="{ activeTab: parseInt(localStorage.getItem('activeTab')) || 1 }" x-init="activeTab = 1">
        <h1 class="sr-only">Paramètre de comptes</h1>

        <header class="border-b border-black/20">
            <nav class="flex overflow-x-auto py-4">
                <ul role="list" class="flex min-w-full flex-none gap-x-6 px-4 text-sm font-semibold leading-6 text-gray-400 sm:px-6 lg:px-8">
                    <li>
                        <p class="text-[#1c3242] cursor-pointer" x-on:click="activeTab = 1; localStorage.setItem('activeTab', 1)"
                        :class="{'text-[#e88229] shadow-sm cursor-pointer': activeTab === 1,'text-gray-400 shadow-sm cursor-pointer': activeTab !== 1}">Mon compte</p>
                    </li>
                    <li>
                        <p class="cursor-pointer" x-on:click="activeTab = 2; localStorage.setItem('activeTab', 2)"
                        :class="{'text-[#e88229] shadow-sm cursor-pointer': activeTab === 2,'text-gray-400 shadow-sm cursor-pointer': activeTab !== 2}">Mes commandes</p>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Settings forms -->
        <div x-show="activeTab === 1" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:pb-24">
            <div class="max-w-xl">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Votre compte</h1>
                <p class="mt-2 text-sm text-gray-500">Vérifier vos informations et vos adresse de livraison.</p>
            </div>
            <div class="divide-y divide-black/20">
                <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-black">Vos Informations</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-400">Utilisez une adresse email valide pour recevoir vos emails.</p>
                    </div>

                    <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST" class="md:col-span-2">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="username" class="block text-sm font-medium leading-6 text-black">Pseudo</label>
                                <div class="mt-2">
                                <input id="username" name="username" autocomplete="username" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" value="{{ auth()->user()->username }}">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium leading-6 text-black">Prénom</label>
                                <div class="mt-2">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" value="{{ auth()->user()->first_name }}">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium leading-6 text-black">Nom</label>
                                <div class="mt-2">
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" value="{{ auth()->user()->last_name }}">
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="email" class="block text-sm font-medium leading-6 text-black">Adresse email</label>
                                <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex">
                            <button type="submit" class="rounded-md bg-[#1c3242] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sauvegarder</button>
                        </div>
                    </form>
                </div>


                <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-black">Vos adresses</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-400">Mettre à jour vos adresses associé à votre compte.</p>
                    </div>
                    <form action="{{ route('profile.address') }}" method="POST" class="md:col-span-2" x-data="{ selectedAddress: {{ $userAddress && $userAddress->default == 1 ? $userAddress->toJson() : '{}' }} }">                        @csrf
                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                            <input type="hidden" name="selectedAddressId" x-model="selectedAddress.id">
                            <div class="col-span-full">
                                <label for="current-password" class="block text-sm font-medium leading-6 text-black">Existantes</label>
                                <div class="mt-2">
                                    <select id="userAddress" name="userAddress" autocomplete="address-line" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" x-on:change="selectedAddress = JSON.parse($event.target.value)">
                                        @foreach($allUserAddresses as $address)
                                        <option value="{{ $address->toJson() }}" @if($userAddress && $userAddress->id == $address->id) selected @elseif($address->default == 1) selected @endif>
                                            {{ $address->address_line }}, {{ $address->city }}, {{ $address->postalCode }}, {{ $address->country }}
                                            @if($address->default == 1) (Par défaut) @endif
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-span-full">
                                <input type="checkbox" id="default-address" name="default-address" value="1" x-model="selectedAddress.default" x-bind:checked="selectedAddress.default == 1 ? true : false">
                                <label for="default-address" class="text-sm font-medium leading-6 text-black">Adresse par défaut</label>
                            </div> --}}

                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium leading-6 text-black">Prénom</label>
                                <div class="mt-2">
                                <input type="text" name="first-name" id="first-name" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" x-model="selectedAddress.first_name">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium leading-6 text-black">Nom</label>
                                <div class="mt-2">
                                <input type="text" name="last-name" id="last-name" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" x-model="selectedAddress.last_name">
                                </div>
                            </div>

                            <div class="col-span-3">
                                <label for="address" class="block text-sm font-medium leading-6 text-black">Adresse</label>
                                <div class="mt-2">
                                <input id="address" name="address" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" x-model="selectedAddress.address_line">
                                </div>
                            </div>

                            <div class="col-span-3">
                                <label for="postal-code" class="block text-sm font-medium leading-6 text-black">Code postal</label>
                                <div class="mt-2">
                                <input id="postal-code" name="postal-code" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" x-model="selectedAddress.postalCode">
                                </div>
                            </div>

                            <div class="col-span-3">
                                <label for="city" class="block text-sm font-medium leading-6 text-black">Ville</label>
                                <div class="mt-2">
                                <input id="city" name="city" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" x-model="selectedAddress.city">
                                </div>
                            </div>

                            <div class="col-span-3">
                                <label for="country" class="block text-sm font-medium leading-6 text-black">Pays</label>
                                <div class="mt-2">
                                <input id="country" name="country" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" x-model="selectedAddress.country">
                                </div>
                            </div>
                            <div class="col-span-3">
                                <label for="phone" class="block text-sm font-medium leading-6 text-black">Téléphone</label>
                                <div class="mt-2">
                                <input id="phone" name="phone" class="block w-full rounded-md border-0 bg-grey/5 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black/20 focus:ring-2 focus:ring-inset focus:ring-[# 1c3242] sm:text-sm sm:leading-6" x-model="selectedAddress.phone">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex">
                            <button type="submit" class="rounded-md bg-[#1c3242] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div x-show="activeTab === 2">
            <div class="bg-white">
                <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:pb-24">
                  <div class="max-w-xl">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Historique de vos commandes</h1>
                    <p class="mt-2 text-sm text-gray-500">Vérifier vos numéros de commande pour toutes demandes.</p>
                  </div>

                  <div class="mt-16">
                    <h2 class="sr-only">Commande récentes</h2>

                    <div class="space-y-20">
                        @foreach($userOrders as $order)
                        <div>
                            <h3 class="sr-only">Commandé le <time datetime="{{ $order->created_at->format('Y-m-d') }}">{{ $order->created_at->translatedFormat('d F, Y') }}</time></h3>

                            <div class="rounded-lg bg-[#1c3242] px-4 py-6 sm:flex sm:items-center sm:justify-between sm:space-x-6 sm:px-6 lg:space-x-8">
                                <dl class="flex-auto space-y-6 divide-y divide-gray-200 text-sm text-gray-600 sm:grid sm:grid-cols-3 sm:gap-x-6 sm:space-y-0 sm:divide-y-0 lg:w-1/2 lg:flex-none lg:gap-x-8">
                                    <div class="flex justify-between sm:block">
                                        <dt class="font-medium text-white">Le</dt>
                                        <dd class="sm:mt-1 text-white">
                                            <time datetime="{{ $order->created_at->format('Y-m-d') }}">
                                                {{ $order->created_at->translatedFormat('d F, Y') }}
                                            </time>
                                        </dd>
                                    </div>
                                    <div class="flex justify-between pt-6 sm:block sm:pt-0">
                                        <dt class="font-medium text-white">Nuémro de commande</dt>
                                        <dd class="sm:mt-1 text-white">#{{ $order->id }}</dd>
                                    </div>
                                    <div class="flex justify-between pt-6 font-medium text-white sm:block sm:pt-0">
                                        <dt>Total</dt>
                                        <dd class="sm:mt-1">{{ number_format($order->total, 2) }}€</dd>
                                    </div>
                                </dl>
                            </div>

                            <table class="mt-4 w-full text-gray-500 sm:mt-6">
                                <caption class="sr-only">Produits</caption>
                                <thead class="sr-only text-left text-sm text-gray-500 sm:not-sr-only">
                                    <tr>
                                        <th scope="col" class="py-3 pr-8 font-normal sm:w-2/5 lg:w-1/3">Produits</th>
                                        <th scope="col" class="hidden w-1/5 py-3 pr-8 font-normal sm:table-cell">Prix</th>
                                        <th scope="col" class="hidden py-3 pr-8 font-normal sm:table-cell">Quantité</th>
                                        <th scope="col" class="w-0 py-3 text-right font-normal">Info</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 border-b border-gray-200 text-sm sm:border-t">
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td class="py-6 pr-8">
                                            <div class="flex items-center">
                                                <img src="{{ asset('storage/app/public/images/' . $item->product->media) }}" alt="{{ $item->product->name }}" class="mr-6 h-16 w-16 rounded object-cover object-center">
                                                <div>
                                                    <div class="font-medium text-gray-900">{{ $item->product->name }}</div>
                                                    <div class="mt-1 sm:hidden">{{ number_format($item->product->price, 2) }}€</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden py-6 pr-8 sm:table-cell">{{ number_format($item->product->price, 2) }}€</td>
                                        <td class="hidden py-6 pr-8 sm:table-cell">{{ $item->quantity }}</td>
                                        <td class="whitespace-nowrap py-6 text-right font-medium">
                                            <a href="{{ route('shop.productName', $item->product->id) }}" class="text-[#e88229]">Voir<span class="hidden lg:inline"> le produit</span><span class="sr-only">, {{ $item->product->name }}</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                    {!! $userOrders->links() !!}
                  </div>
                </div>
              </div>
        </div>
    </main>
@endsection
