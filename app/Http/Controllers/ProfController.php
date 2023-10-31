<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfRequest;
use App\Models\Prof;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Redirect;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("dashboard.profs.index", [
            "profs" => Prof::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("dashboard.profs.create", [
            "prof" => new Prof()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfRequest $request): RedirectResponse
    {
        $credential = $request->validated();
        $prof = Prof::create([
            "first_name" => $credential["first_name"],
            "last_name" => $credential["last_name"],
        ]);
        $name = $prof->first_name . " " . strtoupper($prof->last_name);
        return redirect()->route("dashboard.profs.index")->with("success", "Le professeur <span class='font-semibold'>{$name}</span> a bien été ajouté");
    }

    /**
     * Display the specified resource.
     */
    public function show(Prof $prof)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prof $prof): View
    {
        return view("dashboard.profs.edit", [
            "prof" => $prof
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProfRequest $request, Prof $prof)
    {
        // dd($request);
        $request->prof->fill($request->validated());
        if (!$request->prof->isDirty('first_name') && !$request->prof->isDirty('last_name')) {
            return Redirect::back()->with("error", "Aucune modification apporté");
        }

        $request->prof->save();
        return redirect()->route("dashboard.profs.index")
            ->with(
                "success",
                "La mofication de <span class='font-semibold'>{$prof->name}</span> vers <span class='font-semibold'>{$request->prof->name}</span> a été réalisé avec success"
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prof $prof)
    {
        $prof->delete();
        return redirect()->route("dashboard.profs.index")
            ->with("success", "Le professeur <span class='font-semibold'>{$prof->name}</span> a bien été supprimé");
    }
}
