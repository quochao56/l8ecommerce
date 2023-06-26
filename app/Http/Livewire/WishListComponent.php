<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishListComponent extends Component
{
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
    public function moveProductFormWishlistToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate("App\Models\Product");
        Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
        
    }
    public function render()
    {
        return view('livewire.wish-list-component')->layout('layouts.base');
    }
}
