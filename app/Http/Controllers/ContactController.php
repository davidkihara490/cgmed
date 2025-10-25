<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\Category;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
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
    public function showContactForm()
    {
        $settings = $this->getCompanySettings();
        $categories = $this->getCategories();
        $aboutSection = $this->getAboutSection();

        return view('contact', compact('settings', 'categories', 'aboutSection'));
    }
}
