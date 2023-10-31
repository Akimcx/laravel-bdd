<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacRequest;
use App\Models\Fac;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FacController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("dashboard.facs.index", ["facs" => Fac::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("dashboard.facs.create", ["fac" => new Fac()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacRequest $request)
    {
        $info = $request->validated();
        $fac = Fac::create([
            "name" => $info["name"],
            "sigle" => $info["sigle"],
        ]);
        return redirect()->route("dashboard.facs.index")->with("success", "
            La faculté <span class='font-semibold'>{$fac->sigle}</span> a bien été ajouté
        ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Fac $fac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fac $fac): View
    {
        return view("dashboard.facs.edit", [
            "fac" => $fac
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFacRequest $request, Fac $fac)
    {
        $info = $request->validated();
        $fac->update([
            "name" => $info["name"],
            "sigle" => $info["sigle"],
        ]);
        return redirect()->route("dashboard.facs.index")->with("success", "La faculté <span class='font-semibold'>{$fac->sigle}</span> a bien été modifé");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fac $fac)
    {
        $fac->delete();
        return redirect()->route("dashboard.facs.index")->with("success", "La faculté <span class='font-semibold'>{$fac->sigle}</span> a bien été supprimé");
    }
}
