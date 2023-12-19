<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Instructor;
use Livewire\Component;

class ShowInstructor extends Component
{
    public Instructor $instructor;

    public function render()
    {
        return view('livewire.show-instructor')->with([
            'courses' => Course::forInstructors($this->instructor->id)
        ]);
    }
}
