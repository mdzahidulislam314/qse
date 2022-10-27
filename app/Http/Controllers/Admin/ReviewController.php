<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function allReview()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroy($id)
    {
        $reviews = Review::find($id);
        $reviews->delete();
        return redirect()->back();
    }

    public function reviewStatus($id, $status)
    {
        $data = Review::findOrfail($id);
        $data->status = $status;
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Status Updated successfully!',
        ], 200);
    }
}
