<?php

namespace App\Listeners;

use App\Events\StudentCreatedEvent;
use App\Models\Session;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StudentCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StudentCreatedEvent $event): void
    {
        $student = $event->student;
        $sessions = Session::wherehas('course', function ($q) use ($student) {
            $q->wherein('course_id', $student->courses->pluck('id'));
        })->wherehas('school', function ($q) use ($student) {
            $q->where('school_id', $student->school->id);
        })->get();
        foreach ($sessions as $session) {
            $session->students()->attach($student);
        }
        session()->flash('success', 'L\'étudiant ' . $student->name . ' a ete ajouter aux sessions precedente');
    }
}
