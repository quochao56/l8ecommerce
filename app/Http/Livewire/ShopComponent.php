<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart; // Import the Cart facade
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;
    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->min_price = 1;
        $this->max_price = 1000;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate("App\Models\Product");
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate("App\Models\Product");
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem) {
            if($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            }
        }
    }
    public function render()
    {
        $products = Product::paginate(12);
        if ($this->sorting == "date") {
            $products = Product::orderBy('created_at', 'DESC')
                ->paginate($this->pagesize);
        } elseif ($this->sorting == "price") {
            $products = Product::orderBy('regular_price', 'ASC')
                ->paginate($this->pagesize);
        } elseif ($this->sorting == "price-desc") {
            $products = Product::orderBy('regular_price', 'DESC')
                ->paginate($this->pagesize);
        } else {
            $products = Product::paginate($this->pagesize);
        }
        // whereBetween('regular_price', [$this->min_price, $this->max_price])
        $categories = Category::all();
        $totalResults = $products->total();
        $startIndex = ($products->currentPage() - 1) * $products->perPage() + 1;
        $endIndex = min($startIndex + $products->count() - 1, $totalResults);
        return view('livewire.shop-component', compact([
            'products',
            'categories',
            'startIndex',
            'endIndex',
            'totalResults',
        ]))->layout("layouts.base");
    }
}
