@extends('layout-admin')
@section('pageTitle', 'Admin - Messages')
@section('admin-content')
    <div class="flex h-full mt-24 bg-white p-4 flex-col border-x border-stroke dark:border-strokedark">
        <div class="sm:flex">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Messages</h1>
            <p class="font-bold pl-2 ">({{ $totalMessages }})</p>
        </div>
        <!-- ====== Inbox List Start -->
        <div class="flex flex-col-reverse justify-between gap-6 py-4.5 pl-4 pr-4 sm:flex-row lg:pl-10 lg:pr-7.5">
            <div class="flex items-center gap-4 p-4">

                <button>
                    <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="white"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                </button>

                <button>
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.2425 11.024C16.3108 10.6923 16.1139 10.3513 15.7681 10.2587C15.4364 10.1904 15.0954 10.3872 15.0028 10.733C14.5958 12.5593 13.455 14.1273 11.8475 15.0554C8.65669 16.8976 4.58423 15.8064 2.74204 12.6156C0.899853 9.42483 1.99107 5.35236 5.18183 3.51018C7.54446 2.14611 10.4688 2.3738 12.5973 4.03532L11.1853 4.23348C10.8227 4.28044 10.5904 4.60939 10.6477 4.93357C10.6655 5.0207 10.6833 5.10784 10.7115 5.15655C10.838 5.37576 11.0723 5.50031 11.3478 5.47117L14.2729 5.08139C14.6355 5.03442 14.8678 4.70547 14.8105 4.38129L14.4207 1.45617C14.3738 1.09357 14.0448 0.861306 13.7206 0.918566C13.358 0.965531 13.1258 1.29449 13.183 1.61866L13.3428 3.02033C10.8189 1.06754 7.35007 0.796926 4.52466 2.42818C0.749331 4.60786 -0.572129 9.46278 1.62162 13.2625C3.81537 17.0622 8.65622 18.3593 12.4559 16.1655C14.3801 15.0546 15.7672 13.182 16.2425 11.024Z"
                            fill="#98A6AD"></path>
                    </svg>
                </button>

            </div>
        </div>

        <div x-data="{ showModal: false, showModalResponse: false, id: '', sender: '', enterprise: '', subject: '', email: '', message: '', date: '', hour: '', product: '', phone: '' }" class="h-full">
            <div x-show="showModal" class="fixed inset-0 bg-black opacity-50 z-50"></div>

            <!-- Modal Content -->
            <div x-show="showModal" @click.away="showModal = false"
                class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 z-50 w-1/2">

                <div>
                    <div class="flex items-center border-b border-slate-200 pb-2">
                        <svg class="w-8 h-8 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M2 5.6V18c0 1.1.9 2 2 2h16a2 2 0 0 0 2-2V5.6l-.9.7-7.9 6a2 2 0 0 1-2.4 0l-8-6-.8-.7Z" />
                            <path d="M20.7 4.1A2 2 0 0 0 20 4H4a2 2 0 0 0-.6.1l.7.6 7.9 6 7.9-6 .8-.6Z" />
                        </svg>
                        <p x-text="id" class="text-lg px-2"></p>
                        <p class="font-semibold">Sujet :</p>
                        <p x-text="subject" class="text-lg px-2"></p>
                        <button class="text-lg px-2 ml-auto"
                            @click="showModal = false; showModalResponse = true;">Répondre</button>
                    </div>
                    <div class="flex gap-2 border-b border-slate-200 py-4">
                        <p class="font-semibold">Message de :</p>
                        <p x-text="sender"></p>
                        <p x-text="email"></p>
                        <p class="font-semibold ml-4">Date :</p>
                        <p x-text="date"></p>
                        <p>à</p>
                        <p x-text="hour"></p>
                    </div>
                    <div class="mt-4">
                        <p x-text="message"></p>
                        <p x-text="phone"></p>
                    </div>

                    <div class="fixed top-0 right-0 z-50">
                        <div class="flex justify-end">
                            <button @click="showModal = false">
                                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>


                </div>


            </div>
            <div x-show="showModalResponse" class="fixed inset-0 bg-black opacity-50 z-50"></div>

            <div x-show="showModalResponse"
                class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 z-50 w-1/2">
                <form action="{{ route('message.response') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="de">De :</label>
                        <input type="email" id="de" name="emailFrom" value="{{ config('mail.from.address') }}"
                            readonly
                            class="border border-blue-900 focus:border-red-500 focus:bg-slate-100 rounded-md py-1 px-2 focus:outline-none">
                    </div>
                    <div class="mb-4">
                        <label for="a">À :</label>
                        <input type="email" id="a" name="emailTo" x-bind:value="email">
                    </div>
                    <div class="mb-4">
                        <label for="objet">Objet :</label>
                        Re : <input type="text" id="objet" name="subject" x-bind:value="subject">
                    </div>
                    <div class="mb-4 flex items-start">
                        <label for="message">Message réponse :</label>
                        <textarea id="message" placeholder="Message…" name="message" class="w-full min-h-32 rounded-sm border border-slate-200 p-1"></textarea>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer" @click="showModal = true; showModalResponse = false;">Revenir
                        </p>
                        <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Envoyer</button>
                    </div>
                </form>

                <div class="fixed top-0 right-0 z-50">
                    <div class="flex justify-end">
                        <button @click="showModalResponse = false">
                            <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


            <table class="h-full w-full table-auto">
                <thead>
                    <tr class="flex border-y border-stroke dark:border-strokedark bg-slate-100">
                        <th class="w-2/12 py-6 pl-4 pr-4 lg:pl-10">
                            <label for="checkbox-1" class="flex cursor-pointer select-none items-center font-medium">
                                <input type="checkbox"
                                    class="box mr-4 flex h-5 w-5 items-center bg-white justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2  dark:border-strokedark dark:bg-boxdark-2">
                                Nom Prénom
                            </label>
                        </th>
                        <th class="hidden w-1/12 px-4 py-6 xl:block">
                            <p class="text-center font-medium">Entreprise</p>
                        </th>
                        <th class="w-2/12 py-6 pl-4 pr-4 lg:pr-10">
                            <p class="text-center font-medium">Sujet</p>
                        </th>
                        <th class="w-4/12 py-6 pl-4 pr-4 lg:pr-10">
                            <p class="text-center font-medium">Message</p>
                        </th>
                        <th class="w-2/12 py-6 pl-4 pr-4 lg:pr-10">
                            <p class="text-center font-medium">Produit</p>
                        </th>
                        <th class="w-1/12 py-6 pl-4 pr-4 lg:pr-10">
                            <p class="text-center font-medium">Date</p>
                        </th>
                    </tr>
                </thead>
                <tbody class="block h-full max-h-full">
                    @foreach ($messages as $m)
                        <tr class="flex cursor-pointer items-center text-slate-600 dark:hover:bg-boxdark-2 hover:bg-slate-100"
                            @click="showModal = true;
             id = '[#{{ addslashes($m->id) }}]';
             sender = '{{ addslashes($m->firstname) }} {{ addslashes($m->lastname) }}';
             enterprise = '{{ addslashes($m->enterprise) }}';
             subject = '{{ addslashes($m->subject) }}';
             email = '{{ addslashes($m->email) }}';
             message = '{{ addslashes($m->message) }}';
             date = '{{ addslashes($m->created_at->format('d/m/Y')) }}';
             hour = '{{ addslashes($m->created_at->format('H:i')) }}'
             product = '{{ addslashes($m->product ? $m->product->name : '') }}';
             phone = '+33{{ addslashes($m->phone ? $m->phone : '') }}';
             ">
                            <td class="w-2/12 py-6 pl-4 pr-4 lg:pl-10">
                                <label for="checkbox-1" class="flex cursor-pointer select-none items-center font-medium">
                                    <input type="checkbox"
                                        class="box mr-4 flex h-5 w-5 items-center bg-white justify-center rounded-[3px] border-[.5px] border-stroke bg-gray-2  dark:border-strokedark dark:bg-boxdark-2">
                                    {{ $m->firstname }} {{ $m->lastname }}
                                </label>
                            </td>
                            <td class="hidden w-1/12 p-4 xl:block">
                                <p>
                                    @if ($m->enterprise)
                                        {{ $m->enterprise }}
                                    @else
                                    @endif
                                </p>
                            </td>
                            <td class="w-2/12 py-4 pl-4 pr-4 lg:pr-10">
                                <p class="text-center text-xs xl:text-base">
                                    {{ $m->subject }}
                                </p>
                            </td>
                            <td class="w-4/12 py-4 pl-4 pr-4 lg:pr-10">
                                <p class="text-center text-xs xl:text-base">
                                    {{ Str::limit($m->message, $limit = 160, $end = '...') }}
                                </p>
                            </td>
                            <td class="w-2/12 py-4 pl-4 pr-4 lg:pr-10">
                                <p class="text-center text-xs xl:text-base">
                                    @if ($m->product)
                                        <a href="#">{{ $m->product->name }}</a>
                                    @else
                                    @endif
                                </p>
                            </td>
                            <td class="w-1/12 py-4 pl-4 pr-4 lg:pr-10">
                                <p class="text-center text-xs xl:text-base">
                                    {{ $m->created_at->format('d/m/Y') }} à {{ $m->created_at->format('H:i') }}
                                </p>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {!! $messages->links() !!}
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
                   Message réponse
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
                   Message réponse
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                   {{ $message }}
                </p>
            </div>
        </div>
    @endif
@endsection
