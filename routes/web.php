<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\InternshipsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChairController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\StudentController;
use App\Models\Prof;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::resource("internships", InternshipsController::class);
Route::resource("interns", InternController::class);
Route::resource("chairs", ChairController::class);
Route::resource("students", StudentController::class)->except('store');
Route::post('/students/{chair}', [StudentController::class, 'store'])->name('students.store');

Route::prefix("dashboard")->controller(DashboardController::class)
    ->middleware(['auth'])
    ->name("dashboard.")->group(function () {
        Route::get('/', "index")->name("index");

        Route::resource("profs", ProfController::class);
        Route::resource("facs", FacController::class);
        Route::get("profs/{prof}/restore", [ProfileController::class, 'restore'])->name("prof.restore");
    });

Route::middleware('auth')->name('profile.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy');
});

require __DIR__ . '/auth.php';
