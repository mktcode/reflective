<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public string $body = '';

    public function createPost(): void
    {
        if (!auth()->user()->can('create', Post::class)) {
            $this->addError('body', __('You can create a new post only once every minute.'));
            return;
        }

        $this->validate([
            'body' => 'required|string|max:255',
        ]);

        auth()->user()->posts()->create([
            'body' => $this->body,
        ]);

        $this->body = '';

        $this->dispatch('postCreated');
    }
}; ?>

<div>
    <form wire:submit="createPost">
        <x-input-label for="body" :value="__('Post')"/>
        <x-textarea-input wire:model="body" id="body" class="block mt-1 w-full" name="body" required autofocus/>
        <x-input-error :messages="$errors->get('body')" class="mt-2"/>

        <x-primary-button class="mt-3">
            {{ __('Post') }}
        </x-primary-button>
    </form>
</div>
