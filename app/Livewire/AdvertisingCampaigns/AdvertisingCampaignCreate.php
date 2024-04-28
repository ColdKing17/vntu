<?php

namespace App\Livewire\AdvertisingCampaigns;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdvertisingCampaignCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('advertising_campaigns')->insert($data);
        $this->redirectRoute('advertising-campaigns.index');
    }

    public function render()
    {
        return view('livewire.advertising-campaigns.advertising-campaign-create');
    }
}
