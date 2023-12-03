<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use Livewire\Component;

class CreateStudent extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $school_id = '';

    public $course = [];

    public function store(): void
    {
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'school_id' => 'required',
        ]);
        $student = Student::create($validated);
        $student->courses()->attach($this->course);
        session()->flash('success', 'Étudiant ajouter');
        $this->redirect('/students');
        // dd($validated);
    }
    public function render()
    {
        return view('livewire.create-student')->with([
            'courses' => Course::all(),
            'schools' => School::all()
        ]);
    }
}
