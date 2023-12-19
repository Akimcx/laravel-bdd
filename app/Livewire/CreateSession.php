<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\School;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class CreateSession extends Component
{
    public $course_id = '';
    public $school_id = '';
    public $instructor_id = '';

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



    function updatedCourseId(int $value): void
    {
        $this->schools = !is_null($value) ? Course::find($value)->schools : [];
        $this->instructors = !is_null($value) ? Instructor::whereHas('courses', function ($q) use ($value) {
            $q->where('course_id', $value);
        })->get() : [];
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
            'instructor_id' => 'required|integer',
            'session_date' => 'sometimes|nullable|date',
        ]);
        if (!$this->session_date) {
            unset($validated['session_date']);
            // dd($validated);
        }
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
