<?php

namespace App\Livewire\AdvertisingCampaigns;

use Livewire\Component;

class AdvertisingCampaignForm extends Component
{
    public $name;
    public $budget;
    public $date;
    public $target_audience;
    public $conversion;

    public function mount($advertisingCampaign = null)
    {
        if ($advertisingCampaign) {
            $this->name = $advertisingCampaign->name;
            $this->budget = $advertisingCampaign->budget;
            $this->date = $advertisingCampaign->date;
            $this->target_audience = $advertisingCampaign->target_audience;
            $this->conversion = $advertisingCampaign->conversion;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'budget' => $this->budget,
            'date' => $this->date,
            'target_audience' => $this->target_audience,
            'conversion' => $this->conversion,
        ]);
    }

    public function render()
    {
        return view('livewire.advertising-campaigns.advertising-campaign-form');
    }
}
