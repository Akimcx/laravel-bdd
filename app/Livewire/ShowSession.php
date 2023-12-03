<?php

namespace App\Livewire;

use App\Models\School;
use App\Models\Session;
use App\Models\Student;
use Livewire\Component;

class ShowSession extends Component
{
    public Session $session;
    public function render()
    {
        // dd($this->session);
        $schoolId = $this->session->school_id;
        $courseId = $this->session->course_id;
        // Student::
        // $students = School::find($schoolId)->courses
        //     ->students()->whereHas('courses', function ($query) use ($courseId) {
        //         $query->where('course_id', $courseId);
        //     })->get();
        // dd(
        //     School::find($schoolId)
        //         ->courses()
        //         ->whereHas('courses', function ($query) use ($courseId) {
        //             $query->where('course_id', $courseId);
        //         })->get()
        // );
        return view('livewire.show-session');
    }
}
