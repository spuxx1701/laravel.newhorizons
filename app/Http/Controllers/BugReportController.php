<?php

namespace App\Http\Controllers;

use App\Models\BugReport;
use Illuminate\Http\Request;

class BugReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bugReports = BugReport::latest()->paginate(5);
        return view("bug-reports.index", compact("bug-reports"))
            ->with("i", (request()->input("page", 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("bug-reports.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "description" => "required",
            "reproduction" => "required"
        ]);
        BugReport::create($request->all());
        return redirect()->route("bug-reports.index")
            ->with("success", "Bug report created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BugReport  $bugReport
     * @return \Illuminate\Http\Response
     */
    public function show(BugReport $bugReport)
    {
        return view("bug-reports.show", compact("bug-report"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BugReport  $bugReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BugReport $bugReport)
    {
        return view("bug-reports.edit", compact("bug-report"));
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
        return redirect()->route("bug-reports.index")
            ->with("success", "Bug report deleted successfully.");
    }
}
