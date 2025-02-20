<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Navbar extends Component
{
    public string $menu;
    public string $description;

    public function mount()
    {
        if (request()->routeIs(Route::currentRouteName())) {
            if (request()->routeIs('forpi')) {
                $this->description = 'Formulir Pengajuan Surat Keterangan Pendamping Ijazah';
            }
            if (request()->routeIs('forbela')) {
                $this->description = 'Formulir Pengajuan Surat Keterangan Bebas Lab';
            }
            $this->menu = strtoupper(Route::currentRouteName());
        }
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
