<?php

namespace App\Livewire\Forms;

use App\Events\StudentCreatedEvent;
use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StudentForm extends Form
{
    // #[Validate('required')]
    // public $first_name = '';
    // #[Validate('required')]
    // public $last_name = '';
    // #[Validate('required|exists:schools,id')]
    // public $school_id = '';


    // public function store(): Student
    // {
    //     $this->validate();
    //     return Student::create($this->all());
    // }

    // public function setStudent(Student $student): void
    // {
    //     if (request()->student) {
    //         $this->first_name = $student->first_name;
    //         $this->last_name = $student->last_name;
    //         $this->school_id = $student->school_id;
    //         $this->updatedSchoolId($this->school_id);
    //         foreach ($student->courses as $course) {
    //             array_push($this->courseModel, $course->id);
    //         }
    //     } else {
    //         $this->student = new Student();
    //     }
    // }
}
