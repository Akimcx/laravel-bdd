<?php

namespace App\Livewire;

use App\Models\Session;
use App\Models\Student;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ShowSession extends Component
{
    public Session $session;

    public $presentBoxes = [];

    #[Rule('required')]
    public $first_name;

    #[Rule('required')]
    public $last_name;

    public function addStudent(): void
    {
        // dd($this->validateOnly('fnameProperty', 'lnameProperty'));
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
        // foreach ($this->boxes as $box) {
        $this->session->students()->detach($this->boxes);
        // }
    }

    #[On('student-created')]
    public function belongs2Sessions($id): void
    {
        $student = Student::find($id);
        dump($student);
        if ($student->school_id === $this->session->school->id && $student->courses->contains($this->session->course)); {
            $this->session->students()->attach($student);
        }
        session()->flash('success', 'L\'étudiant ' . $student->name . ' a ete ajouter a ce cours');
    }

    public function toggleStudentPresence($id): void
    {
        $student = $this->session->students->find($id);
        $this->session->students()->updateExistingPivot($id, [
            'is_present' => !$student->pivot->is_present
        ]);
    }

    public function mount(): void
    {
        // dump($this->session->students);
        foreach ($this->session->students as $student) {
            if ($student->pivot->is_present) {
                array_push($this->presentBoxes, $student->id);
            }
        }
    }

    public function render()
    {
        return view('livewire.show-session');
    }
}
