<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\School;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ShowSchool extends Component
{
    public School $school;
    public $atc = [];
    public $dtc = [];


    #[Rule('required', message: 'Auncun professeur.s choisis')]
    public $atci = [];

    public function attachInstructor(): void
    {
        $this->validateOnly('atci');
        $this->school->instructors()->attach($this->atci);
        session()->flash('success', 'professeur affecter avec succes');
        $this->reset('atci');
    }
    public function attachCourse(): void
    {
        $this->validate([
            'atc' => 'required'
        ]);
        $this->school->courses()->attach($this->atc);
        session()->flash('success', 'cours ajouter avec succes');
    }
    public function detachCourse(): void
    {
        $this->validate([
            'dtc' => 'required'
        ]);
        $this->school->courses()->detach($this->dtc);
        session()->flash('success', 'cours supprimer avec succes');
    }
    public function render()
    {
        return view('livewire.show-school')->with([
            'un_courses' => Course::whereDoesntHave('schools', function ($q) {
                $q->where('school_id', $this->school->id);
            })->get(),
            'instructors' => Instructor::whereNot(function ($query) {
                $query->whereHas('schools', function ($q) {
                    $q->where('school_id', $this->school->id);
                });
            })->get()
        ]);
    }
}
