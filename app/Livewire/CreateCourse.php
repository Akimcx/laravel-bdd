<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\School;
use Livewire\Component;

class CreateCourse extends Component
{
    public Course $course;
    public $title = '';
    public $description;
    public $instructor = [];
    public $school = [];
    function store(): void
    {
        $validated = $this->validate([
            'title' => 'required|min:4',
            'description' => 'nullable'
        ]);
        $course = Course::create($validated);
        $course->instructors()->attach($this->instructor);
        $course->schools()->attach($this->school);
        session()->flash('success', $course->title . ' ajouté');
        $this->redirect(ShowCourses::class);
    }

    function edit(): void
    {
        $validated = $this->validate([
            'title' => 'required|min:4',
            'description' => 'nullable'
        ]);
        if ($this->course->update($validated)) {
            session()->flash('success', $this->course->title . ' modifier avec success');
            $this->redirectRoute('courses.show', $this->course->id);
        } else {
            session()->flash('error', '');
        }
    }

    function mount()
    {
        $this->course = request()->course ?? new Course();
        $this->title = $this->course->title;
        $this->description = $this->course->description;
    }
    public function render()
    {
        return view('livewire.create-course')
            ->with([
                'instructors' => Instructor::all(),
                'schools' => School::all(),
            ]);
    }
}
