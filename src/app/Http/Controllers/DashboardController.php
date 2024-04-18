<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{

    /**
     * Return dashboard
     */
    public function dashboard(): View
    {
        return view('/app');
    }
}
