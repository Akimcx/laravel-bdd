<?php

namespace App\Livewire;

use App\Models\Session;
use App\Models\Student;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ShowSession extends Component
{
    public Session $session;
    public Student $modalStudent;
    public $presentBoxes = [];
    #[Url(as: 'present')]
    public $presentProperty;

    #[Validate('required')]
    public $first_name;

    #[Validate('required')]
    public $last_name;

    public $boxes = [];

    #[On('open-modal')]
    public function showStudent($id): void
    {
        $this->modalStudent = Student::find($id);
        // $this->redirectRoute('students.show', $id);
    }

    public function addStudent(): void
    {
        $this->validateOnly('first_name');
        $this->validateOnly('last_name');
        $student = Student::create([
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "school_id" => $this->session->school->id
        ]);
        $student->courses()->attach($this->session->course->id);
        foreach ($this->session->course->sessions as $session) {
            $session->students()->attach($student->id);
        }
        $this->reset('first_name', 'last_name');
    }

    public function delete(): void
    {
        if ($this->boxes) {
            $this->session->students()->detach($this->boxes);
        }
    }

    public function toggleStudentPresence($id): void
    {
        $student = $this->session->students->find($id);
        $this->session->students()->updateExistingPivot($id, [
            'is_present' => !$student->pivot->is_present
        ]);
    }

    public function rset(...$properties): void
    {
        $this->reset($properties);
    }

    public function mount(): void
    {
        foreach ($this->session->students as $student) {
            if ($student->pivot->is_present) {
                array_push($this->presentBoxes, $student->id);
            }
        }
    }

    public function render()
    {
        return view('livewire.show-session')->with([
            'students' => $this->session->students()
                ->when($this->presentProperty !== null, function ($q) {
                    $q->where('pivot_is_present', $this->presentProperty);
                })->get()
        ]);
    }
}
