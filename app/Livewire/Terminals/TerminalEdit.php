<?php

namespace App\Livewire\Terminals;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TerminalEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $terminal;

    public function mount(string $internal_number, string $mall_address)
    {
        $this->terminal = DB::table('terminals')->where('internal_number', $internal_number)->first();
        $this->terminal->mall_address = $mall_address;
    }

    public function create(array $data): void
    {
        DB::table('terminals')->where('internal_number', $this->terminal->internal_number)->delete();

        DB::table('terminals')->insert($data['terminal']);
        DB::table('terminal_mall')->insert($data['terminal_mall']);

        $this->redirectRoute('terminals.index');
    }

    public function render()
    {
        return view('livewire.terminals.edit');
    }
}
