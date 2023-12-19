<?php

namespace App\Livewire;

use App\Events\StudentCreatedEvent;
use App\Listeners\StudentCreatedListener;
use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use Livewire\Component;

class CreateStudent extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $school_id = '';

    public $courseModel = [];
    public $courses = [];

    public function store(): void
    {
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'school_id' => 'required',
        ]);
        $student = Student::create($validated);
        $student->courses()->attach($this->courseModel);
        session()->flash('success', 'Étudiant ajouter');
        event(new StudentCreatedEvent($student));
        $this->redirect('/students');
    }
    public function updatedSchoolId(int $id): void
    {
        $this->courses = Course::with(['schools'])->whereHas('schools', function ($q) use ($id) {
            $q->where('school_id', $id);
        })->get();
    }
    public function render()
    {
        return view('livewire.create-student')->with([
            'schools' => School::all()
        ]);
    }
}
