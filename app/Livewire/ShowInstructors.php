<?php

namespace App\Livewire;

use App\Models\Instructor;
use Livewire\Component;

class ShowInstructors extends Component
{
    public function render()
    {
        return view('livewire.show-instructors')->with([
            'instructors' => Instructor::all(),
        ]);
    }
}
