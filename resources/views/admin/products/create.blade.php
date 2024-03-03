@extends('layout-admin')
@section('pageTitle', "Création d'un produit")
@section('admin-content')
    <div class="space-y-10 divide-y divide-gray-900/10 mt-20">
        <div class="w-1/4 mx-auto">
            <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" method="POST">
                @csrf

                <div class="px-4 py-6 sm:p-8">
                    <div>
                        <div class="sm:col-span-4">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Nom</span>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="name" id="name"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="id_category"
                                class="block text-sm font-medium leading-6 text-gray-900">Catégorie</label>
                            <div class="mt-2 relative">
                                <div x-data="{ open: false, selectedCategory: '' }" x-on:click.away="open = false">
                                    <div class="relative">
                                        <select name="id_category" id="id_category" x-model="selectedCategory"
                                            class="block w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            aria-labelledby="listbox-label">
                                            <option value="" disabled selected>Choisissez une catégorie</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- Vous pouvez ajouter une classe CSS pour styliser davantage la liste déroulante -->
                                </div>
                            </div>
                        </div>


                        <div class="sm:col-span-4">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Prix</span>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="price" id="price"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Quantité</span>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="quantity" id="quantity"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Description</span>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Informations
                                complémentaires</span>
                            <div class="mt-2">
                                <textarea id="information" name="information" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <span class="block text-sm font-medium leading-6 text-gray-900">Image</span>
                            <div class="mt-2 flex items-center gap-x-3">
                                <input type="file"
                                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                    name="media">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</button>
                    <button type="submit"
                        class="rounded-md bg-[#1c3242] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sauvegarder</button>
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
