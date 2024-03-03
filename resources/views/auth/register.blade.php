@extends('layout')
@section('pageTitle', "S'inscrire")
@section('content')
    <div class="mt-20 mx-auto max-w-4xl flex">
        <div class="w-2/4">
            <img src="https://images.unsplash.com/photo-1582803824122-f25becf36ad8?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="">
        </div>
        <form action="{{ route('register.store') }}" class="w-2/4 m-0 border-none" method="POST">
            @csrf
            <p class="text-xl text-center">Créer un compte</p>
            <div>

                <div class="px-5">
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Pseudo</label>
                    <div class="mt-2">
                        <input type="text" name="username" id="username" autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="px-5">
                    <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">Prénom</label>
                    <div class="mt-2">
                        <input type="text" name="first_name" id="first_name" autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="px-5">
                    <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                    <div class="mt-2">
                        <input type="text" name="last_name" id="last_name" autocomplete="family-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="px-5">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Adresse email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="px-5">
                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Téléphone</label>
                    <div class="mt-2">
                        <input id="phone" name="phone" type="phone" autocomplete="phone"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="px-5">
                    <div class="mt-2 relative" x-data="{show: true}">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :type="show ? 'password' : 'text'" required>
                            <div class="absolute top-1/2 right-4 cursor-pointer mt-2">
                              <svg class="h-4 text-gray-700 block" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                              </svg>

                              <svg class="h-4 text-gray-700 hidden" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                </path>
                              </svg>
                            </div>
                    </div>
                </div>

                <div class="px-5">
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirmer le mot de passe</label>
                    <div class="mt-2">
                        <input id="password_confirmation" type="password"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('password') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="current-password">
                    </div>
                </div>

            </div>

            <div class="flex items-start ml-5 mt-4">
                <div class="flex items-center h-5">
                    <input id="terms" aria-describedby="terms" type="checkbox"
                        class="w-4 h-4 border border-gray-300 rounded-md bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                        required="">
                </div>
                <div class="ml-3 text-sm text-center">
                    <label for="terms" class="font-light">J'accepte <a
                            class="font-medium text-blue-700 hover:underline dark:text-[#e88229]" href="#">les
                            conditions</a></label>
                </div>
            </div>

            <div class="flex items-center justify-center gap-x-6 px-4 py-4 sm:px-8">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</button>
                <button type="submit"
                    class="rounded-md bg-[#1c3242] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sauvegarder</button>
            </div>
            <p class="text-sm font-light text-gray-800 text-center">
                Vous avez déjà un compte ?
                <a href="/login" class="text-[#e88229] font-medium hover:underline">Connectez-vous ici</a>
            </p>

        </form>
    </div>
@endsection
