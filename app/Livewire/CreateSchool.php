<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\School;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateSchool extends Component
{
    public $sigle;
    public $name;
    public $phone;
    public $email;
    public $url;
    public $address;
    public $course = [];
    public $instructor = [];


    public $rules = [
        'sigle' => 'required|min:2',
        'name' => 'required',
        'phone' => 'nullable|min:8',
        'email' => 'nullable|email',
    ];
    function store(): void
    {
        $validated = $this->validate([
            'sigle' => 'required|min:4',
            'name' => 'required',
            'url' => 'nullable|url',
            'address' => 'nullable|min:4',
            'phone' => 'nullable|min:8',
            'email' => 'nullable|email',
        ]);

        $school = School::create($validated);
        $school->courses()->attach($this->course);
        $school->instructors()->attach($this->instructor);
        session()->flash('success', $school->sigle . ' ajouter');
        $this->redirectRoute('schools.home', navigate: true);
    }
    public function updated($name, $value)
    {
        $this->validateOnly($name, [
            'sigle' => 'required|min:4',
            'name' => 'required',
            'phone' => 'required|min:8',
            'email' => 'required|email',
        ]);

        // dd($name, $value);
    }
    public function render()
    {
        return view('livewire.create-school')
            ->with([
                'courses' => Course::all(),
                'instructors' => Instructor::all(),
            ]);
    }
}
