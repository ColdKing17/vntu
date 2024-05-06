<?php

namespace App\Livewire\Malls;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MallEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $mall;

    public function mount(string $address)
    {
        $this->mall = DB::table('malls')->where('address', $address)->first();
    }

    public function create(array $data): void
    {
        DB::table('malls')->where('address', $this->mall->address)->update($data);
        $this->redirectRoute('malls.index');
    }

    public function render()
    {
        return view('livewire.malls.edit');
    }
}
