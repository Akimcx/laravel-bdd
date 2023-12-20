<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowCourses extends Component
{
    public $boxes = [];

    #[Url(as: 'ss')]
    public $schoolsProperty = [];
    #[Url(as: 'ps')]
    public $instructorsProperty = [];

    public function remove(): void
    {
        $courses = Course::destroy($this->boxes);
        session()->flash('success', $courses . ' supprimer avec success');
    }
    public function show(int $id): void
    {
        $this->redirectRoute('courses.show', $id, navigate: true);
    }
    public function rset(...$properties): void
    {
        $this->reset($properties);
    }
    public function render()
    {
        return view('livewire.course')->with([
            'courses' => Course::when($this->schoolsProperty, function ($q) {
                $q->schools($this->schoolsProperty);
            })->when($this->instructorsProperty, function ($q) {
                $q->instructors($this->instructorsProperty);
            })->get()
        ]);
    }
}
