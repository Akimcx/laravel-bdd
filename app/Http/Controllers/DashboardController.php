<?php

namespace App\Http\Controllers;

use App\Models\Fac;
use App\Models\Prof;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    function index(): View
    {
        return view("dashboard.index");
    }
}
