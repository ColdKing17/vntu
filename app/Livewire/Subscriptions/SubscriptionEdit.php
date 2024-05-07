<?php

namespace App\Livewire\Subscriptions;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubscriptionEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $subscription;

    public function mount(string $date, string $client_full_name)
    {
        $this->subscription = DB::table('subscriptions')->where('date', $date)->first();
        $this->subscription->client_full_name = $client_full_name;
    }

    public function create(array $data): void
    {
        DB::table('subscriptions')->where('date', $this->subscription->date)->delete();

        DB::table('subscriptions')->insert($data['subscription']);
        DB::table('subscription_client')->insert($data['subscription_client']);

        $this->redirectRoute('subscriptions.index');
    }

    public function render()
    {
        return view('livewire.subscriptions.edit');
    }
}
