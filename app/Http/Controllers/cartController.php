<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Mail\CommandMail;
use App\Models\OrderItem;
use App\Models\UserAddress;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\shopController;
use Stripe\Checkout\Session;

class cartController extends Controller
{
    public function panier()
    {
        $summaryData = $this->summary();

        return view('shop.panier', [
            'subtotal' => $summaryData['subtotal'],
            'total' => $summaryData['total'],
        ]);
    }

    public function checkout()
    {
        $summaryData = $this->summary();
        $appliedDiscountName = session('discount', null);
        $user = auth()->user();

        $userAddress = null;
        if ($user) {
            $userAddress = UserAddress::where('id_user', $user->id)
                ->where('default', 1)
                ->first();
        }

        $allUserAddresses = UserAddress::where('id_user', $user->id)->get();

        return view('shop.checkout', [
            'subtotal' => $summaryData['subtotal'],
            'total' => $summaryData['total'],
            'userAddress' => $userAddress,
            'allUserAddresses' => $allUserAddresses,
            'appliedDiscountName' => $appliedDiscountName,
        ]);
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        if (!$product) {
            return abort(404);
        }

        $cart = session()->get('cart', []);

        $quantity = $request->input('quantity', 1);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'name' => $product->name,
                'price' => $product->price,
                'image_url' => asset('storage/app/public/images/' . $product->media),
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', "L'article a bien été ajouté au panier.");
    }

    public function removeFromCart(Request $request)
    {
        if ($request->product_id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', "L'article a bien été supprimé du panier.");
        }

        return $this->panier();
    }

    public function updateCart(Request $request)
    {
        if ($request->isMethod('put')) {
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
                session()->put('cart', $cart);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Product not found in cart.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Method not allowed.'], 405);
        }
    }


    public function summary()
    {
        $cart = session('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $subtotal += $product->price * $item['quantity'];
            }
        }

        $total = $subtotal + 4.99;

        return [
            'subtotal' => $subtotal,
            'total' => $total,
        ];
    }

    // Stripe

    public function session(Request $request)
{
    $user = auth()->user();

    $existingAddresses = UserAddress::where('id_user', $user->id)->get();

    if ($existingAddresses === null || $existingAddresses->isEmpty()) {
        $newAddress = UserAddress::create([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'address_line' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postalCode' => $request->input('postal-code'),
            'phone' => $request->input('phone'),
            'default' => 1,
            'id_user' => $user->id,
        ]);
    } else {
        $existingAddress = $existingAddresses->first(function ($address) use ($request) {
            return $address->address_line === $request->input('address');
        });

        if ($existingAddress === null) {
            $newAddress = UserAddress::create([
                'first_name' => $request->input('first-name'),
                'last_name' => $request->input('last-name'),
                'address_line' => $request->input('address'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'postalCode' => $request->input('postal-code'),
                'phone' => $request->input('phone'),
                'default' => 0,
                'id_user' => $user->id,
            ]);
        }
    }

    session()->put('order_address', [
        'first_name' => $request->input('first-name'),
        'last_name' => $request->input('last-name'),
        'address' => $request->input('address'),
        'city' => $request->input('city'),
        'country' => $request->input('country'),
        'postal_code' => $request->input('postal-code'),
        'phone' => $request->input('phone'),
    ]);

    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    $cart = session('cart', []);

    $lineItems = [];

    foreach ($cart as $item) {
        $lineItems[] = [
            'price_data' => [
                'currency'     => 'eur',
                'product_data' => [
                    'name' => $item['name'],
                ],
                'unit_amount'  => $item['price'] * 100,
            ],
            'quantity'   => $item['quantity'],
        ];
    }

    $lineItems[] = [
        'price_data' => [
            'currency'     => 'eur',
            'product_data' => [
                'name' => 'Frais de livraison',
            ],
            'unit_amount'  => 499,
        ],
        'quantity'   => 1,
    ];

    //dd($lineItems);
    $discount = session('discount');

    if($discount){
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'  => $lineItems,
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('panier'),
            'discounts' => [[
                'coupon'     => $discount->id,
            ]],
        ]);
    } else {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'  => $lineItems,
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('panier'),
        ]);
    }


    return redirect()->away($session->url);
}



    public function success(Request $request)
    {
        $user = Auth::user();
        $cart = session('cart', []);
        $summaryData = $this->summary();
        $subtotal = $summaryData['subtotal'];
        $total = $summaryData['total'];

        $discountId = null;
        $discount = session('discount');
        if ($discount) {
            $discountId = $discount->id;
        }

        $order = Order::create([
            'total' => $total,
            'id_user' => $user->id,
            'id_discount' => $discountId,
        ]);

        $orderItems = [];
        foreach ($cart as $item) {
            $orderItem = OrderItem::create([
                'quantity' => $item['quantity'],
                'id_product' => $item['product_id'],
                'id_order' => $order->id,
            ]);

            $order = Order::with('status', 'user', 'orderItems.product')->findOrFail($order->id);
            $orderItems = OrderItem::where('id_order', $order->id)->get(); //Parcours la liste des orderItems qui on pour id_order = $id

            $product = Product::find($item['product_id']);
            if ($product) {
                $product->quantity -= $item['quantity'];
                $product->save();
            }
        }

        $orderAddressData = session('order_address', []);

        $orderAddress = OrderAddress::create([
            'first_name' => $orderAddressData['first_name'],
            'last_name' => $orderAddressData['last_name'],
            'address' => $orderAddressData['address'],
            'city' => $orderAddressData['city'],
            'country' => $orderAddressData['country'],
            'postal_code' => $orderAddressData['postal_code'],
            'phone' => $orderAddressData['phone'],
            'id_order' => $order->id,
        ]);

        $totalItemOrder = OrderItem::where('id_order', $order->id)->count();

        $orderDetails = [
            'order' => $order,
            'orderItems' => $orderItems,
            'orderAddress' => $orderAddress,
            'subtotal' => $subtotal,
            'total' => $total,
            'totalItemOrder' => $totalItemOrder,
            'discount' => $discount,
        ];
        $email = $user->email;
        $userId = $orderDetails['order']->id_user;
        $user = User::find($userId);
        $userName = $user->first_name . ' ' . $user->last_name;
        Mail::to($email)->send(new CommandMail($orderDetails, $userName));

        session()->forget('cart');
        session()->forget('discount');

        return view('shop.order', compact('orderDetails'));
    }
}
