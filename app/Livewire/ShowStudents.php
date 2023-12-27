<?php

namespace App\Livewire;

use App\Models\Student;
use App\Traits\FilterBar;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStudents extends Component
{
    use WithPagination, FilterBar;
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
        // dd(Student::find(1)->courses);
        return view('livewire.show-students')->with([
            'students' => Student::with('school', 'courses')
                ->when($this->schoolsProperty, fn ($q) => $q->schools($this->schoolsProperty))
                // ->when($this->coursesProperty, fn ($q) => $q->Incourses($this->coursesProperty))
                ->paginate(10)->withQueryString(),
        ]);
    }
}
