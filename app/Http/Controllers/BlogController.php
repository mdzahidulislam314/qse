<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $catgories = BlogCategory::where('is_active', true)->latest()->get();
        $blogs = Blog::where('is_active', true)->paginate(10);
        $data = [
          'blogs' => $blogs,
          'catgories' => $catgories
        ];
        return view('blog.blog-list', $data);
    }

    public function showBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $relatedBlog = Blog::where('slug', '!=', $slug)->mightAlsoLike()->get();
        $catgories = BlogCategory::where('is_active', true)->latest()->get();
        $data = [
            'blog' => $blog,
            'relatedBlog' => $relatedBlog,
            'catgories' => $catgories,
        ];

        return view('blog.blog-details', $data);
    }
}
