@extends('layout-admin')
@section('pageTitle', "Admin - produit")
@section('admin-content')
    <div x-data="{ activeTab: parseInt(localStorage.getItem('activeTab')) || 1 }" class="md:ml-28 md:mr-8">
        <ul class="flex justify-center space-x-4 mt-20">
            <li x-on:click="activeTab = 1; localStorage.setItem('activeTab', 1)"
                :class="{
                    'bg-[#1c3242] text-white shadow-md cursor-pointer': activeTab ===
                        1,
                    'bg-white text-black shadow-md cursor-pointer': activeTab !== 1
                }"
                class="hover:bg-[#374a56]focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-2.5 text-center">
                Produits
            </li>
            <li x-on:click="activeTab = 2; localStorage.setItem('activeTab', 2)"
                :class="{
                    'bg-[#1c3242] text-white shadow-md cursor-pointer': activeTab === 2,
                    'bg-white text-black shadow-md cursor-pointer': activeTab !== 2
                }"
                class="hover:bg-[#374a56] hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-2.5 text-center">
                Catégories
            </li>
            <li x-on:click="activeTab = 3; localStorage.setItem('activeTab', 3)"
                :class="{
                    'bg-[#1c3242] text-white shadow-md cursor-pointer': activeTab === 3,
                    'bg-white text-black shadow-md cursor-pointer': activeTab !== 3
                }"
                class="hover:bg-[#374a56] hover:text-white phpfocus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-2.5 text-center">
                Promo
            </li>
        </ul>
        <div class="px-4 sm:px-6 lg:px-8 py-6 mt-20" x-show="activeTab === 1">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Produits</h1>
                    <p class="mt-2 text-sm text-gray-700">La liste de tous les produits</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="{{ route('admin.products.create') }}"
                        class="block rounded-md bg-[#1c3242] px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter
                        un produit</a>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Id
                                    </th>
                                    <th scope="col"
                                        class="w-3 px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Nom</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Prix</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Stock</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Actif</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                        <span class="sr-only">Show</span>
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($products as $product)
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{ $product->id }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap py-3 pl-4 pr-3 text-sm sm:pl-0">
                                            <div class="flex items-center">
                                                <div class="h-14 w-14 flex-shrink-0">
                                                    <img class="h-14 w-14 rounded-md object-contain"
                                                        src="{{ asset('storage/app/public/images/' . $product->media) }}"
                                                        alt="{{ $product->name }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $product->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $product->price }}€</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $product->quantity }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <form action="{{ route('admin.products.toggle-status', $product->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                @if ($product->active != 0)
                                                    <button type="submit"
                                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</button>
                                                @else
                                                    <button type="submit"
                                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Inactive</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="text-slate-400 hover:text-slate-900">
                                                <span class="material-icons">
                                                    edit
                                                </span>
                                            </a>
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('shop.productName', $product->id) }}" class="text-[#1c3242] hover:text-[#374a56]"><span
                                                    class="material-icons">
                                                    visibility
                                                </span></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <span class="material-icons">delete</span>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>

                                    <!-- More people... -->
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>

                {!! $products->links() !!}

            </div>
        </div>

        <div class="px-4 sm:px-6 lg:px-8 mt-20" x-show="activeTab === 2">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Catégories</h1>
                    <p class="mt-2 text-sm text-gray-700">La liste de toutes les catégories</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="{{ route('admin.category.create') }}"
                        class="block rounded-md bg-[#1c3242] px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter
                        une catégorie</a>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Id
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Nom</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Description</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($categories as $category)
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{ $category->id }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $category->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $category->description }}</div>
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('admin.category.edit', $category->id) }}"
                                                class="text-slate-400 hover:text-slate-900">
                                                <span class="material-icons">
                                                    edit
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <span class="material-icons">delete</span>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
                {!! $categories->links() !!}
            </div>
        </div>

        <div class="px-4 sm:px-6 lg:px-8 mt-20" x-show="activeTab === 3">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Promotions</h1>
                    <p class="mt-2 text-sm text-gray-700">La liste de tous les codes promos</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="{{ route('admin.discounts.create') }}"
                        class="block rounded-md bg-[#1c3242] px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter
                        une promotion</a>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Id
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Nom</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Description</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Pourcentage promotion</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Montant promotion</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Promo</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 w-12">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($discounts as $discount)
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{ $discount->id }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $discount->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $discount->description }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $discount->discount_percent }}%</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $discount->discount_amount }}€</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <form action="{{ route('admin.discounts.toggle-status', $discount->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                @if ($discount->active != 0)
                                                    <button type="submit"
                                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</button>
                                                @else
                                                    <button type="submit"
                                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Inactive</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('admin.discounts.edit', $discount->id) }}"
                                                class="text-slate-400 hover:text-slate-900">
                                                <span class="material-icons">
                                                    edit
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.discounts.destroy', $discount->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <span class="material-icons">delete</span>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
                {!! $discounts->links() !!}
            </div>
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
                  Produit
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
                  Produit
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                   {{ $message }}
                </p>
            </div>
        </div>
    @endif
@endsection
