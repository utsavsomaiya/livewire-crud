<?php

namespace App\Http\Livewire\Channel;

use App\Enums\ChannelStatus;
use App\Models\Channel;
use App\Models\User;
use Livewire\Component;

class CreateOrUpdate extends Component
{
    public $name;
    public $description;
    public $draft = ChannelStatus::Draft;
    public $published = ChannelStatus::Published;
    public $suspended = ChannelStatus::Suspended;

    protected $rules = [
        'name' => ['required', 'max:255', 'string'],
        'description' => ['nullable', 'max:255', 'string'],
        'status' => ['required', 'string'],
    ];

    public function mount($id = null)
    {
        if ($id) {
            $channel = Channel::find($id);
            $this->name = $channel->name;
            $this->description = $channel->description;
            $this->status = $channel->status;
        }
    }

    public function createChannel()
    {
        $validatedData = $this->validate();
        $validatedData['owner_id'] = User::factory()->create()->id;

        Channel::create($validatedData);
    }

    public function updateChannel($id)
    {

    }

    public function render()
    {
        return view('livewire.channel.create-or-update')
            ->extends('app.layout')
            ->section('content');
    }
}
