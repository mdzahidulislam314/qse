<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function allCampaign()
    {
        $data = [
          'campaigns' => Campaign::where('is_active', true)->latest()->get(),
        ];
        return view('campaign.campaign', $data);
    }

    public function showCampaign($slug)
    {
        $data = Campaign::where('slug', $slug)->first();
        if ($data){
            return view('campaign.campaign-details', compact('data', $data));
        }
        return redirect()->back();
    }
}
