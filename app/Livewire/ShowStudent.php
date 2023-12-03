<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class ShowStudent extends Component
{
    public Student $student;
    public function render()
    {
        return view('livewire.show-student');
    }
}
