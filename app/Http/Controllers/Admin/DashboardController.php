<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $latestOrders = Order::latest()->take(6)->get();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalCus = Customer::count();
        $latestCus = Customer::latest()->take(4)->get(['name','created_at','email']);
        $totalSale = Order::sum('billing_total');
//        dd($totalSale);
        $data = [
          'title' => 'Dashboard',
          'totalProducts' => $totalProducts,
          'totalOrders' => $totalOrders,
          'totalCus' => $totalCus,
          'latestOrders' => $latestOrders,
          'totalSale' => $totalSale,
          'latestCus' => $latestCus,
        ];
        return view('admin.dashboard.index',$data);
    }
}
