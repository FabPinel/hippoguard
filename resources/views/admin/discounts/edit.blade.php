@extends('layout-admin')
@section('pageTitle', "Edition d'un code promo")

<div class="mt-32 w-1/4 mx-auto">
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('admin.discounts.update', $discounts->id) }}" enctype="multipart/form-data"
        class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" method="POST">
        @csrf
        @method('PUT')

        <div class="px-4 py-6 sm:p-8">
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="website" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="name" id="name" value="{{ $discounts->name }}"
                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="3"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $discounts->description }}</textarea>

                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Ecrivez la description de la catégorie.</p>
                </div>

                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Pourcentage</label>
                    <div class="mt-2">
                        <input id="discount_percent" name="discount_percent" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $discounts->discount_percent }}">
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Ecrivez la promotion.</p>
                </div>

                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Montant</label>
                    <div class="mt-2">
                        <input id="discount_amount" name="discount_amount" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $discounts->discount_amount }}">
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Ecrivez le montant.</p>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</button>
            <button type="submit"
                class="rounded-md bg-[#D8A48F] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#E4C8AF] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Savegarder</button>
        </div>
    </form>
</div>
