<div>
    <div>
        <h1 class="mb-5 font-bold text-3xl text-indigo-400">Channel Details</h1>
        <form wire:submit.prevent="createChannel">
            <label class="block font-medium text-base text-primary-p3 my-2">Name</label>
            <input type="text" wire:model="name"
                class="w-full block appearance-none border border-solid border-black-20 rounded-lg focus:outline-none focus:bg-white focus:border-gray-500 px-5 py-3.5 font-normal text-sm text-black"
            >
            @error('name')
                <p class="text-red-700">{{ $message }}</p>
            @enderror

            <label class="block font-medium text-base text-primary-p3 my-2">Channel Description</label>
            <input type="text" wire:model="description"
                class="w-full block appearance-none border border-solid border-black-20 rounded-lg focus:outline-none focus:bg-white focus:border-gray-500 px-5 py-3.5 font-normal text-sm text-black"
            >
            @error('description')
                <p class="text-red-700">{{ $message }}</p>
            @enderror

            <label class="block font-medium text-base text-primary-p3 my-2">Channel Status</label>
            <select wire:model="status"
                class="w-full block appearance-none border border-solid border-black-20 rounded-lg focus:outline-none focus:bg-white focus:border-gray-500 px-5 py-3.5 font-normal text-sm text-black"
            >   
                <option value="">Select Status</option>
                <option value="{{ $draft }}">{{ $draft }}</option>
                <option value="{{ $published }}">{{ $published }}</option>
                <option value="{{ $suspended }}">{{ $suspended }}</option>
            </select>
            @error('status')
                <p class="text-red-700">{{ $message }}</p>
            @enderror

            <input type="file" />

            <button type="submit"
                class="mt-5 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg"
                :disabled="form.processing"
            >
            </button>
        </form>
    </div>
</div>
