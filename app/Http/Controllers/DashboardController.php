<?php

namespace App\Http\Controllers;

use App\Models\Fac;
use App\Models\Prof;
use Illuminate\Http\Request;
use Illuminate\View\View as ViewView;
use View;

class DashboardController extends Controller
{
    function index(): ViewView
    {
        return view("dashboard.index");
    }
}
