<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    public function storeFront()
    {
        $data = [
            'settings' => SettingsService::getSettingsArray(),
        ];
        return view('admin..settings.storefront',$data);
    }

}
