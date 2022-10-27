<?php

namespace App\Http\Controllers;

use App\Flashdeal;
use Illuminate\Http\Request;

class FlashdealController extends Controller
{
    public function allFlashDeals()
    {
        $data = [
          'flashdelas' => Flashdeal::where('is_active', true)->latest()->get(),
        ];
        return view('flashdeals.flash-deal', $data);
    }

    public function showFlashDeals($slug)
    {
        $data = Flashdeal::where('slug', $slug)->first();
        if ($data){
            return view('flashdeals.flash-deal-details', compact('data', $data));
        }
        return redirect()->back();
    }
}
