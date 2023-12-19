<?php

namespace App\Livewire;

use App\Models\Instructor;
use Livewire\Component;

class ShowInstructors extends Component
{
    public function show(int $id): void
    {
        $this->redirectRoute('instructors.show', $id);
    }
    public function render()
    {
        return view('livewire.show-instructors')->with([
            'instructors' => Instructor::all(),
        ]);
    }
}
