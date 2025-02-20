<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{

    public string $logo;
    public string $menu;
    public string $version;
    public string $description;

    public function mount()
    {
        if (request()->routeIs(Route::currentRouteName())) {
            if (request()->routeIs('forpi')) {
                $this->version = '3.0';
                $this->description = 'Formulir Pengajuan Surat Keterangan Pendamping Ijazah';
            }
            if (request()->routeIs('forbela')) {
                $this->version = '1.0';
                $this->description = 'Formulir Pengajuan Surat Keterangan Bebas Lab';
            }
            $this->logo = Route::currentRouteName();
            $this->menu = strtoupper(Route::currentRouteName());
        }
    }
    public function render()
    {
        return view('livewire.sidebar');
    }
}
