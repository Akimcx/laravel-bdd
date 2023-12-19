<?php

namespace App\Livewire;

use App\Models\Session;
use App\Models\Student;
use Livewire\Component;

class ShowStudent extends Component
{
    public Student $student;
    public function render()
    {
        return view('livewire.show-student')->with([
            'sessions' => Session::inCourses($this->student->courses->pluck('id'))->inSchools($this->student->school->id)->get()
        ]);
    }
}
