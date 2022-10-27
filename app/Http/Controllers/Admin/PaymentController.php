<?php

namespace App\Http\Controllers\Admin;

use App\Bkashtrxid;
use App\Http\Controllers\Controller;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => SettingsService::getSettingsArray(),
        ];
        return view('admin.payment-method.index',$data);
    }
}
