<?php

use App\Settings;
use Carbon\Carbon;
use Illuminate\Support\Str;

function presentPrice($price)
{
//    dd($price);
//    return '৳'.number_format($price / 100, 2);
    return 'Tk '.number_format($price);
}

function presentDate($date)
{
    return Carbon::parse($date)->format('d M, Y, H:i:s');
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    if ($path !== null && file_exists($path)){
        return $path;
    }else{
        return asset('demo/not-found-big.png');
    }
//    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function getNumbers()
{
    $settings = Settings::all();
    $settingsArr = [];
    foreach ($settings as $setting) {
        $settingsArr[$setting->key] = $setting->value;
    }

    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $shipping = session()->get('shipping') ?? null;
    $newSubtotal = ((float)Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    $shippingCost = '';

    if ($shipping !== null) {
        if ($shipping === 'inside'){
            $shippingCost = $settingsArr['inside_ship_amount'];
        }elseif ($shipping === 'outside'){
            $shippingCost = $settingsArr['outside_ship_amount'];
        }else{
            $shippingCost = 0;
        }
//        $shippingCost = $shipping === 'inside' ? $settingsArr['inside_dk_cost'] : $settingsArr['outside_dk_cost'] ;
        $newTotal = $newTotal + $shippingCost;
    }

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
        'shipping' => $shipping,
        'shippingCost' => $shippingCost,
    ]);
}

function getStockLevel($quantity)
{
    if ($quantity > 5) {
        $stockLevel = '<div class="text-success d-inline-block font-italic">In Stock</div>';
    } elseif ($quantity <= 5 && $quantity > 0) {
        $stockLevel = '<div class="text-warning d-inline-block font-italic">Low Stock</div>';
    } else {
        $stockLevel = '<div class="text-danger d-inline-block font-italic">Not available</div>';
    }

    return $stockLevel;
}

function CleanURL($string, $delimiter = '-') {

    $lower = Str::lower($string);
    $string = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $lower);
    $string = preg_replace("/[\/_|+ -]+/", $delimiter, $string);
    return $string;
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
//        $settings = Settings::all();
        $setting = Settings::where('key', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}

//image uploads
if (!function_exists('image_upload')) {
    function image_upload($file, $filelocation, $update)
    {
        if (!$update == null){
            @unlink(public_path($update));
        }
        $filename = date('Y-m-d').'-'.uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($filelocation),$filename);
        return $filelocation . $filename;
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = '//' . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
}