<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart; // Import the Cart facade
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize;
    public $category_slug;

    public $min_price;
    public $max_price;
    public $scategory_slug;
    public function mount($category_slug, $scategory_slug=null)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
        $this->scategory_slug = $scategory_slug;
        $this->min_price = 1;
        $this->max_price = 1000;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate("App\Models\Product");
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }


    public function render()
    {
        $category_id = null;
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        // sort
        if($this->sorting=="date") {
            $products = Product::where($filter.'category_id', $category_id)->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } elseif($this->sorting=="price") {
            $products = Product::where($filter.'category_id', $category_id)->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } elseif($this->sorting=="price-desc") {
            $products = Product::where($filter . 'category_id', $category_id)->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::where($filter . 'category_id', $category_id)->whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->pagesize);
        }

        $categories = Category::all();
        return view('livewire.category-component', compact(['products','categories','category_name']))->layout("layouts.base");
    }
}
