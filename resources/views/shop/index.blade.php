@extends('layout')
@section('pageTitle', "Boutique")
@section('content')
    <div class="bg-white">
        <div>
            <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900">Boutique</h1>

                    {{-- <div x-data="{ isOpen: false }" class="flex items-center">
                        <div class="relative inline-block text-left">
                            <div>
                                <button @click="isOpen = !isOpen"
                                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                    id="menu-button" :aria-expanded="isOpen.toString()" aria-haspopup="true">
                                    Trier
                                    <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <div x-show="isOpen" @click.away="isOpen = false"
                                class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                        tabindex="-1" id="menu-item-2">Récent</a>
                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                        tabindex="-1" id="menu-item-3">Prix le plus bas</a>
                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                        tabindex="-1" id="menu-item-4">Prix le plus haut</a>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                            <span class="sr-only">View grid</span>
                            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                                <!-- ... -->
                            </svg>
                        </button>
                        <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                            <span class="sr-only">Filters</span>
                            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                                <!-- ... -->
                            </svg>
                        </button>
                    </div> --}}

                </div>

                <section aria-labelledby="products-heading" class="pb-24 pt-6">
                    <h2 id="products-heading" class="sr-only">Products</h2>
                    
                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4" x-data="{
                        isOpen: true,
                        selectedCategory: null,
                        toggleCategory(categoryId) {
                            if (this.selectedCategory === categoryId) {
                                this.selectedCategory = null;
                            } else {
                                this.selectedCategory = categoryId;
                            }
                        }
                        }">
                        <!-- Filters -->
                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                                <!-- Expand/collapse section button -->
                                <button @click="isOpen = !isOpen" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0">
                                    <span class="font-medium text-gray-900">Nos categories</span>
                                    <span class="ml-6 flex items-center">
                                        <!-- Expand icon, show/hide based on section open state. -->
                                        <svg x-show="!isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                        <svg x-show="isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div x-show="isOpen" class="pt-6" id="filter-section-0">
                                <div class="space-y-4">
                                    @foreach ($categories as $category)
                                        <div class="flex items-center">
                                            <input id="filter-category-{{ $category->id }}" name="category[]" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                x-on:click="toggleCategory('{{ $category->id }}')"
                                                x-bind:checked="selectedCategory === '{{ $category->id }}'">
                                            <label for="filter-category-{{ $category->id }}" class="ml-3 text-sm text-gray-600">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Product grid -->
                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-4 lg:col-span-3 lg:gap-x-8">
                            @foreach ($products as $product)
                                <a href="{{ route('shop.productName', $product->id) }}" class="group text-sm"
                                    x-show="!selectedCategory || '{{ $product->id_category }}' == selectedCategory">
                                    <div
                                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                        <img class="h-full w-full object-cover object-center"
                                        src="{{ asset('storage/app/public/images/' . $product->media) }}"
                                        alt="{{ $product->name }}"> 
                                    </div>
                                    <h3 class="mt-4 font-medium text-gray-900">{{ $product->name }}</h3>
                                    <p class="mt-2 font-medium text-gray-900">{{ $product->price }}€</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </section>                
            </main>
        </div>
    </div>
@endsection
