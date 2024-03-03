@extends('layout-admin')
@section('pageTitle', "Création d'un DIY")
@section('admin-content')
    <div class="space-y-10 divide-y divide-gray-900/10 mt-20">
        <div class="w-1/4 mx-auto">
            <form action="{{ route('admin.diy.store') }}" enctype="multipart/form-data"
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" method="POST"
                x-data="{
                    search: '',
                    products: {{ $products }},
                    selectedProducts: [],
                    get filteredProducts() {
                        return this.products.filter(
                            i => i.name.toLowerCase().startsWith(this.search.toLowerCase())
                        );
                    },
                    isSelected(productId) {
                        return this.selectedProducts.includes(productId);
                    },
                    toggleSelected(productId) {
                        const numericId = parseInt(productId);
                
                        if (this.isSelected(numericId)) {
                            this.selectedProducts = this.selectedProducts.filter(id => id !== numericId);
                        } else {
                            this.selectedProducts.push(numericId);
                        }
                
                        // Mettez à jour la valeur du champ caché
                        document.getElementById('selectedProducts').value = JSON.stringify(this.selectedProducts);
                    },
                    deselectProduct(productId) {
                        const numericId = parseInt(productId);
                        this.selectedProducts = this.selectedProducts.filter(id => id !== numericId);
                        // Mettez à jour la valeur du champ caché si nécessaire
                        document.getElementById('selectedProducts').value = JSON.stringify(this.selectedProducts);
                    },
                    getSelectedProductInfo(productId) {
                        const product = this.products.find(p => p.id === productId);
                        return product ? { name: product.name, media: product.media } : null;
                    },
                }">
                @csrf

                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Titre</span>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="title" id="title"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="description"
                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2 relative">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <textarea type="text" name="description" id="description"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Vidéo</span>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="video" id="video"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Contenu</span>
                            <div class="mt-2">
                                <textarea id="text" name="text" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Recette</span>
                            <div class="mt-2">
                                <textarea id="recipe" name="recipe" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Ustensiles</span>
                            <div class="mt-2">
                                <textarea id="ustensils" name="ustensils" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Etapes</span>
                            <div class="mt-2">
                                <textarea id="step" name="step" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Image</span>
                            <div class="mt-2 flex items-center gap-x-3">
                                <input type="file"
                                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                    name="image">
                            </div>
                            @error('image')
                                <div id="alert-2"
                                    class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ms-3 text-sm font-medium">
                                        {{ $message }}
                                    </div>
                                    <button type="button"
                                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                        data-dismiss-target="#alert-2" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h2>Associer des produits au diy :</h2>

                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-4 bg-white border-b border-gray-200">
                                <div class='w-full mx-auto'>
                                    <div
                                        class="relative flex items-center w-full h-12 shadow-sm rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                                        <div class="grid place-items-center h-full w-12 text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                        <input x-model="search"
                                            class="peer h-full w-full outline-none text-sm text-gray-700 pr-2"
                                            placeholder="Rechercher un produit...">
                                    </div>
                                </div>

                                <template x-if="search !== '' && filteredProducts.length > 0">
                                    <div class="shadow-lg mx-auto flex">
                                        <template x-for="product in filteredProducts" :key="product.id">
                                            <template x-if="!isSelected(product.id)">
                                                <div class="w-32 m-2 bg-slate-50 overflow-hidden rounded-lg group-hover:opacity-75"
                                                    x-bind:class="{
                                                        'bg-blue-200': isSelected(product.id),
                                                        'selected': isSelected(product.id)
                                                    }"
                                                    x-on:click="toggleSelected(product.id)">
                                                    <img class="w-16 h-16 object-cover object-center"
                                                        :src=`http://127.0.0.1:8000/storage/images/${product.media}`
                                                        alt="product.name">

                                                    <h3 x-text="product.name" class="mt-4 font-medium text-gray-900"
                                                        x-on:click="toggleSelected(product.id)"></h3>
                                                    <p class="mt-2 font-medium text-gray-900" x-text="product.price + '€'"
                                                        x-on:click="toggleSelected(product.id)"></p>
                                                </div>

                                            </template>
                                        </template>
                                    </div>
                                </template>
                                <div x-show="selectedProducts.length > 0">
                                    <p>Produits sélectionnés :</p>
                                    <div class="flex">
                                        <template x-for="productId in selectedProducts" :key="productId">
                                            <div class="flex flex-col">
                                                <img x-bind:src="`http://127.0.0.1:8000/storage/images/${getSelectedProductInfo(productId).media}`"
                                                    alt="Product Image" class="w-16 h-16">
                                                <span x-text="getSelectedProductInfo(productId).name"></span>

                                                <button
                                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                                                    x-on:click.prevent="deselectProduct(productId)">Désélectionner</button>
                                            </div>
                                        </template>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="selectedProducts" id="selectedProducts">

                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</button>
                    <button type="submit"
                        class="rounded-md bg-[#1c3242] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600  @click="updateSelectedProducts"
                        ...>
                        Sauvegarder
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
<script>
    function updateCategoryId(categoryId) {
        document.getElementById('id_category').value = categoryId;
    }
</script>
