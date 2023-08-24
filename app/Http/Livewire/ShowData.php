<?php

namespace App\Http\Livewire;

use App\Models\medication;
use Livewire\Component;

class ShowData extends Component
{
    public $medicines;

    public function render()
    {
        $this->medicines = medication::all();
        return view('livewire.show-data');
    }
}
