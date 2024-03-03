@extends('layout-admin')
@section('pageTitle', 'Admin - Dashboard')
@section('admin-content')
    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8" x-data="{ activeTab: parseInt(localStorage.getItem('activeTab')) || 1 }">
        <div class="relative isolate overflow-hidden pt-8">
            <!-- Secondary navigation -->
            <header class="pb-4 pt-6 sm:pb-6">
              <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
                <h1 class="text-base font-semibold leading-7 text-gray-900">Commandes</h1>
                <div class="order-last flex w-full gap-x-8 text-sm font-semibold leading-6 sm:order-none sm:w-auto sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7">
                    <p class="text-[#1c3242] cursor-pointer" x-on:click="activeTab = 1; localStorage.setItem('activeTab', 1)"
                        :class="{'text-[#e88229] shadow-sm cursor-pointer': activeTab === 1,'text-gray-400 shadow-sm cursor-pointer': activeTab !== 1}">7 jours</p>
                    <p class="text-[#1c3242] cursor-pointer" x-on:click="activeTab = 2; localStorage.setItem('activeTab', 2)"
                    :class="{'text-[#e88229] shadow-sm cursor-pointer': activeTab === 2,'text-gray-400 shadow-sm cursor-pointer': activeTab !== 2}">30 jours</p>
                    <p class="text-[#1c3242] cursor-pointer" x-on:click="activeTab = 3; localStorage.setItem('activeTab', 3)"
                    :class="{'text-[#e88229] shadow-sm cursor-pointer': activeTab === 3,'text-gray-400 shadow-sm cursor-pointer': activeTab !== 3}">Depuis le début</p>
                </div>
              </div>
            </header>

            <!-- Stats 7 days -->
            <div x-show="activeTab === 1">
              <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
                <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                      <dt class="text-sm font-medium leading-6 text-gray-500">Nombre de commandes</dt>
                      <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ $data7Days['totalOrders'] }}</dd>
                  </div>
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Revenus</dt>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ $data7Days['totalRevenue'] }} €</dd>
                  </div>
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 lg:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Panier moyens</dt>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ $data7Days['averageOrder'] }} €</dd>
                  </div>
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Le plus vendu</dt>
                    @if ($data7Days['bestSellingProduct'])
                        <dd class="w-full flex-none text-lg font-medium leading-10 tracking-tight text-gray-900">{{ $data7Days['bestSellingProduct']->name }}</dd>
                    @else
                        <dd class="w-full flex-none text-lg font-medium leading-10 tracking-tight text-gray-900">Aucun résultat</dd>
                    @endif
                </div>
                </dl>
              </div>

              <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50" aria-hidden="true">
                <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#1c3242] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)"></div>
              </div>
            </div>

            <!-- Stats 30 days -->
            <div x-show="activeTab === 2">
              <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
                <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                      <dt class="text-sm font-medium leading-6 text-gray-500">Nombre de commandes</dt>
                      <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ $data30Days['totalOrders'] }}</dd>
                  </div>
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Revenus</dt>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ $data30Days['totalRevenue'] }} €</dd>
                  </div>
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 lg:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Panier moyens</dt>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ $data30Days['averageOrder'] }} €</dd>
                  </div>
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Le plus vendu</dt>
                    @if ($data30Days['bestSellingProduct'])
                        <dd class="w-full flex-none text-lg font-medium leading-10 tracking-tight text-gray-900">{{ $data30Days['bestSellingProduct']->name }}</dd>
                    @else
                        <dd class="w-full flex-none text-lg font-medium leading-10 tracking-tight text-gray-900">Aucun résultat</dd>
                    @endif
                </div>
                </dl>
              </div>

              <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50" aria-hidden="true">
                <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#1c3242] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)"></div>
              </div>
            </div>

            <!-- Stats overall -->
            <div x-show="activeTab === 3">
              <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
                <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                      <dt class="text-sm font-medium leading-6 text-gray-500">Nombre de commandes</dt>
                      <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ $dataOverAll['totalOrders'] }}</dd>
                  </div>
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Revenus</dt>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ $dataOverAll['totalRevenue'] }} €</dd>
                  </div>
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 lg:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Panier moyens</dt>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ $dataOverAll['averageOrder'] }} €</dd>
                  </div>
                  <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Le plus vendu</dt>
                    @if ($dataOverAll['bestSellingProduct'])
                        <dd class="w-full flex-none text-lg font-medium leading-10 tracking-tight text-gray-900">{{ $dataOverAll['bestSellingProduct']->name }}</dd>
                    @else
                        <dd class="w-full flex-none text-lg font-medium leading-10 tracking-tight text-gray-900">Aucun résultat</dd>
                    @endif
                </div>
                </dl>
              </div>

              <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50" aria-hidden="true">
                <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#1c3242] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)"></div>
              </div>
            </div>

          </div>

          <div class="space-y-16 py-16 xl:space-y-20">
            <!-- Recent activity table -->
            <div>
              <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">Dernière commandes</h2>
              </div>
              <div class="mt-6 overflow-hidden border-t border-gray-100">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                  <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                    <table class="w-full text-left">
                      <thead class="sr-only">
                        <tr>
                          <th>Montant</th>
                          <th class="hidden sm:table-cell">Client</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-sm leading-6 text-gray-900">
                          <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                            <time datetime="2023-03-22">Aujourd'hui</time>
                            <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                            <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                          </th>
                        </tr>
                        @if($todayOrders->count() > 0)
                          @foreach($todayOrders as $order)
                          <tr>
                            <td class="relative py-5 pr-6">
                              <div class="flex gap-x-6">
                                <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"></svg>
                                <div class="flex-auto">
                                  <div class="flex items-start gap-x-3">
                                    <div class="text-sm font-medium leading-6 text-gray-900">{{ number_format($order->total, 2) }} €</div>
                                    <div class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">{{ $order->status->status }}</div>
                                  </div>
                                  <div class="mt-1 text-xs leading-5 text-gray-500">Frais de livraison 4.99€</div>
                                </div>
                              </div>
                              <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
                              <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                            </td>
                            <td class="hidden py-5 pr-6 sm:table-cell">
                              <div class="text-sm leading-6 text-gray-900">Fabien PINEL</div>
                              <div class="mt-1 text-xs leading-5 text-gray-500">{{ $order->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="py-5 text-right">
                              <div class="flex justify-end">
                                <a href="{{ route('admin.orders.orderDetails', $order->id) }}" class="text-sm font-medium leading-6 text-[#e88229] hover:text-[#EEA25F]">Voir<span class="hidden sm:inline"> la commande</span><span class="sr-only">, invoice #00012, Reform</span></a>
                              </div>
                              <div class="mt-1 text-xs leading-5 text-gray-500"><span class="text-gray-900">#{{ $order->id }}</span></div>
                            </td>
                          </tr>
                          @endforeach
                        @else
                            <tr>
                                <td colspan="3">Pas de résultats</td>
                            </tr>
                        @endif
                        <tr class="text-sm leading-6 text-gray-900">
                          <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                            <time datetime="2023-03-21">Hier</time>
                            <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                            <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                          </th>
                        </tr>
                        @if($yesterdayOrders->count() > 0)
                        @foreach($yesterdayOrders as $order)
                        <tr>
                          <td class="relative py-5 pr-6">
                            <div class="flex gap-x-6">
                              <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"></svg>
                              <div class="flex-auto">
                                <div class="flex items-start gap-x-3">
                                  <div class="text-sm font-medium leading-6 text-gray-900">{{ number_format($order->total, 2) }} €</div>
                                  <div class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">{{ $order->status->status }}</div>
                                </div>
                                <div class="mt-1 text-xs leading-5 text-gray-500">Frais de livraison 4.99€</div>
                              </div>
                            </div>
                            <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
                            <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                          </td>
                          <td class="hidden py-5 pr-6 sm:table-cell">
                            <div class="text-sm leading-6 text-gray-900">Fabien PINEL</div>
                            <div class="mt-1 text-xs leading-5 text-gray-500">{{ $order->created_at->format('d/m/Y') }}</div>
                          </td>
                          <td class="py-5 text-right">
                            <div class="flex justify-end">
                              <a href="{{ route('admin.orders.orderDetails', $order->id) }}" class="text-sm font-medium leading-6 text-[#e88229] hover:text-[#EEA25F]">Voir<span class="hidden sm:inline"> la commande</span><span class="sr-only">, invoice #00012, Reform</span></a>
                            </div>
                            <div class="mt-1 text-xs leading-5 text-gray-500"><span class="text-gray-900">#{{ $order->id }}</span></div>
                          </td>
                        </tr>
                        @endforeach
                      @else
                          <tr>
                              <td colspan="3">Pas de résultats</td>
                          </tr>
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </main>
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
            class="md:hidden fixed top-28 ml-2 mr-2 w-full flex border-l-8 border-[#34D399] bg-[#CBF5E6] px-2 py-3 shadow-md">
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
                   Connexion réussie
                </h5>
                <p class="text-sm leading-relaxed text-[#34D399]">
                   {{ $message }}
                </p>
            </div>
        </div>
    @endif
    @endsection
