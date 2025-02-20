<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Forbela extends Component
{
    #[Title('SISPER | FORBELA')]
    public function render()
    {
        return view('livewire.forbela');
    }
}
