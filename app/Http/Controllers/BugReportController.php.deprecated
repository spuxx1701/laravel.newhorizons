<?php

namespace App\Http\Controllers;

use DB;
use App\Models\BugReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class BugReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bugReports = BugReport::all();
        return response()->jsonApi(["data" => $bugReports], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BugReport  $bugReport
     * @return \Illuminate\Http\Response
     */
    public function show(BugReport $id)
    {
        return response()->jsonApi(["data" => $id], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            "description" => "required",
            "reproduction" => "required"
        ]);
        BugReport::create($request->all());
        return redirect()->route("bug-report.index")
            ->with("success", "Bug report created successfully.");*/
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BugReport  $bugReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BugReport $bugReport)
    {
        //return view("bug-report.edit", compact("bug-report"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BugReport  $bugReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BugReport $bugReport)
    {
        $request->validate([
            "description" => "required",
            "reproduction" => "required"
        ]);
        $bugReport->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BugReport  $bugReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(BugReport $bugReport)
    {
        $bugReport->delete();
        return redirect()->route("bug-report.index")
            ->with("success", "Bug report deleted successfully.");
    }
}
