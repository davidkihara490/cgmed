<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = CompanyProfile::first();
        $categories = Category::with('products')->where('status', true)->get();
        return view('welcome', compact('settings', 'categories'));
    }
}
