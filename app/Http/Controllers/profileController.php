<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use App\Models\OrderStatus;
use App\Models\UserAddress;

class profileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userId = $user->id;

        $userOrders = Order::where('id_user', $userId)
            ->with('orderItems', 'orderAddress', 'status')
            ->paginate(10);

        $userAddress = UserAddress::where('id_user', $userId)
            ->where('default', 1)
            ->first();

        $allUserAddresses = UserAddress::where('id_user', $userId)->get();

        return view('auth.profile', compact('user', 'userOrders', 'userAddress', 'allUserAddresses'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);

        $userId = auth()->user()->id;
        $user = User::find($userId);

        $user->username = $request->input('username');

        if ($request->filled('first-name')) {
            $user->first_name = $request->input('first-name');
        }

        if ($request->filled('last-name')) {
            $user->last_name = $request->input('last-name');
        }

        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Vos informations ont été mises à jour avec succès.');
    }

    public function address(Request $request)
    {

        $request->validate([
            'selectedAddressId' => 'required',
        ]);
        $selectedAddressId = $request->selectedAddressId;
        $address = UserAddress::findOrFail($selectedAddressId);

        if ($request->filled('first-name')) {
            $address->first_name = $request->input('first-name');
        }

        if ($request->filled('last-name')) {
            $address->last_name = $request->input('last-name');
        }

        if ($request->filled('address')) {
            $address->address_line = $request->input('address');
        }

        if ($request->filled('city')) {
            $address->city = $request->input('city');
        }

        if ($request->filled('country')) {
            $address->country = $request->input('country');
        }

        if ($request->filled('postal-code')) {
            $address->postalCode = $request->input('postal-code');
        }

        if ($request->filled('phone')) {
            $address->phone = $request->input('phone');
        }

        $address->save();

        return redirect()->route('profile.index')->with('success', 'Votre adresse a été mise à jour avec succès.');
    }
}
