<?php

namespace App\Livewire\AdvertisingCampaigns;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdvertisingCampaignsIndex extends Component
{
    public $target_audience;
    public $min_conversion;
    public $max_conversion;

    public function delete(string $name)
    {
        DB::table('advertising_campaigns')->where('name', $name)->delete();
    }

    public function render()
    {
        $items = DB::table('advertising_campaigns')
            ->when($this->min_conversion, function ($query) {
                $query->where('conversion', '>=', $this->min_conversion);
            })
            ->when($this->max_conversion, function ($query) {
                $query->where('conversion', '<=', $this->max_conversion);
            })
            ->when($this->target_audience, function ($query) {
                $query->where('target_audience', 'like', "%{$this->target_audience}%");
            })->get();

        return view('livewire.advertising-campaigns.advertising-campaigns-index', compact('items'));
    }
}
