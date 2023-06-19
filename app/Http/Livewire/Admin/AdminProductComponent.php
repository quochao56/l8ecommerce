<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(10);
        $totalResults = $products->total();
        $startIndex = ($products->currentPage() - 1) * $products->perPage() + 1;
        $endIndex = min($startIndex + $products->count() - 1, $totalResults);

        return view('livewire.admin.admin-product-component',compact([
            'products',
            'startIndex',
            'endIndex',
            'totalResults'
        ]))->layout('layouts.base');
    }
}
