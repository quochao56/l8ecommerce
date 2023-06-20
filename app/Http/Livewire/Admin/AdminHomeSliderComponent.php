<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    protected $listeners = ['deleteConfirmed'];
    public function mount()
    {
        $this->listeners[] = 'deleteConfirmed';
    }
    public function deleteProduct($id)
    {
        $slider = HomeSlider::find($id);
        if (!$slider) {
            abort(404);
        }
        // Show the SweetAlert confirmation dialog
        $this->dispatchBrowserEvent('showDeleteConfirmation', [
            'sliderId' => $slider->id,
            'sliderName' => $slider->name,
        ]);
    }
    public function deleteConfirmed($id)
    {
        $slider = HomeSlider::find($id);
        if (!$slider) {
            abort(404);
        }
        $slider->delete();
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', compact([
            'sliders'
        ]))->layout('layouts.base');
    }
}
