<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    protected $listeners = [
        'deleteConfirmedCategory',
        'deleteConfirmedSubcategory'
    ];

    public function mount()
    {
        $this->listeners[] = 'deleteConfirmedCategory';
        $this->listeners[] = 'deleteConfirmedOther';
    }
    public function deleteCategory($id)
    {
        $categories = Category::find($id);
        if (!$categories) {
            abort(404);
        }
    }
    public function deleteConfirmedCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            abort(404);
        }
        $category->delete();
    }
    public function deleteSubcategory($id){
        $scategory = Subcategory::find($id);
        if (!$scategory) {
            abort(404);
        }
    }

    public function deleteConfirmedSubcategory($id)
    {
        $scategory = Subcategory::find($id);
        if (!$scategory) {
            abort(404);
        }

        $scategory->delete();
    }
    public function render()
    {
        $categories = Category::paginate(5);
        $totalResults = $categories->total();
        $startIndex = ($categories->currentPage() - 1) * $categories->perPage() + 1;
        $endIndex = min($startIndex + $categories->count() - 1, $totalResults);

        return view('livewire.admin.admin-category-component', compact(['categories',
                                                                        'startIndex',
                                                                        'endIndex',
                                                                        'totalResults']))->layout('layouts.base');
    }

}
