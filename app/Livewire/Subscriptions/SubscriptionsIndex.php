<?php

namespace App\Livewire\Subscriptions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubscriptionsIndex extends Component
{
    public $client_full_name;
    public $currency_symbol;

    public Collection $clients;
    public Collection $currencies;

    public function mount()
    {
        $this->clients = DB::table('clients')->get();
        $this->currencies = DB::table('currencies')->get();
    }

    public function delete(string $date, string $clientFullName)
    {
        DB::table('subscription_client')
            ->where('subscription_date', $date)
            ->where('client_full_name', $clientFullName)
            ->delete();

        if (DB::table('subscription_client')->where('subscription_date', $date)->doesntExist()) {
            DB::table('subscriptions')->where('date', $date)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('subscriptions')
            ->join('subscription_client', 'subscription_client.subscription_date', '=', 'subscriptions.date')
            ->when($this->client_full_name, function ($query) {
                $query->where('client_full_name', $this->client_full_name);
            })
            ->when($this->currency_symbol, function ($query) {
                $query->where('currency_symbol', $this->currency_symbol);
            })->get();

        return view('livewire.subscriptions.index', compact('items'));
    }
}
