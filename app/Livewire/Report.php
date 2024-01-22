<?php

namespace App\Livewire;

use App\Models\Equipment;
use Livewire\Component;

class Report extends Component
{
    public $ss;

    public function updatedSs()
    {
        dd('sdsd');
    }
    public function render()
    {
        return view('livewire.report', [
            // 'reports' => $this->generateReport(),
        ]);
    }

    public function generateReport()
    {
        // if ($this->getReport == '1') {
        //     return Equipment::all();
        // } else {
        //     return [];
        // }
    }
}
