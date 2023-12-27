<?php

namespace App\Livewire;

use App\Models\Instructor;
use App\Traits\FilterBar;
use Livewire\Component;

class ShowInstructors extends Component
{
    use FilterBar;
    public function show(int $id): void
    {
        $this->redirectRoute('instructors.show', $id);
    }
    public function render()
    {
        return view('livewire.show-instructors')->with([
            'instructors' => Instructor::with('courses', 'sessions', 'schools')
                ->when($this->schoolsProperty, fn ($q) => $q->inSchools($this->schoolsProperty))
                ->when($this->instructorsProperty, fn ($q) => $q->whereIn('id', $this->instructorsProperty))
                ->get(),
        ]);
    }
}
