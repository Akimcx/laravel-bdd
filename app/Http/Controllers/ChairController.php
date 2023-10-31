<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChairRequest;
use App\Models\Chair;
use App\Models\Fac;
use App\Models\Prof;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("chairs.index", [
            "chairs" => Chair::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("chairs.create", [
            "profs" => Prof::all(),
            "facs" => Fac::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChairRequest $request): RedirectResponse
    {
        $info = $request->validated();
        $chaire = Chair::create([
            "prof_id" => $info["prof_id"],
            "fac_id" => $info["fac_id"],
            "vacation" => $info["vacation"],
            "dates" => $info["dates"],
        ]);
        return redirect()->route("chairs.index")->with("success", "La chaire du {$chaire->date} a bien été ajouté");
    }

    /**
     * Display the specified resource.
     */
    public function show(Chair $chair)
    {
        // dd($chair);
        return view("chairs.show", ["chair" => $chair]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chair $chair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chair $chair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chair $chair)
    {
        //
    }
}
