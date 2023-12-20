<?php

namespace App\Livewire;

use App\Models\School;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowSchools extends Component
{

    #[Url(as: 'ss')]
    public $schoolsProperty = [];
    #[Url(as: 'ps')]
    public $instructorsProperty = [];
    public function rset(...$properties): void
    {
        $this->reset($properties);
    }
    public function show(int $id): void
    {
        $this->redirectRoute('schools.show', $id, navigate: true);
    }
    public function render()
    {
        return view('livewire.show-schools')->with([
            'schools' => School::with('courses', 'instructors', 'students', 'sessions')
                ->when($this->schoolsProperty, fn ($q) => $q->whereIn('id', $this->schoolsProperty))
                ->when($this->instructorsProperty, fn ($q) => $q->withInstructors($this->instructorsProperty))
                ->get(),
        ]);
    }
}
