<?php

namespace App\Livewire;

use App\Models\Entry;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BirdForm extends Component
{
    #[Validate('required|integer')]
    public int $count;
    #[Validate('required|string')]
    public string $notes;

    public function submit()
    {
        $this->validate();

        Entry::create([
            'bird_count' => $this->count,
            'notes' => $this->notes
        ]);

        $this->reset();
    }

    public function delete($id)
    {
        Entry::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.bird-form', ['entries' => Entry::all()]);
    }
}
