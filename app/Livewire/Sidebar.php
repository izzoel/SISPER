<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{

    public string $logo;
    public string $menu;

    public function mount()
    {
        if (request()->routeIs(Route::currentRouteName())) {
            $this->logo = Route::currentRouteName();
            $this->menu = strtoupper(Route::currentRouteName());
        }
    }
    public function render()
    {
        return view('livewire.sidebar');
    }
}
