<?php

use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    public $posts;

    protected $listeners = ['postCreated' => 'refreshPosts'];

    public function mount(): void
    {
        $this->posts = Post::latest()->get();
    }

    public function refreshPosts(): void
    {
        $this->posts = Post::latest()->get();
    }
}; ?>

<div class="space-y-2">
    @foreach ($posts as $post)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div>
                    <div class="font-semibold">
                        {{ $post->user->name }}
                    </div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                        {{ $post->created_at->diffForHumans() }}
                    </div>
                </div>
                <p>{{ $post->body }}</p>
                <div class="mt-4">
                    <x-primary-button>
                        <a href="{{ route('charge-checkout', $post) }}">
                            {{ __('Buy') }}
                        </a>
                    </x-primary-button>
                </div>
            </div>
        </div>
    @endforeach
</div>
