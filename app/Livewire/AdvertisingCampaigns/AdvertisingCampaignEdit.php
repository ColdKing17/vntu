<?php

namespace App\Livewire\AdvertisingCampaigns;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdvertisingCampaignEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $advertisingCampaign;

    public function mount(string $name)
    {
        $this->advertisingCampaign = DB::table('advertising_campaigns')->where('name', $name)->first();
    }

    public function create(array $data): void
    {
        DB::table('advertising_campaigns')->where('name', $this->advertisingCampaign->name)->update($data);
        $this->redirectRoute('advertising-campaigns.index');
    }

    public function render()
    {
        return view('livewire.advertising-campaigns.advertising-campaign-edit');
    }
}
