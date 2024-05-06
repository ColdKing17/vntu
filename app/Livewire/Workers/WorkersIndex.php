<?php

namespace App\Livewire\Workers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WorkersIndex extends Component
{
    public $office_address;
    public $cabinet_number;

    public Collection $offices;
    public Collection $cabinets;

    public function mount()
    {
        $this->offices = DB::table('offices')->get();
        $this->cabinets = DB::table('cabinets')->get();
    }

    public function delete(string $fullName, string $cabinetNumber, string $officeAddress)
    {
        DB::table('worker_cabinet_office')
            ->where('worker_full_name', $fullName)
            ->where('cabinet_number', $cabinetNumber)
            ->where('office_address', $officeAddress)
            ->delete();

        if (DB::table('worker_cabinet_office')->where('worker_full_name', $fullName)->doesntExist()) {
            DB::table('workers')->where('full_name', $fullName)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('workers')
            ->join('worker_cabinet_office', 'worker_cabinet_office.worker_full_name', '=', 'workers.full_name')
            ->when($this->office_address, function ($query) {
                $query->where('office_address', $this->office_address);
            })
            ->when($this->cabinet_number, function ($query) {
                $query->where('cabinet_number', $this->cabinet_number);
            })->get();

        return view('livewire.workers.index', compact('items'));
    }
}
