<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SettingsService;
use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    protected $settings = [
        'name', 'phone', 'email', 'address', 'header_text', 'facebook', 'twitter', 'youtube', 'about',
        'footertext', 'feature_title_1', 'feature_subt_1', 'feature_title_2', 'feature_subt_2',
        'feature_title_3', 'feature_subt_3', 'feature_title_4', 'feature_subt_4',
        'free_ship_min_amount','inside_ship_amount','outside_ship_amount','map_code','cod_title','cod_desc',
        'bkash_title','bkash_desc','rocket_title','rocket_desc','nagad_title','nagad_desc','imo_whatsup','meta_title',
        'meta_description','meta_keywords','site_moto'
    ];

    protected $settingsImages = [
        'header_logo',
        'footer_logo',
        'favicon',
        'pay_method_img',
        'meta_img',
        'feature_icon_1',
        'feature_icon_2',
        'feature_icon_3',
        'feature_icon_4',


    ];

    protected $settingsCheck = [
        'free_ship_status',
        'inside_ship_status',
        'Outside_ship_status',
        'nagad_status',
        'rocket_status',
        'cod_status',
        'bkash_status',
    ];

    public function showSettings()
    {
        $data = [
            'settings' => SettingsService::getSettingsArray(),
        ];
        return view('admin.settings.settings',$data);
    }

    public function shippingMethod()
    {
        $data = [
            'settings' => SettingsService::getSettingsArray(),
        ];
        return view('admin.settings.shipping-method',$data);
    }


    public function updateSettings(Request $request)
    {
        foreach ($this->settings as $setting) {
            if ($request->has($setting)) {
                SettingsService::set($setting, $request->get($setting));
            }
        }

        foreach ($this->settingsCheck as $item) {
            if ($request->has($item)) {
                SettingsService::set($item, '1');
            } else {
                SettingsService::set($item, '2');
            }
        }

        foreach ($this->settingsImages as $settingsImage) {

            if ($request->hasFile($settingsImage)) {
                $image =  $request->file($settingsImage);
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $directory = public_path('uploads/settings/');
                $image->move($directory, $imageName);
                $imageUrl = '/uploads/settings/'.$imageName;

                SettingsService::set($settingsImage, $imageUrl);
            }
        }

        return redirect()->back()->with('success', 'Settings Updated Successfully!');
    }
}
