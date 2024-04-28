<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentsIndex extends Component
{
    public function render()
    {
        $items = DB::table('payments')->get();

        return view('livewire.payments.payments-index', compact('items'));
    }
}
