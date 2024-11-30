<?php

use App\Livewire\Actions\Logout;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public User $user;

    public function mount(): void
    {
        $this->user = Auth::user();
    }

    public function redirectToStripe(Logout $logout): void
    {
        if (! auth()->user()->getStripeAccountId()) {
            auth()->user()->createStripeAccount(['type' => 'express']);
        }

        if (! auth()->user()->isStripeAccountActive()) {
            $accountLink = auth()->user()->getStripeAccountLink();
            $this->redirect($accountLink);
        }
    }
}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Connect Stripe Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('In order to receive payments, you must connect a Stripe account to your profile.') }}
        </p>
    </header>

    @if($user->isStripeAccountActive())
        <div class="space-y-4">
            <p class="text-sm text-green-700">
                {{ __('Your Stripe account is connected.') }}
            </p>
{{--            Go to dashboard button--}}
            <x-secondary-button>
                <a href="https://dashboard.stripe.com/{{ $user->stripe_account_id }}" target="_blank">
                    {{ __('Go to Stripe Dashboard') }}
                </a>
            </x-secondary-button>
        </div>
    @else
        <x-primary-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'connect-stripe-account')"
        >{{ __('Connect Stripe Account') }}</x-primary-button>

        <x-modal name="connect-stripe-account" :show="$errors->isNotEmpty()" focusable>
            <form wire:submit="redirectToStripe" class="p-6">

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('You will now be redirected to Stripe.') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Please follow the instructions on the Stripe website to create and/or connect your account.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3">
                        {{ __('Continue') }}
                    </x-primary-button>
                </div>
            </form>
        </x-modal>
    @endif
</section>
