<?php

namespace App\Livewire\Subscriptions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubscriptionForm extends Component
{
    public $amount;
    public $date;
    public $payment_method;
    public $duration;
    public $currency_symbol;
    public $client_full_name;

    public Collection $clients;
    public Collection $currencies;

    public function mount($subscription = null)
    {
        $this->clients = DB::table('clients')->get();
        $this->currencies = DB::table('currencies')->get();

        if ($subscription) {
            $this->amount = $subscription->amount;
            $this->date = $subscription->date;
            $this->payment_method = $subscription->payment_method;
            $this->duration = $subscription->duration;
            $this->currency_symbol = $subscription->currency_symbol;
            $this->client_full_name = $subscription->client_full_name;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'subscription' => [
                'amount' => $this->amount,
                'date' => $this->date,
                'payment_method' => $this->payment_method,
                'duration' => $this->duration,
                'currency_symbol' => $this->currency_symbol,
            ],
            'subscription_client' => [
                'subscription_date' => $this->date,
                'client_full_name' => $this->client_full_name,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.subscriptions.form');
    }
}
