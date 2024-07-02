<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dailySale()
    {
        return view('manager.daily_sales');
    }

    public function weeklySale()
    {
        return view('manager.weekly_sales');
    }

    public function monthlySale()
    {
        return view('manager.monthly_sales');
    }
}
