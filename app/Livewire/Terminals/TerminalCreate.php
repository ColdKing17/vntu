<?php

namespace App\Livewire\Terminals;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TerminalCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('terminals')->insert($data['terminal']);
        DB::table('terminal_mall')->insert($data['terminal_mall']);

        $this->redirectRoute('terminals.index');
    }

    public function render()
    {
        return view('livewire.terminals.create');
    }
}
