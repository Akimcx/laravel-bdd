<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Chair;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request, Chair $chair)
    {
        // dd($chair);
        $student = $request->validated();
        // dd($student, $chair->id);
        $name = $student['first_name'] . " " . strtoupper($student['last_name']);
        Student::create([
            "chair_id" => $chair->id,
            "first_name" => $student['first_name'],
            "last_name" => $student['last_name'],
            "presence" => $student['presence'],
        ]);
        return redirect()->route("chairs.show", ["chair" => $chair->id])->with(
            "success",
            "L'étudiant <span class='font-semibold'>{$name} a bien été ajouté!"
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
