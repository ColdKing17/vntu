<?php

namespace App\Livewire\AdvertisingCampaigns;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdvertisingCampaignsIndex extends Component
{
    public function render()
    {
        return view('livewire.advertising-campaigns.advertising-campaigns-index', [
            'items' => DB::table('advertising_campaigns')->get(),
        ]);
    }
}
