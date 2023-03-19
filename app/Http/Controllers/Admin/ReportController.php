<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function __construct()
    {
        // $this->middleware('permission:view-calender', ['only' => ['getCalendarReport']]);
    }

    public function getCalendarReport(Request $request)
    {
        return view('admin.report.calender');
    }
}
