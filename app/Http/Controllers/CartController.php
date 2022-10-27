<?php

namespace App\Http\Controllers;

use App\Product;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::content();
        Session::forget('shipping');
        $mightAlsoLike = Product::mightAlsoLike()->get();
        return view('cart')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'items' => $items,
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }

    public function paymentMethod()
    {
        $items = Cart::content();

        return view('payment-method')->with([
            'items' => $items,
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $size = \request()->get('size');
        $color = \request()->get('color');
        $qty = \request()->get('qty');
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });

        if ($duplicates->isNotEmpty()) {
            return response()->json(['error' => 'Item is already in your cart!']);
        }

        $data = Cart::add($product->id, $product->name, $qty ? $qty : 1, $product->getPrice(),  ['size' => $size, 'color' => $color] )
            ->associate(Product::class);

        return response()->json([
            'success' => true,
            'message' => 'Item Add to cart Successfully!'
        ]);
    }

    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartSubTotal = presentPrice(Cart::subtotal());

        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartSubTotal' => $cartSubTotal,
        ]);
    }

    /// remove mini cart
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json([
            'success' => true,
            'message' => 'Product Remove from Cart'
        ]);
    }

    public function getCartPartial()
    {
        $html = view('partials.cart', [
            'newTotal' => getNumbers()->get('newTotal'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
        ])->render();
        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }

//    public function store(Product $products)
//    {
//        $size = \request()->get('size');
//        $color = \request()->get('color');
//        $duplicates = Cart::search(function ($cartItem, $rowId) use ($products) {
//            return $cartItem->id === $products->id;
//        });
//
//        if ($duplicates->isNotEmpty()) {
//            return redirect()->route('cart.index')->with('error', 'Item is already in your cart!');
//        }
//
//        Cart::add($products->id, $products->name, 1, $products->getPrice(),  ['size' => $size, 'color' => $color] )
//            ->associate(Product::class);
//
//        return redirect()->back()->with('success_message', 'Item was added to your cart!');
//    }


    public function update(Request $request, $rowId)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        $product = Product::where('id',$request->id)->first();

        if ($request->quantity > $product->quantity) {

            return redirect()->route('cart.index')->with('error_message', 'We currently do not have enough items in stock!');
        }

        Cart::update($rowId, $request->quantity);
        return redirect()->route('cart.index')->with('success_message', 'Quantity was updated successfully!');
    }

    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');
    }


    public function setShipping(Request $request)
    {
        $settings = Settings::all();
        $settingsArr = [];
        foreach ($settings as $setting) {
            $settingsArr[$setting->key] = $setting->value;
        }

        $shipping = $request->get('shipping');
        Session::put('shipping', $shipping);

        if ($shipping === 'inside'){
            $shippingCost = $settingsArr['inside_ship_amount'];
        }elseif ($shipping === 'outside'){
            $shippingCost = $settingsArr['outside_ship_amount'];
        }else{
            $shippingCost = 0;
        }

//        $shippingCost = $shipping === 'inside' ? $settingsArr['inside_dk_cost'] : $settingsArr['outside_dk_cost'];

        $html = view('partials.cart', [
            'newTotal' => getNumbers()->get('newTotal'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'shippingCost' => $shippingCost
        ])->render();
        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }
}
