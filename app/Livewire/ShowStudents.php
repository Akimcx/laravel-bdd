<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class ShowStudents extends Component
{
    public function show(int $id): void
    {
        $this->redirectRoute('students.show', $id, navigate: true);
    }
    public function render()
    {
        // dd(Student::all());
        return view('livewire.show-students')->with([
            'students' => Student::all(),
        ]);
    }
}
