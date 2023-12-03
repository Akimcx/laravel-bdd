<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Student;
use Livewire\Component;

class ShowCourse extends Component
{
    public Course $course;
    public $student = [];

    public function edit(): void
    {
        $this->redirectRoute('courses.create', $this->course->id, navigate: true);
    }
    public function attach(): void
    {
        $this->course->students()->attach($this->student);
        $this->reset(['student']);
    }
    public function detach(): void
    {
        $this->course->students()->detach($this->student);
    }

    public function render()
    {

        return view('livewire.show-course')->with([
            'students' => $this->course->students()->get(),
            'as' => Student::whereDoesntHave('courses', function ($q) {
                $q->where('course_id', $this->course->id);
            })->whereHas('school', function ($q) {
                $q->whereIn('school_id', $this->course->schools->pluck('id'));
            })->get()
        ]);
    }
}
