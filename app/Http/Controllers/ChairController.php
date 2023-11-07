<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChairRequest;
use App\Models\Chair;
use App\Models\Fac;
use App\Models\Prof;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ChairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $chairs = DB::table('chairs')
            ->join('profs', 'prof_id', '=', 'profs.id')
            ->join('facs', 'fac_id', '=', 'facs.id');
        // dd($chairs->get());
        foreach (request()->query() as $key => $value) {
            switch ($key) {
                case "order_asc":
                    $chairs = $chairs->orderBy($value);
                    break;
                case 'order_desc':
                    $chairs = $chairs->orderByDesc($value);
                    break;
                default:
                    break;
            }
        }
        return view("chairs.index", [
            "chairs" => $chairs->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        if (Gate::denies("create-chair")) {
            return to_route("login");
        }
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
    public function show(Chair $chair): View
    {

        $students = $chair->students();
        foreach (request()->query() as $key => $value) {
            switch ($key) {
                case "order_asc":
                    $students = $students->orderBy($value);
                    break;
                case 'order_desc':
                    $students = $students->orderByDesc($value);
                    break;
                    // case 'order_desc':
                    //     $students = $students->orderByDesc($value);
                    //     break;
                default:
                    break;
            }
        }
        // dump(Chair::paginate(10)->links());
        return view("chairs.show", [
            "chair" => $chair,
            "students" => $students->get(),
            "chairs" => Chair::paginate(1),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chair $chair): View
    {
        return view("chairs.edit", [
            "chair" => $chair
        ]);
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
