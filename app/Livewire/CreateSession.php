<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\School;
use App\Models\Session;
use App\Models\Student;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class CreateSession extends Component
{
    public $course_id = null;
    public $school_id = null;

    public $session_date = null;

    /**
     * @var \App\Models\School[]
     */
    public $schools = [];

    // /**
    //  * @var \App\Models\Student[]
    //  */
    public $students = [];



    function updatedCourseId(int|null $value): void
    {
        $this->schools = !is_null($value) ? Course::find($value)->schools : [];
        if (is_null($this->school_id) || is_null($this->course_id)) return;
        $this->students = Student::inSchoolForCourse($this->school_id, $this->course_id)->get();
    }

    function updatedSchoolId(): void
    {
        if (is_null($this->school_id) || is_null($this->course_id)) return;
        $this->students = Student::inSchoolForCourse($this->school_id, $this->course_id)->get();
    }

    function store(): void
    {
        $validated = $this->validate([
            'course_id' => 'required|integer',
            'school_id' => 'required|integer',
            'session_date' => 'required|date',
        ]);
        $students = Student::inSchoolForCourse($this->school_id, $this->course_id)->get();
        $session = Session::create($validated);
        $session->students()->attach($students);
        session()->flash('success', 'Sessions creer avec succes');
        $this->redirectRoute('sessions.home');
    }
    public function render()
    {

        return view('livewire.create-session')->with([
            'courses' => Course::all(),
        ]);
    }
}
