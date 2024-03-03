@extends('layout-admin')
@section('pageTitle', 'Admin - Commande #'.$order->id)
@section('admin-content')
@php
$discount = $order->discount;
$totalAfterDiscount = $order->total + 4.99;
     if ($discount) {
        if ($discount->discount_percent) {
            $totalAfterDiscount *= (1 - $discount->discount_percent / 100);
        } elseif ($discount->discount_amount) {
            $totalAfterDiscount -= $discount->discount_amount;
        }
    }
 @endphp
<div class="mt-24 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="p-4 sm:p-6 xl:p-9">
      <div class="flex flex-wrap justify-between gap-5">
        <div>
          <p class="mb-1.5 font-medium text-black">
            Client :
          </p>
          <h4 class="mb-3 text-xl font-bold text-black">
            {{ $order->user->first_name}} {{ $order->user->last_name }}
          </h4>
          <div class="grid grid-cols-6 gap-8">
            <span class="block col-span-2"><span class="font-medium text-black">Email:</span>
            {{ $order->user->email }}</span>
            <span class="block col-span-2"><span class="font-medium text-black">Téléphone :</span>
            {{ $order->user->phone }}</span>
         </div>
            <span class="block mt-2"><span class="font-medium text-black">Adresse :</span>
            {{ $userAddress->address_line }} {{ $userAddress->city }} {{ $userAddress->postalCode }}</span>
            <span class="block mt-2"><span class="font-medium text-black">Compte créé le :</span>
            {{ $order->user->created_at }}</span>
            <span class="block mt-2"><span class="font-medium text-black">Nombre de commandes :</span>
            {{ $totalUserOrders }}</span>
        </div>
      </div>

      <div class="my-7 grid grid-cols-1 border border-stroke dark:border-strokedark xsm:grid-cols-2 sm:grid-cols-4">
        <div class="border-b border-r border-stroke px-5 py-4 last:border-r-0 dark:border-strokedark sm:border-b-0">
          <h5 class="mb-1.5 font-bold text-black">
            ID commande :
          </h5>
          <span class="text-sm font-medium"> #{{ $order->id}} </span>
        </div>

        <div class="border-b border-stroke px-5 py-4 last:border-r-0 dark:border-strokedark sm:border-b-0 sm:border-r">
          <h5 class="mb-1.5 font-bold text-black">
            Date commande :
          </h5>
          <span class="text-sm font-medium"> {{ $order->created_at->format('d/m/Y') }} </span>
        </div>

        <div class="border-b border-stroke px-5 py-4 last:border-r-0 dark:border-strokedark sm:border-b-0 sm:border-r">
          <h5 class="mb-1.5 font-bold text-black">
            Statut :
          </h5>
          <span class="text-sm font-medium"> {{ $order->status->status }} </span>
        </div>

        <div class="border-r border-stroke px-5 py-4 last:border-r-0 dark:border-strokedark">
          <h5 class="mb-1.5 font-bold text-black">
            Total commande :
          </h5>
          <span class="text-sm font-medium"> {{$totalAfterDiscount}}€ </span>
        </div>
      </div>

      <div class="border border-stroke dark:border-strokedark">
        <div class="max-w-full overflow-x-auto">
          <div class="min-w-[670px]">
            <!-- table header start -->
            <div class="grid grid-cols-12 border-b border-stroke py-3.5 pl-5 pr-6 uppercase bg-slate-100 dark:border-strokedark">
              <div class="col-span-4">
                <h5 class="font-medium text-black">
                    Nombre produits ({{ $totalItemOrder }})
                </h5>
              </div>

              <div class="col-span-2">
                <h5 class="font-medium text-black">
                    Prix unitaire
                </h5>
              </div>

              <div class="col-span-1">
                <h5 class="font-medium text-black">
                    Quantité
                </h5>
              </div>

              <div class="col-span-1">
                <h5 class="font-medium text-black">
                    Stock
                </h5>
              </div>

              <div class="col-span-2">
                <h5 class="text-right font-medium text-black">
                  Total
                </h5>
              </div>
              <div class="col-span-2">
                <h5 class="text-right font-medium text-black">
                  Date
                </h5>
              </div>
            </div>
            <!-- table header end -->

            <!-- product item -->
            @foreach ($order->orderItems as $orderItem)
            <div class="grid grid-cols-12 border-b border-stroke py-3.5 pl-5 pr-6 dark:border-strokedark text-slate-500">
              <div class="col-span-4">
                <a href="{{ route('shop.productName', $orderItem->product->id)}}" class="font-semibold underline hover:text-slate-700">{{ $orderItem->product->name }}</a>
              </div>

              <div class="col-span-2">
                <p class="font-medium">{{ $orderItem->product->price }}€</p>
              </div>

              <div class="col-span-1">
                <p class="font-medium">{{ $orderItem->quantity }}</p>
              </div>

              <div class="col-span-1">
                <p class="font-medium">{{ $orderItem->product->quantity }}</p>
              </div>

              <div class="col-span-2">
                <p class="text-right font-medium">{{ $orderItem->quantity * $orderItem->product->price }}€</p>
              </div>

              <div class="col-span-2">
                <p class="text-right font-medium">{{ $orderItem->created_at }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- total price start -->
        <div class="flex p-6">
            <div class="w-full max-w-65">
                    <p class="w-72 flex justify-between font-medium py-2 text-black">
                        <span> Total produit </span>
                        <span> {{ $order->total }}€ </span>
                    </p>

                    <p class="w-72 flex justify-between font-medium py-2 text-black">
                        <span class="align-left"> Coûts de livraison </span>
                        <span> 4.99€</span>
                    </p>

                    <p class="w-72 flex justify-between font-medium py-2 text-black">
                        @if($order->discount)
                        <span class="align-left">
                            Code promo
                            <span class="text-emerald-500 text-right">({{ $order->discount->name }})</span>
                        </span>
                        @if($order->discount->discount_amount)
                            <span> -{{ $order->discount->discount_amount }}€ </span>
                        @elseif($order->discount->discount_percent)
                            <span> -{{ $order->discount->discount_percent }}% </span>

                    @else
                        <span class="align-left">
                            Code promo
                        </span>
                        <span> 0 </span>
                        @endif
                    @endif

                    </p>

                    <p class="w-72 flex justify-between font-medium py-2 text-black">
                        <span class="align-left"> TVA <span class="text-red-500">(20%)</span> </span>
                        <span>  {{ $order->total * 0.20 }}€</span>
                    </p>

                <p class="w-72 flex justify-between mt-4 py-2 border-t border-stroke pt-5 dark:border-strokedark">
                    <span class="font-medium text-black">
                        Total TTC
                    </span>

                    <span class="font-bold text-meta-3 text-right"> {{$totalAfterDiscount}}€ </span>

                </p>
            </div>
        </div>



        <!-- total price end -->
      </div>
    </div>
  </div>

@endsection
