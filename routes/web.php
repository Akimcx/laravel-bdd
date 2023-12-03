<?php

use App\Livewire\CreateCourse;
use App\Livewire\EditCourse;
use App\Livewire\ShowCourses;
use App\Livewire\CreateInstructor;
use App\Livewire\CreateSchool;
use App\Livewire\CreateSession;
use App\Livewire\CreateStudent;
use App\Livewire\ShowCourse;
use App\Livewire\ShowInstructors;
use App\Livewire\ShowSchool;
use App\Livewire\ShowSchools;
use App\Livewire\ShowSession;
use App\Livewire\ShowSessions;
use App\Livewire\ShowStudent;
use App\Livewire\ShowStudents;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\School;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('welcome');

Route::prefix('sessions')->name('sessions.')->group(function () {
    Route::get('/', ShowSessions::class)
        ->name('home');
    Route::get('/create/{session?}', CreateSession::class)
        ->name('create');
    Route::get('/{session}', ShowSession::class)
        ->name('show');
});

Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', ShowCourses::class)
        ->name('home');
    Route::get('/create/{course?}', CreateCourse::class)
        ->name('create');
    Route::get('/{course}', ShowCourse::class)
        ->name('show');
});

Route::prefix('instructors')->name('instructors.')->group(function () {
    Route::get('/create', CreateInstructor::class)
        ->name('create');
    Route::get('/', ShowInstructors::class)
        ->name('home');
});

Route::prefix('schools')->name('schools.')->group(function () {
    Route::get('/create', CreateSchool::class)
        ->name('create');
    Route::get('/', ShowSchools::class)
        ->name('home');
    Route::get('/{school}', ShowSchool::class)
        ->name('show');
});

Route::prefix('students')->name('students.')->group(function () {
    Route::get('/', ShowStudents::class)
        ->name('home');
    Route::get('/create', CreateStudent::class)
        ->name('create');
    Route::get('/{student}', ShowStudent::class)
        ->name('show');
});

Route::view('dashboard', 'dashboard', [
    'course_count' => Course::count(),
    'instructor_count' => Instructor::count(),
    'school_count' => School::count(),
    'student_count' => Student::count(),
])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
