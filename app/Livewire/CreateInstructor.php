<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\School;
use Livewire\Component;

class CreateInstructor extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $email;

    public $course = [];

    function store(): void
    {
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'nullable|min:8',
            'email' => 'nullable|email',
        ]);

        $instructor = Instructor::create($validated);
        $instructor->courses()->attach($this->course);
        session()->flash('success', $instructor->last_name . ' ajouté');
        $this->redirect(ShowInstructors::class);
    }
    public function render()
    {
        return view('livewire.create-instructor')
            ->with([
                'courses' => Course::all(),
                'schools' => School::all(),
            ]);
    }
}
