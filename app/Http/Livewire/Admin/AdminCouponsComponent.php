<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    protected $listeners = ['deleteConfirmed'];
    public function mount(){
    $this->listeners[] = 'deleteConfirmed';
    }
    public function deleteCoupon($id)
    {
        $coupons = Coupon::find($id);
        if (!$coupons) {
            abort(404);
        }
    }
    public function deleteConfirmed($id)
    {
        $coupons = Coupon::find($id);
        if (!$coupons) {
            abort(404);
        }
        $coupons->delete();
    }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component',compact([
            'coupons',
        ]))->layout("layouts.base");
    }
}
