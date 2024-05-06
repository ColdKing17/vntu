<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentForm extends Component
{
    public $name;
    public $supported_currency_symbol;
    public $security_level;
    public $max_sum;
    public $commission;
    public $terminal_internal_number;

    public Collection $currencies;
    public Collection $terminals;

    public function mount($payment = null)
    {
        $this->currencies = DB::table('currencies')->get();
        $this->terminals = DB::table('terminals')->get();

        if ($payment) {
            $this->name = $payment->name;
            $this->supported_currency_symbol = $payment->supported_currency_symbol;
            $this->security_level = $payment->security_level;
            $this->max_sum = $payment->max_sum;
            $this->commission = $payment->commission;
            $this->terminal_internal_number = $payment->terminal_internal_number;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'payment' => [
                'name' => $this->name,
                'supported_currency_symbol' => $this->supported_currency_symbol,
                'security_level' => $this->security_level,
                'max_sum' => $this->max_sum,
                'commission' => $this->commission,
            ],
            'payment_terminal' => [
                'payment_name' => $this->name,
                'terminal_internal_number' => $this->terminal_internal_number,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.payments.form');
    }
}
