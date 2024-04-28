<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentsIndex extends Component
{
    public function delete(string $date, string $clientFullName, string $realEstateAddress)
    {
        DB::table('payments')
            ->where('date', $date)
            ->where('client_full_name', $clientFullName)
            ->where('real_estate_address', $realEstateAddress)
            ->delete();
    }

    public function render()
    {
        $items = DB::table('payments')->get();

        return view('livewire.payments.payments-index', compact('items'));
    }
}
