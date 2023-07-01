<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class ThankyouComponent extends Component
{
    public $order_id;
    public $status;
    public $paymentmode;
    public $thankyou;

    public function mount($order_id, $status,$paymentmode)
    {
        $this->order_id = $order_id;
        $this->status = $status;
        $this->paymentmode = $paymentmode;
    }
    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }
    public function makeTransaction($order_id, $status, $paymentmode)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $paymentmode;
        $transaction->status = $status;
        $transaction->save();
    }
    
    public function render()
    {
        $this->resetCart();
        $this->makeTransaction($this->order_id, $this->status,$this->paymentmode);
        return view('livewire.thankyou-component')->layout('layouts.base');
    }
}
