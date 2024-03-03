@extends('layout-admin')
@section('pageTitle', 'Admin - DIY')
@section('admin-content')
    <div class="md:ml-28 md:mr-8">
        <div class="px-4 sm:px-6 lg:px-8 mt-20" x-show="activeTab === 3">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">DIY</h1>
                    <p class="mt-2 text-sm text-gray-700">La liste de tous les diy</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="{{ route('admin.diy.create') }}"
                        class="block rounded-md bg-[#1c3242] px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#374a56] cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter
                        un DIY</a>
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
                                        Titre</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Description</th>
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
                            @foreach ($diy as $d)
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{ $d->id }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ Str::limit($d->title, $limit = 50, $end = '...') }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <div class="text-gray-900">
                                         {{ Str::limit($d->description, $limit = 100, $end = '...') }}
</div>
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('admin.diy.edit', $d->id) }}"
                                                class="text-slate-400 hover:text-slate-900">
                                                <span class="material-icons">
                                                    edit
                                                </span>
                                            </a>
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('diy.diyName', $d->id) }}" class="text-[#1c3242] hover:text-[#374a56]"><span
                                                    class="material-icons">
                                                    visibility
                                                </span></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.diy.destroy', $d->id) }}" method="POST">
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
                {{-- {!! $diy->links() !!} --}}
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
                   Connexion réussie
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                   {{ $message }}
                </p>
            </div>
        </div>
        <div id="successMessage"
            class="flex md:hidden fixed top-28 ml-2 mr-2 w-full border-l-8 border-[#34D399] bg-[#CBF5E6] px-2 py-3 shadow-md">
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
                   Nouvel article DIY
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                   {{ $message }}
                </p>
            </div>
        </div>
        @endif
    </div>
@endsection
