<?php

namespace App\Livewire\Subscriptions;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubscriptionCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('subscriptions')->insert($data['subscription']);
        DB::table('subscription_client')->insert($data['subscription_client']);

        $this->redirectRoute('subscriptions.index');
    }

    public function render()
    {
        return view('livewire.subscriptions.create');
    }
}
