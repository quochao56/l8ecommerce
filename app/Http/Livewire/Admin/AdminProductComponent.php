<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    protected $listeners = ['deleteConfirmed'];
    public function mount(){
    $this->listeners[] = 'deleteConfirmed';
    }
    public function deleteProduct($id)
    {
        $products = Product::find($id);
        if (!$products) {
            abort(404);
        }
        // Show the SweetAlert confirmation dialog
        $this->dispatchBrowserEvent('showDeleteConfirmation', [
            'productId' => $products->id,
            'productName' => $products->name,
        ]);
    }
    public function deleteConfirmed($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $product->delete();
    }
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
