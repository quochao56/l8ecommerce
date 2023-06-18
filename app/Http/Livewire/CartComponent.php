<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use DB;
class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        // lấy product có key là $rowid
        $product = Cart::get($rowId);
        // tăng quantity
        $qty = $product->qty + 1;
        // thay đổi quatity của product đc chọn
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId){
        // lấy product có key là $rowid
        $product = Cart::get($rowId);
        // giảm quantity
        $qty = $product->qty - 1;
        try {
            if ($qty < 1) {
                return;
            }
        
            Cart::update($rowId, $qty);
        
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
        
    }
    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
