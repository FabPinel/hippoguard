@extends('layout-admin')
@section('pageTitle', "Création d'un code promo")
@section('admin-content')
    <div class="space-y-10 divide-y divide-gray-900/10 mt-20">
        <div class="w-1/4 mx-auto">
            <form action="{{ route('admin.discounts.store') }}" enctype="multipart/form-data"
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" method="POST">
                @csrf

                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="website" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="name" id="name"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="about"
                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <input id="description" name="description" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Description de la promotion.</p>
                        </div>
                        <div class="col-span-full">
                            <label for="about"
                                class="block text-sm font-medium leading-6 text-gray-900">Pourcentage</label>
                            <div class="mt-2">
                                <input id="discount_percent" name="discount_percent" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Pourcentage de la promotion.</p>
                        </div>
                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                            <div class="mt-2">
                                <input id="discount_amount" name="discount_amount" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Montant de la promotion.</p>
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
