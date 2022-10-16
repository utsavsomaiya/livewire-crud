<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public $search;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteChannel($id)
    {
        Channel::whereId($id)->delete();
        $this->emit('$refresh');
    }

    public function render()
    {
        return view('livewire.channel.index', [
            'channels' => Channel::query()
                ->with(['media'])
                ->when($search = $this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%')
                        ->orWhere('id', $search)
                        ->orWhere('description', 'like', '%'.$search.'%')
                        ->orWhere('slug', 'like', '%'.$search.'%');
                })
                ->paginate(5),
        ])
            ->extends('app.layout')
            ->section('content');
    }
}
