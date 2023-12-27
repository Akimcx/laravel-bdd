<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Note;
use App\Models\Session;
use App\Models\Student;
use Livewire\Component;

class ShowStudent extends Component
{
    public $student;

    public function mount(): void
    {
        if ($this->student === null) {
            $this->student = new Student();
        } else {
            $this->student = Student::find($this->student);
        }
    }
    public function render()
    {
        $ss = Student::find(1);
        $cc = Course::find(3);
        // $note = Note::create([
        //     'intra_note' => 85.5,
        //     'final_exam_note' => 92.0,
        //     'presence_note' => 98.5,
        //     'course_id' => 3,
        //     'student_id' => 1,
        // ]);

        // $this->student->notes()->attach($note);
        // dd($cc->notes[0]);
        return view('livewire.show-student')->with([
            'sessions' => Session::courses($this->student->courses->pluck('id'))->schools($this->student->school->id)->get()
        ]);
    }
}
