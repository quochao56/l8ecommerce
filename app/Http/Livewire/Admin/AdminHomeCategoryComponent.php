<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberOfProducts;

    public function mount()
    {
        $category = HomeCategory::find(1);
        // xử lý chuỗi tách ',' trong sel_categories
        $this->selected_categories = explode(',', $category->sel_categories);
        $this->numberOfProducts = $category->no_of_products;
    }
    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',', $this->selected_categories);
        $category->no_of_products = $this->numberOfProducts;
        if($category->save()) {
            session()->flash('message', 'HomeCategory has been updated successfully');
        }
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component', compact([
            'categories'
        ]))->layout('layouts.base');
    }
}
