<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishlistController extends Controller
{

    public function index()
    {
        return view('wishlist');
    }

    public function GetWishlistProduct()
    {
        $wishlistProduct = Auth::guard('customer')->user()->wishlistProducts()->get();
        return response()->json($wishlistProduct);
    }

    public function add($product)
    {
        if (Auth::guard('customer')->check()){
            $customer = Auth::guard('customer')->user();
            $wishlistCount = $customer->wishlistProducts()->where('product_id', $product)->first();

            if (!$wishlistCount){
                $customer->wishlistProducts()->attach($product);
                return response()->json(['success' => 'Wishlist Successfully Added Your Account!']);
            }else{
                return response()->json(['error' => 'This Product Already Added your Account!']);
            }

        }else{
            return response()->json(['error' => 'At First Login Your Account!']);
        }
    }

    public function RemoveWishlistProduct($row)
    {
        $customer = Auth::guard('customer')->user();
        $customer->wishlistProducts()->detach($row);

        return response()->json(['success' => 'Successfully Product Remove']);
    }

}
