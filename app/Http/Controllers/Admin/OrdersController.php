<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Session;

class OrdersController extends Controller
{

    public function index(Request $request)
    {
        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $order_date = null;

        $orders = Order::query();

        if ($request->payment_status != null) {
            $orders = $orders->where('payment_status', $request->payment_status);
            $payment_status = $request->payment_status;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('order_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->order_date != null) {
            $order_date = $request->order_date;
            $orders = $orders->whereDate('created_at', '=' , $order_date);
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('order_id', 'like', '%' . $sort_search . '%');
        }

        $data = [
          'orders' => $orders->get(),
          'payment_status' => $payment_status,
          'delivery_status' => $delivery_status,
          'sort_search' => $sort_search,
          'order_date' => $order_date,
        ];

        return view('admin.orders.index', $data);
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.orders.show')->with('order', $order);
    }

    
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        Category::create([
            
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        Session::flash('success', 'Category created successfully');

        return redirect()->back();
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->save();

        Session::flash('success', 'Category updated successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        Session::flash('success', 'Deleted successfully Done!');

        return redirect()->back();
    }

    public function OrderStatus(Request $request, $id)
    {

        $order = Order::findOrfail($id);
        $order->estimated_delivery_time = $request->estimated_delivery_time;
        if ($request->status == 1){
            $order->order_status = 1;
        }
        if ($request->status == 2){
            $order->order_status = 2;
        }
        if ($request->status == 3){
            $order->order_status = 3;
        }
        if ($request->status == 4){
            $order->order_status = 4;
        }
        if ($request->status == 5){
            $order->order_status = 5;
        }

        $order->save();

        Session::flash('success', 'Order Status Change successfully');
        return redirect()->back();

    }

    public function PaymentStatus(Request $request, $id)
    {

        $order = Order::findOrfail($id);

        if ($request->payment == 1){
            $order->payment_status = 1;
        }
        if ($request->payment == 2){
            $order->payment_status = 2;
        }
        if ($request->payment == 3){
            $order->payment_status = 3;
        }

        $order->save();

        Session::flash('success', 'Payment Status Change successfully');
        return redirect()->back();

    }
}

