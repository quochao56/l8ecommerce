<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at',"DESC")->paginate(13);
        $totalResults = $orders->total();
        $startIndex = ($orders->currentPage() - 1) * $orders->perPage() + 1;
        $endIndex = min($startIndex + $orders->count() - 1, $totalResults);

        return view('livewire.admin.admin-order-component',compact([
            'orders',
            'startIndex',
            'endIndex',
            'totalResults'
        ]))->layout('layouts.base');
    }
}
