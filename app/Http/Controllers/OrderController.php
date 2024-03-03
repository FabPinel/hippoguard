<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\OrderStatus;
use App\Models\UserAddress;

class orderController extends Controller
{
    public function index()
    {
        $orders = Order::with('status', 'user', 'discount')->orderBy('created_at', 'desc')->paginate(10);
        $status = OrderStatus::all();
        $totalOrders = Order::count();
        return view('admin.orders.index', compact('orders', 'status', 'totalOrders'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'id_status' => 'required'
        ]);
        $newStatus = OrderStatus::findOrFail($request->id_status);
        $order->update(['id_status' => $request->id_status]);
        return redirect()->route('admin.orders.index')->with('success', 'Le statut de la commande #' . $order->id . ' est désormais ' . $newStatus->status);
    }

    public function orderDetails($id)
    {
        $order = Order::with('status', 'user', 'orderItems.product', 'discount')->findOrFail($id);
        $orderItems = OrderItem::where('id_order', $order->id)->get();
        $user = $order->user;
        $userAddress = UserAddress::where('id_user', $user->id)->first();
        $totalUserOrders = Order::where('id_user', $user->id)->count();
        $totalItemOrder = OrderItem::where('id_order', $order->id)->count();
        return view('admin.orders.orderDetails', compact('order', 'orderItems', 'totalUserOrders', 'totalItemOrder', 'userAddress'));
    }
}
