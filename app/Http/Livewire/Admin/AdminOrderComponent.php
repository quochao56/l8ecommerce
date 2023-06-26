<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == "delivered") {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        } elseif($status == "canceled") {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        if($order->save()) {
            session()->flash('order_message', 'Order status has been updated successfully');
        }
    }
    public function render()
    {
        $orders = Order::orderBy('created_at', "DESC")->paginate(13);
        $totalResults = $orders->total();
        $startIndex = ($orders->currentPage() - 1) * $orders->perPage() + 1;
        $endIndex = min($startIndex + $orders->count() - 1, $totalResults);

        return view('livewire.admin.admin-order-component', compact([
            'orders',
            'startIndex',
            'endIndex',
            'totalResults'
        ]))->layout('layouts.base');
    }
}
