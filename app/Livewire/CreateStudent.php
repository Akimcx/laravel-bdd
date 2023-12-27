<?php

namespace App\Livewire;

use App\Events\StudentCreatedEvent;
use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateStudent extends Component
{
    public Student $student;

    #[Validate('required')]
    public $first_name = '';
    #[Validate('required')]
    public $last_name = '';
    #[Validate('required|exists:schools,id')]
    public $school_id = '';

    public $courseModel = [];
    public $courses = [];

    public function store($redirect = false): void
    {
        $validated = $this->validate();
        $student = Student::create($validated);
        $student->courses()->attach($this->courseModel);
        session()->flash('success', 'Étudiant ajouter');
        event(new StudentCreatedEvent($student));
        if ($redirect) {
            $this->redirect('/students');
        }
    }
    public function updatedSchoolId(int|null $id): void
    {
        if ($id === null) {
            $this->reset('courses');
            return;
        }
        $this->courses = Course::with(['schools'])->whereHas('schools', function ($q) use ($id) {
            $q->where('school_id', $id);
        })->get();
    }

    public function mount(): void
    {
        if (request()->student) {
            $this->first_name = $this->student->first_name;
            $this->last_name = $this->student->last_name;
            $this->school_id = $this->student->school_id;
            $this->updatedSchoolId($this->school_id);
            foreach ($this->student->courses as $course) {
                array_push($this->courseModel, $course->id);
            }
        } else {
            $this->student = new Student();
        }
    }
    public function render()
    {
        return view('livewire.create-student')->with([
            'schools' => School::all()
        ]);
    }
}
