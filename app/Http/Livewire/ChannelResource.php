<?php

namespace App\Http\Livewire;

use App\Enums\ChannelStatus;
use App\Models\Channel;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ChannelResource extends Component
{
    use WithPagination;

    public $flag = true;
    public $name;
    public $channelId;
    public $description;
    public $draft = ChannelStatus::Draft;
    public $published = ChannelStatus::Published;
    public $suspended = ChannelStatus::Suspended;
    protected $queryString = ['channelId'];

    protected $rules = [
        'name' => ['required', 'max:255', 'string'],
        'description' => ['nullable', 'max:255', 'string'],
        'status' => ['required', 'string'],
    ];

    public function deleteChannel($id)
    {
        $channel = Channel::whereId($id)->with(['media'])->first();
        $channel->delete();

        $this->emit('$refresh');
    }

    public function createChannel()
    {
        $validatedData = $this->validate();
        $validatedData['owner_id'] = User::factory()->create()->id; 

        Channel::create($validatedData);
    }

    public function editChannel($id)
    {
        $this->updateFlag(false);
        $this->channelId = $id;
        $channel = Channel::whereId($id)->first();
        $this->name = $channel->name;
        $this->description = $channel->description; 
        $this->status = $channel->status; 
    }

    public function updateChannel($id)
    {
        $validatedData = $this->validate();

        Channel::whereId($id)->update($validatedData);

        $this->flag = true;

        $this->emit('$refresh');
    }

    public function updateFlag($newValue)
    {
        $this->flag = $newValue;
    }

    public function render()
    {
        return view('livewire.channel-resource', [
            'channels' => Channel::query()->simplePaginate(5),
        ])
            ->extends('app.layout')
            ->section('content');
    }
}
