<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class ShowStudents extends Component
{
    public $boxes = [];
    public function show(int $id): void
    {
        $this->redirectRoute('students.show', $id, navigate: true);
    }

    public function delete(): void
    {
        foreach ($this->boxes as $box) {
            $student = Student::find($box);
            $student->delete();
        }
    }
    public function render()
    {
        return view('livewire.show-students')->with([
            'students' => Student::paginate(10)->withQueryString(),
        ]);
    }
}
