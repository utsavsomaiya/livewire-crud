<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function deleteChannel($id)
    {
        Channel::whereId($id)->delete();
        $this->emit('$refresh');
    }

    public function render()
    {
        return view('livewire.channel.index', [
            'channels' => Channel::simplePaginate(5),
        ])
            ->extends('app.layout')
            ->section('content');
    }
}
