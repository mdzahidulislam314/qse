<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Page;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
        $settingsArr = SettingsService::getSettingsArray();
        $data = [
            'settingsArr' => $settingsArr
        ];
        return view('pages.contact-us', $data);
    }

    public function about()
    {
        $settingsArr = SettingsService::getSettingsArray();
        $data = [
            'settingsArr' => $settingsArr
        ];
        return view('pages.about-us', $data);
    }

    public function faqs()
    {
        $faqs = Faq::orderBy('order_by', 'asc')->get();
        $data = [
            'faqs' => $faqs
        ];
        return view('pages.faqs', $data);
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('pages.default-page', compact('page', $page));
    }
}
