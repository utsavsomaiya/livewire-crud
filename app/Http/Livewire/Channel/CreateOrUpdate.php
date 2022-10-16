<?php

namespace App\Http\Livewire\Channel;

use App\Enums\ChannelStatus;
use App\Models\Channel;
use App\Models\User;
use Livewire\Component;

class CreateOrUpdate extends Component
{
    public $name;
    public $channelId;
    public $description;
    public $channelCoverImage;
    public $status;
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
            $this->channelId = $id;
            $channel = Channel::find($id);
            $this->name = $channel->name;
            $this->channelCoverImage = $channel->getFirstMediaUrl('channel-images', 'preview');
            $this->description = $channel->description;
            $this->status = $channel->status->value;
        }
    }

    public function createChannel()
    {
        $validatedData = $this->validate();
        $validatedData['owner_id'] = User::factory()->create()->id;

        Channel::create($validatedData);

        session()->flash('message', 'Channel Created Successfully');

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->channelCoverImage = '';
        $this->description = '';
        $this->status = '';
    }

    public function updateChannel($id)
    {
        $validatedData = $this->validate();
        $validatedData['owner_id'] = User::factory()->create()->id;

        Channel::whereId($id)->update($validatedData);

        session()->flash('message', 'Channel Updated Successfully');
    }

    public function render()
    {
        return view('livewire.channel.create-or-update')
            ->extends('app.layout')
            ->section('content');
    }
}
