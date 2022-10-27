<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductImage;
use Illuminate\Http\Request;
use Session;

class ProductImgController extends Controller
{

    public function altTempPimgUp(Request $req)
    {
        for ($i = 0; $i < $req->TotalImages; $i++) {
            $file = $req->file('images' . $i);
            $name = 'alt_pro_' . time() . $i . '.webp';

            if (Session::has($req->ssn_id)) {
                $img = Session::get($req->ssn_id);
                array_push($img, $name);
                Session::put($req->ssn_id, $img);
            } else {
                $img[] = $name;
                Session::put($req->ssn_id, $img);
            }
            $file->move(public_path('uploads/products/temp/'),$name);
        }

        $image = Session::get($req->ssn_id);
        $html = '';
        if ($req->pro_id) {
            $pro_images = ProductImage::where('product_id', $req->pro_id)->get();
            foreach ($pro_images as $value) {
                $html .= '<div class="pip">';
                $html .= '<img class="imageThumb" src="' . asset('uploads/admin/products/' . $value->img) . '">';
                $html .= '<span class="remove-p" onclick="deleteAltImgById(event, ' . $value->id . ')">Remove</span>';
                $html .= '</div>';
            }
        }
        foreach ($image as $value) {
            $html .= '<span class="pip">';
            $html .= '<img class="imageThumb" src="' . asset('uploads/products/temp/' . $value) . '">';
            $html .= '<span class="remove" id="' . $value . '" onclick="deleteAltImg(event, \'' . $req->ssn_id . '\')">Remove</span>';
            $html .= '</span>';
        }
        return $html;
    }
    public function altTempPimgRemove(Request $req)
    {
        $all_img = Session::get($req->ssn_id);
        $image_name = $req->img_name;
        if (in_array($image_name, $all_img)) {
            $pos = array_search($image_name, $all_img);
            unset($all_img[$pos]);
            Session::put($req->ssn_id, array_values($all_img));
            $path = 'uploads/products/temp/' . $image_name;
            if (file_exists($path)) {
                unlink($path);
            }
//             print_r($all_img);
            return 'true';
        }
    }

    public function deleteAltImgById(Request $req)
    {
        $pro_img = ProductImage::find($req->id);
        $path = 'uploads/products/' . $pro_img->image;
        if (file_exists($path)) {
            unlink($path);
        }
        $pro_img->delete();
    }
}
