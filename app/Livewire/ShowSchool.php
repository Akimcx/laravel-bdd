<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\School;
use Livewire\Component;

class ShowSchool extends Component
{
    public School $school;
    public $atc = '';
    public $dtc = '';

    public function attachCourse(): void
    {
        $this->validate([
            'atc' => 'required|integer'
        ]);
        $this->school->courses()->attach($this->atc);
        session()->flash('success', 'cours ajouter avec succes');
    }
    public function detachCourse(): void
    {
        $this->validate([
            'dtc' => 'required|integer'
        ]);
        $this->school->courses()->detach($this->dtc);
        session()->flash('success', 'cours supprimer avec succes');
    }
    public function render()
    {
        // $this->school->courses()->detach();
        // dd(Course::whereDoesntHave('schools')->get());
        return view('livewire.show-school')->with([
            'un_courses' => Course::whereDoesntHave('schools', function ($q) {
                $q->where('school_id', $this->school->id);
            })->get(),
        ]);
    }
}
