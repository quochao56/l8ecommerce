<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => ['required','string'],
            'slug' => ['required','unique:categories']
        ]);
    }
    public function storeCategory(){
        $this->validate([
            'name' => ['required','string'],
            'slug' => ['required','unique:categories']
        ]);
        if($this->category_id){
            $scategory = new Subcategory();
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $scategory->category_id = $this->category_id;
            $scategory->save();
        }
        else{
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
        }
        session()->flash('message', 'Category has been created successfully!');
    }
    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.admin-add-category-component',compact([
            "categories"
        ]))->layout('layouts.base');
    }
}
