<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\CompanyProfile;
use App\Models\Section;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Protected methods for reusable data
    protected function getCompanySettings()
    {
        return CompanyProfile::first();
    }

    protected function getCategories()
    {
        return Category::with([
            'subCategory' => function ($query) {
                $query->where('status', true)
                    ->limit(6);
            },
            'subCategory.products' => function ($query) {
                $query->where('status', true)
                    ->limit(9);
            }
        ])
            ->where('status', true)
            ->limit(4)
            ->get();
    }

    protected function getAboutSection()
    {
        return AboutSection::get();
    }

    protected function getFeaturedProducts()
    {
        return CategoryProduct::inRandomOrder()->limit(9)->get();
    }

    public function index()
    {
        $settings = $this->getCompanySettings();
        $categories = $this->getCategories();
        $aboutSection = $this->getAboutSection();
        $featuredProducts = $this->getFeaturedProducts();

        return view('welcome', compact('settings', 'categories', 'aboutSection', 'featuredProducts'));
    }

    public function show($sectionType)
    {
        $data = AboutSection::where('section_type', $sectionType)->first();
        
        // Share common data with other methods
        $settings = $this->getCompanySettings();
        $categories = $this->getCategories();

        return view('section_type', compact('data', 'settings', 'categories'));
    }

    public function showProduct($id)
    {
        $product = CategoryProduct::findOrFail((int)$id);
        
        // Share common data
        $settings = $this->getCompanySettings();
        $categories = $this->getCategories();
        $featuredProducts = $this->getFeaturedProducts();

        return view('product', compact('product', 'settings', 'categories', 'featuredProducts'));
    }

    public function showCategory($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $products = $subCategory->products()->where('status', true)->inRandomOrder()->limit(9)->get();
        
        // Share common data
        $settings = $this->getCompanySettings();
        $categories = $this->getCategories();
                $aboutSection = $this->getAboutSection();



        return view('category', compact('products', 'subCategory', 'settings', 'categories', 'aboutSection'));
    }
}