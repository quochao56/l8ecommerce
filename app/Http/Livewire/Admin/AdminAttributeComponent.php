<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAttributeComponent extends Component
{
    protected $listeners = [
        'deleteConfirmed',
    ];

    public function mount()
    {
        $this->listeners[] = 'deleteConfirmed';
    }
    public function deletepattribute($id)
    {
        $attribute = ProductAttribute::find($id);
        if (!$attribute) {
            abort(404);
        }
    }
    public function deleteConfirmed($id)
    {
        $attribute = ProductAttribute::find($id);
        if (!$attribute) {
            abort(404);
        }
        $attribute->delete();
    }
    public function render()
    {
        $pattributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attribute-component',compact([
            'pattributes',
        ]))->layout('layouts.base');
    }
}
