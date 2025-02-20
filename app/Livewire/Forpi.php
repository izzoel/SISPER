<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Forpi extends Component
{
    #[Title('SISPER | FORPI')]
    public function render()
    {
        return view('livewire.forpi');
    }
}
