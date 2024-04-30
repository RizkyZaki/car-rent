<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Faq;
use App\Models\PostCar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard.index', [
            'title' => 'Dashboard',
            'heading' => 'Data Dashboard',
            'countFaq' => Faq::count(),
            'countBlog' => Blog::count(),
            'countPost' => PostCar::count(),
            'countCat' => Category::count()
        ]);
    }
}
