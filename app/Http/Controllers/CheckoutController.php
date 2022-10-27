<?php

namespace App\Http\Controllers;

use App\Bkashtrxid;
use App\Order;
use App\Product;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use App\Settings;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();
        $settingsArr = [];
        foreach ($settings as $setting) {
            $settingsArr[$setting->key] = $setting->value;
        }
        Session::forget('shipping');

        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        return view('checkout')->with([
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
            'settingsArr' => $settingsArr,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }
        if (Cart::count() == 0){
            return route('shop.index')->withErrors('Sorry! this items in your cart is no longer avialble.');
        }
        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try {
            $payMethod = $request->get('payment_method');
            Session::put('payMethod', $payMethod);

            $order = $this->addToOrdersTables($request, null);
            //Mail::send(new OrderPlaced($order)); //TODO turn this on on prod

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();
            session()->forget('coupon');
            session()->forget('shipping');

            return redirect()->route('confirmation.index')->with('order_id', $order->id)->with('success_message', 'Thank you! Your order has been successfully accepted!');
        } catch (CardErrorException $e) {
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }


    protected function addToOrdersTables($request, $error)
    {
        $invoice =  IdGenerator::generate(['table' => 'orders', 'field' => 'invoice_no', 'length' => 10, 'prefix' => 'INV-']);
        $orderId = IdGenerator::generate(['table' => 'orders','field'=>'order_id', 'length' => 12, 'prefix' => date('ym')]);

        // Insert into orders table
        $order = Order::create([
            'customer_id' => auth('customer')->user() ? auth('customer')->user()->id : null,
            'billing_name' => $request->name,
            'billing_email' => $request->email,
            'order_note' => $request->order_note,
            'shipping_address' => $request->shipping_address,
            'shipping_address_2' => $request->shipping_address_2,
            'billing_phone' => $request->number,
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            'shipping_cost' => getNumbers()->get('shippingCost'),
            'shipping_method' => getNumbers()->get('shipping'),
            'payment_method' => Session::get('payMethod'),
            'invoice_no' => $invoice,
            'order_id' => $orderId,
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'price' => $item->price,
                'quantity' => $item->qty,
                'meta' => $item->options->has('size') ? serialize(['size' => $item->options->size, 'color' => $item->options->color]) : serialize([]),
            ]);
        }

        if ($request->payment_method != 'COD'){
            $payment = new Bkashtrxid();
            $payment->order_id = $order->id;
            $payment->pay_method = $request->payment_method;
            if ($request->payment_method == 'Rocket'){
                $payment->trx_id = $request->rocket_trx_id;
            }
            if ($request->payment_method == 'Bkash'){
                $payment->trx_id = $request->bkash_trx_id;
            }
            if ($request->payment_method == 'Nagad'){
                $payment->trx_id = $request->nagad_trx_id;
            }
            $payment->is_verified = 0;
            $payment->save();
        }

        return $order;
    }


    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }
}
