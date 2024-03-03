<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class dashboardController extends Controller
{
    public function index()
    {
        $data7Days = $this->getDataForLast7Days();
        $data30Days = $this->getDataForLast30Days();
        $dataOverAll = $this->getDataForOverall();
        $todayOrders = $this->getTodayOrders();
        $yesterdayOrders = $this->getYesterdayOrders();

        return view('admin.dashboard', compact('data7Days', 'data30Days', 'dataOverAll', 'todayOrders', 'yesterdayOrders'));
    }

    public function getDataForLast7Days()
    {
        $startDate = Carbon::now()->subDays(7);
        return $this->getData($startDate);
    }

    public function getDataForLast30Days()
    {
        $startDate = Carbon::now()->subDays(30);
        return $this->getData($startDate);
    }

    public function getDataForOverall()
    {
        return $this->getData();
    }

    private function getData($startDate = null)
    {
        $totalOrders = $this->getOrdersData($startDate);
        $totalRevenue = $this->getTotalRevenue($startDate);
        $averageOrder = $this->getAverageOrder($startDate);
        $bestSellingProduct = $this->getBestSellingProduct($startDate);

        return [
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'averageOrder' => $averageOrder,
            'bestSellingProduct' => $bestSellingProduct
        ];
    }

    private function getOrdersData($startDate = null)
    {
        $query = Order::query();
        if ($startDate) {
            $query->where('created_at', '>=', $startDate);
        }
        return $query->count();
    }

    private function getTotalRevenue($startDate = null)
    {
        $query = Order::query();
        if ($startDate) {
            $query->where('created_at', '>=', $startDate);
        }
        return $query->sum('total');
    }

    private function getAverageOrder($startDate = null)
    {
        $query = Order::query();
        if ($startDate) {
            $query->where('created_at', '>=', $startDate);
        }
        $totalOrders = $query->count();
        $totalRevenue = $query->sum('total');

        $averageOrder = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;

        $averageOrder = number_format($averageOrder, 2);

        return $averageOrder;
    }

    private function getBestSellingProduct($startDate = null)
    {
        $query = OrderItem::query()
            ->join('orders', 'order_items.id_order', '=', 'orders.id')
            ->join('products', 'order_items.id_product', '=', 'products.id')
            ->select('products.id', 'products.name', 'products.description', 'products.information', 'products.media', 'products.price', 'products.quantity', 'products.active', 'products.id_category', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->groupBy('products.id', 'products.name', 'products.description', 'products.information', 'products.media', 'products.price', 'products.quantity', 'products.active', 'products.id_category')
            ->orderByDesc('total_quantity');

        if ($startDate) {
            $query->where('orders.created_at', '>=', $startDate);
        }

        return $query->first();
    }

    public function getTodayOrders()
    {
        $todayOrders = Order::whereDate('created_at', Carbon::today())->get();
        return $todayOrders;
    }

    public function getYesterdayOrders()
    {
        $todayOrders = Order::whereDate('created_at', Carbon::yesterday())->get();
        return $todayOrders;
    }
}
