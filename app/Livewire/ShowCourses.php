<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class ShowCourses extends Component
{
    public $boxes = [];

    public function remove(): void
    {
        // dd($this->boxes);
        $courses = Course::destroy($this->boxes);
        session()->flash('success', $courses . ' supprimer avec success');
    }
    function show(int $id): void
    {
        $this->redirectRoute('courses.show', $id, navigate: true);
    }
    public function render()
    {
        // Course::withTrashed()->restore();
        return view('livewire.course')
            ->with(['courses' => Course::all()]);
    }
}
