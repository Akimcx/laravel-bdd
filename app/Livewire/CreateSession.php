<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Session;
use App\Models\Student;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

use function Livewire\Volt\updated;

class CreateSession extends Component
{
    #[Validate('required|exists:courses,id')]
    public $course_id;

    #[Validate('required|exists:schools,id')]
    public $school_id;

    #[Validate('required|exists:instructors,id')]
    public $instructor_id;

    #[Validate('nullable|date')]
    public $session_date;

    /**
     * @var \App\Models\School[]
     */
    public $schools = [];

    // /**
    //  * @var \App\Models\Student[]
    //  */
    public $students = [];
    public $instructors = [];



    function updatedCourseId($value): void
    {
        if ($value === null) {
            $this->reset('school_id', 'instructor_id', 'schools', 'instructors', 'students');
            return;
        }
        $this->reset('school_id', 'instructor_id', 'schools', 'instructors', 'students');
        $this->schools = Course::find($value)->schools;
        if (sizeof($this->schools) === 1) {
            $this->school_id = (int)$this->schools[0]->id;
            $this->updatedSchoolId();
        }
    }

    function updatedSchoolId(): void
    {
        if (is_null($this->school_id) || is_null($this->course_id)) return;
        $this->students = Student::schools($this->school_id)->Incourses($this->course_id)->get();
        $this->instructors = Instructor::inSchools($this->school_id)->inCourses($this->course_id)->get();
        if (sizeof($this->instructors) === 1) {
            $this->instructor_id = (int)$this->instructors[0]->id;
            // $this->updatedSchoolId();
        }
    }

    function store($redirect = false): void
    {
        $validated = $this->validate();
        if (!$this->session_date) {
            unset($validated['session_date']);
        }
        $students = Student::schools($this->school_id)->Incourses($this->course_id)->get();
        $session = Session::create($validated);
        $session->students()->attach($students);
        session()->flash('success', 'Sessions creer avec succes');
        if ($redirect) {
            $this->redirectRoute('sessions.home');
        }
        $this->reset('session_date', 'course_id', 'school_id', 'instructor_id', 'schools', 'instructors', 'students');
    }
    public function render()
    {
        return view('livewire.create-session')->with([
            'courses' => Course::all(),
        ]);
    }
}
