<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\School;
use App\Models\Student;
use Livewire\Component;

class ShowCourse extends Component
{
    public Course $course;
    public $studentProperty = [];
    public $schoolProperty = [];
    public $instructorProperty = [];

    public function edit(): void
    {
        $this->redirectRoute('courses.create', $this->course->id, navigate: true);
    }

    public function atcInstructor(): void
    {
        $this->course->instructors()->attach($this->instructorProperty);
        $this->reset(['instructorProperty']);
    }

    public function atcSchool(): void
    {
        $this->course->schools()->attach($this->schoolProperty);
        $this->reset(['schoolProperty']);
    }
    public function atcStudent(): void
    {
        $this->course->students()->attach($this->studentProperty);
        $this->reset(['studentProperty']);
    }
    public function detach(): void
    {
        $this->course->students()->detach($this->studentProperty);
    }

    public function render()
    {
        return view('livewire.show-course')->with([
            'students' => $this->course->students()->paginate(5)->withQueryString(),
            'schools' => School::wtoCourse($this->course->id)->get(),
            'instructors' => Instructor::inSchools($this->course->schools->pluck('id'))
                ->whereNot(function ($query) {
                    $query->inCourses($this->course->id);
                })->get(),
            'as' => Student::inSchools($this->course->schools->pluck('id'))
                ->whereNot(function ($query) {
                    $query->inCourses($this->course->id);
                })->get()
        ]);
    }
}
