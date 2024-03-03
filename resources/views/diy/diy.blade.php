@extends('layout')
@section('pageTitle', $diy->title )
@section('content')
<!-- component -->
<html>

<div class="w-full md:w-3/5 mx-auto justify-center">
    <div class="mx-5 my-3 text-sm">
        <a href="" class="text-[#1c3242] font-bold tracking-widest">Do It Yourself</a>
    </div>
    <!-- Titre -->
    <div class="w-full text-gray-800 text-4xl px-5 font-bold leading-none">
        {{ $diy->title }}
    </div>
    <div class="w-full text-gray-600 font-thin italic px-5 pt-3">
        Article mis à jour le : {{ $diy->created_at }}
    </div>
    <!-- Mini résumé -->
    <div class="w-full text-gray-500 px-5 pb-5 pt-2">
        {{ $diy->description }}
    </div>
    @if($diy->image) 
        <!-- Image principale -->
        <div class="mx-5">
            <img src="{{ asset('storage/app/public/images/' . $diy->image) }}" class="mx-auto block">
        </div>
    @endif
    <!-- Espace -->
    <div class="my-5"></div>
    <!-- Contenu -->
    <div class="px-5 w-full mx-auto border-b py-3">
        <h1><strong>{{ $diy->title }}</strong></h1>
        <p class="my-1">{{ $diy->text }}</p>
    </div>
    <!-- Espace -->
    <div class="my-5"></div>
    <!-- Vidéo -->
    @if($diy->video) 
            <div class="mx-5">
        <div class="relative" style="padding-bottom: 56.25%;">
            <!-- 16:9 aspect ratio -->
            <iframe
                class="absolute top-0 left-0 w-full h-full"
                width="760"
                height="615"
                src="{{ $diy->video }}"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
            ></iframe>
        </div>
    </div>
    @endif


    <!-- Espace entre la vidéo et les sections suivantes -->
    <div class="my-5"></div>

    <!-- Ingrédients -->
    @if($diy->recipe) 
        <div class="px-5 w-full mx-auto border-b py-3">
            <h2 class="font-bold">Ingrédients</h2>
            <p>{{$diy->recipe}}</p>
        </div>
    @endif

    <!-- Espace entre les sections -->
    <div class="my-4"></div>

    <!-- Ustensiles -->
    @if($diy->ustensils) 
        <div class="px-5 w-full mx-auto border-b py-3">
            <h2 class="font-bold">Ustensiles</h2>
            <p>{{$diy->ustensils}}</p>
        </div>
    @endif

    <!-- Espace entre les sections -->
    <div class="my-4"></div>
    @if($diy->step) 
        <!-- Étapes de la recette -->
        <div class="px-5 w-full mx-auto py-3">
            <h2 class="font-bold">Étapes de la recette</h2>
            <p>{{$diy->step}}</p>
        </div>
    @endif

    @if($diy->diyProducts) 
        <div class="mt-4 flow-root">
            <div class="-my-2">
                <div class="relative box-content h-80 overflow-x-auto py-2 xl:overflow-visible">
                    <div class="absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-x-8 xl:space-x-0 xl:px-0">
                        @foreach ($diy->diyProducts as $diyProduct)
                            <a href="{{ route('shop.productName', $diyProduct->product->id) }}" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                                <span aria-hidden="true" class="absolute inset-0">
                                    <img class="h-full w-full object-cover object-center"
                                        src="{{ asset('storage/app/public/images/' . $diyProduct->product->media) }}"
                                        alt="{{ $diyProduct->product->name }}">
                                </span>
                                <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                <span class="relative mt-auto text-center text-xl font-bold text-white">{{ $diyProduct->product->name }}</span>
                                <span class="relative text-center text-xl font-bold text-white">{{ $diyProduct->product->price }} €</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

</html>

@endsection
