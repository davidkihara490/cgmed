<?php

namespace App\Livewire\Admin\Dashboard;

use App\Livewire\Admin\Products\Products;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Partner;
use App\Models\SubCategory;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $partners = Partner::count();
        $categories = Category::where('status', true)->count();
        $subCategories = SubCategory::where('status', true)->count();
        $products = CategoryProduct::where('status', true)->count();
        return view('livewire.admin.dashboard.dashboard', [
            'partners' => $partners,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
        ]);
    }
}
