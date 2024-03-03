@extends('layout')
@section('pageTitle', "Message envoyé ! ")
@section('content')
    <div class="bg-white py-48">
        <div class="flex justify-center items-center">
            <div>
                <svg class="block mx-auto" width="125" height="125" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                stroke="#4ade80" fill="white" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            </div>
        <p class="text-4xl my-4">Message envoyé !</p>
        </div>



        <div class="mx-auto text-center max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="w-full mt-2 text-xl font-semibold tracking-tight sm:text-xl">

            <div class="py-4">
                <p>Nous avons bien reçu votre message et nous
                    vous répondrons dans les plus brefs délais.
                </p>
                <p> Un email de confirmation vous a été envoyé.</p>
            </div>


                <a href="{{ route('index') }}" class="mt-8 text-white bg-gradient-to-r from-sky-500 via-sky-600
                to-sky-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300
                 shadow-lg shadow-sky-500/50
                 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Retourner
                    à l'accueil</a>
            </div>

        </div>
    </div>
@endsection
