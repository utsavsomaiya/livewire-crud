<div class="max-w-5xl p-8">
    <div class="flex gap-x-96">
        <h1 class="mb-5 font-bold text-3xl text-indigo-400">Channel Index</h1>
        <a href="{{ route('channel.create') }}" class="border p-2 mb-5 font-bold text-xl text-indigo-400 bg-slate-200 rounded-full">
            Add new channel
        </a>
    </div>
    <input
        class="block appearance-none border border-solid border-black-20 rounded-lg focus:outline-none focus:bg-white focus:border-gray-500 px-5 py-3.5 font-normal text-sm text-black"
        wire:model="search"
        type="search"
    >
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="text-black-60 text-sm leading-normal">
                <th class="py-4 px-6 text-left"> # </th>
                <th class="py-4 px-6 text-left"> Name </th>
                <th class="py-4 px-6 text-left"> Slug </th>
                <th class="py-4 px-6 text-left"> Banner </th>
                <th class="py-4 px-6 text-left"> Actions </th>
            </tr>
        </thead>

        <tbody class="text-black-60 text-sm font-light">
            @foreach($channels as $channel)
                <tr class="bg-accent-a6 border-gray-200 hover:bg-accent-a7">
                    <td class="font-medium py-4 px-6 text-left">
                        {{ $channel->id }}
                    </td>
                    <td class="font-medium py-4 px-6 text-left">
                        {{ $channel->name }}
                    </td>
                    <td class="font-medium py-4 px-6 text-left">
                        {{ $channel->slug }}
                    </td>
                    <td class="font-medium py-4 px-6 text-left">
                        <img src="{{ $channel->getFirstMediaUrl('channel-images', 'preview') }}" :alt="{{ $channel->name }}" width="70">
                    </td>
                    <td class="flex gap-5 font-medium py-4 px-6 text-left">
                        <a href="{{ route('channel.edit', ['id' => $channel->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>
                        <button wire:click="deleteChannel({{ $channel->id }})" onclick="confirm('Are you sure you want to remove the channel?') || event.stopImmediatePropagation()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="gap-x-96 {{ $search ? 'hidden' : 'flex' }}">
        <a href="{{ $channels->previousPageUrl() }}" class="border bg-slate-500 p-2 rounded">Previous</a>
        <a href="{{ $channels->nextPageUrl() }}" class="border bg-slate-500 p-2 rounded ml-96">Next</a>
    </div>
</div>
