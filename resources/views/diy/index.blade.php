@extends('layout')
@section('pageTitle', "DIY")
@section('content')
    <h2 id="collection-heading" class="text-2xl font-bold tracking-tight text-gray-900 mt-5 text-center">Nos articles DIY</h2>
    <p class="mt-4 text-base text-gray-500 text-center">Explorez l'art du DIY écologique avec nos articles pour créer des solutions durables à la maison. Faites place à la créativité et à la responsabilité environnementale ! 🌱🛠️</p>
    <div class="m-10 space-y-12 lg:grid lg:grid-cols-4 lg:gap-x-8 lg:space-y-0">
        @foreach ($diy as $d)
        <a href="{{ route('diy.diyName', $d->id) }}" class="group block">
            <div aria-hidden="true"
                class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                <img src="{{ asset('storage/app/public/images/' . $d->image) }}"
                    class="h-52 w-96 object-cover object-center">
            </div>
            <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $d->title }}</h3>
            <p class="mt-2 text-sm text-gray-500">{{ $d->description }}</p>
        </a>
        @endforeach
    </div>
    {!! $diy->links() !!}
@endsection
