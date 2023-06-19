<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    protected $listeners = ['deleteConfirmed'];
    public function mount()
{
    $this->listeners[] = 'deleteConfirmed';
}
    public function deleteCategory($id)
    {
        $categories = Category::find($id);
        if (!$categories) {
            abort(404);
        }
        // Show the SweetAlert confirmation dialog
        $this->dispatchBrowserEvent('showDeleteConfirmation', [
            'categoryId' => $categories->id,
            'categoryName' => $categories->name,
        ]);
        // $categories->delete();
        // session()->flash('message', 'Category has been deleted successfully');
    }
    public function deleteConfirmed($id)
    {
        $categories = Category::find($id);
        if (!$categories) {
            abort(404);
        }
        // dd($categories);
        $categories->delete();
        session()->flash('message', 'Category has been deleted successfully');
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
