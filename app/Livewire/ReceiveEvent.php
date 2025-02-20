<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ReceiveEvent extends Component
{
    public string $message = 'No message yet';

    #[On('messageSent')]
    public function displayMessage($newMessage)
    {
        $this->message = $newMessage;
    }
    #[On('messageReset')]
    public function resetMessage()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.receive-event');
    }
}
