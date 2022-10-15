<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Channel extends Component
{

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.channel')
            ->extends('app.layout');
    }
}
