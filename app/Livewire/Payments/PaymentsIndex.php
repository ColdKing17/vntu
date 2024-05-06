<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentsIndex extends Component
{
    public $min_commission;
    public $max_commission;
    public $terminal_internal_number;

    public Collection $terminals;

    public function mount()
    {
        $this->terminals = DB::table('terminals')->get();
    }

    public function delete(string $name, string $terminal_internal_number)
    {
        DB::table('payment_terminal')
            ->where('payment_name', $name)
            ->where('terminal_internal_number', $terminal_internal_number)
            ->delete();

        if (DB::table('payment_terminal')->where('payment_name', $name)->doesntExist()) {
            DB::table('payments')->where('payment_name', $name)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('payments')
            ->join('payment_terminal', 'payment_terminal.payment_name', '=', 'payments.name')
            ->when($this->min_commission, function ($query) {
                $query->where('commission', '>=', $this->min_commission);
            })
            ->when($this->max_commission, function ($query) {
                $query->where('commission', '<=', $this->max_commission);
            })
            ->when($this->terminal_internal_number, function ($query) {
                $query->where('terminal_internal_number', $this->terminal_internal_number);
            })->get();

        return view('livewire.payments.index', compact('items'));
    }
}
