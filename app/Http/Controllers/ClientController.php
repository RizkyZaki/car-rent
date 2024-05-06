<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Overrage;
use App\Models\PostCar;
use App\Models\Profile;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        return view('client.pages.home', [
            'category' => Category::all(),
            'overrage' => Overrage::all(),
            'posts' => PostCar::limit(5)->get(),
            'fav_post' => PostCar::latest()->take(6),
            'faq' => Faq::all(),
            'brand' => Brand::all()
        ]);
    }
    public function blog()
    {
        return view('client.pages.blog', [
            'blog' => Blog::all(),
        ]);
    }
    public function post()
    {
        return view('client.pages.post', [
            'post' => PostCar::all(),
        ]);
    }
    public function postDetail($slug)
    {
        $post = PostCar::where('slug', $slug)->first();
        return view('client.pages.detail.post', [
            'post' => $post,
        ]);
    }
    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('client.pages.detail.blog', [
            'blog' => $blog,
        ]);
    }
    public function categoryDetail($slug)
    {
        $cat = Category::where('slug', $slug)->first();
        return view('client.pages.detail.category', [
            'cat' => $cat,
        ]);
    }
    public function profileDetail($slug)
    {
        $profile = Profile::where('slug', $slug)->first();
        return view('client.pages.detail.profile', [
            'profile' => $profile,
        ]);
    }
    public function search()
    {
    }
}
