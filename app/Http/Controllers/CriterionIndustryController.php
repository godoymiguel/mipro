<?php

namespace App\Http\Controllers;

use App\Models\CriterionIndustry;
use App\Models\Industry;
use App\Models\Project;

use Illuminate\Http\Request;

use Auth;

class CriterionIndustryController extends Controller
{
    protected $project;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->project = new Project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industry = Industry::where('project_id', $this->project->projectUser(Auth::user()->id))->OrderBy('id')->first();

        $criterion = CriterionIndustry::where('industry_id', $industry->id)->OrderBy('id')->get();

        $industry->suppliers = $criterion->where('criterion','SUPPLIERS')->sum('value');
        $industry->competitors = $criterion->where('criterion','COMPETITORS')->sum('value');
        $industry->consumers = $criterion->where('criterion','CONSUMERS')->sum('value');
        $industry->new = $criterion->where('criterion','NEW')->sum('value');
        $industry->substitutes = $criterion->where('criterion','SUBSTITUTES')->sum('value');
        $industry->save();

        return view('admin.em.industry.criterion.index', compact('industry','criterion')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CriterionIndustry  $criterionIndustry
     * @return \Illuminate\Http\Response
     */
    public function show(CriterionIndustry $criterionIndustry)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CriterionIndustry  $criterionIndustry
     * @return \Illuminate\Http\Response
     */
    public function edit(CriterionIndustry $criterionIndustry)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CriterionIndustry  $criterionIndustry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriterionIndustry $criterionIndustry)
    {
        $criterionIndustry->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CriterionIndustry  $criterionIndustry
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriterionIndustry $criterionIndustry)
    {
        return redirect()->back();
    }
}
