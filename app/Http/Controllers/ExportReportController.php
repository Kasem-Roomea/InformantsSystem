<?php

namespace App\Http\Controllers;

use App\Models\Samples;
use Illuminate\Http\Request;

class ExportReportController extends Controller
{
    // Security Link With Permission
    function __construct()
    {
        $this->middleware('permission:تقاريرالعينات', ['only' => ['index']]);
        $this->middleware('permission:تقاريرالعينات', ['only' => ['ReportDate']]);
    }


    //Get Samples
    public function index()
    {
        $all_samples = Samples::all();
        return view('Pages.SamplesReport' , compact('all_samples'));
    }


    //Report Start and End Data Samples Format
    public function ReportDate(Request $request)
    {
        $start_at = date($request->start_at);
        $end_at = date($request->end_at);

        $details = Samples::whereBetween('dateReceipt',[$start_at,$end_at])->get();
        return view('Pages.SamplesReport',compact('start_at','end_at'))->withDetails($details);
    }


}
