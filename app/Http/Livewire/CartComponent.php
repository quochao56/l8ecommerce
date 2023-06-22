<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use DB;
class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        // lấy product có key là $rowid
        $product = Cart::instance('cart')->get($rowId);
        // tăng quantity
        $qty = $product->qty + 1;
        // thay đổi quatity của product đc chọn
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');

    }
    public function decreaseQuantity($rowId){
        // lấy product có key là $rowid
        $product = Cart::instance('cart')->get($rowId);
        // giảm quantity
        $qty = $product->qty - 1;
        try {
            if ($qty < 1) {
                return;
            }
        
            Cart::instance('cart')->update($rowId, $qty);
            $this->emitTo('cart-count-component','refreshComponent');

        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
        
    }
    public function destroyAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');

    }
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been removed');
    }
    public function switchToSaveForLate($rowId){
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id, $item->name,1,$item->price)->associate("App\Models\Product");
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been saved for later');
    }
    public function moveToCart($rowId){
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name,1,$item->price)->associate("App\Models\Product");
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message','Item has been move to cart');
    }
    public function deleteFromSaveForLater($rowId){
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('s_success_message','Item has been removed from save for later');

    }
    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
