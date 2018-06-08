<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\Project;
use App\Models\CriterionIndustry;
use App\Models\DefaultIndustry;

use Illuminate\Http\Request;

use Auth;
use Uuid;

class IndustryController extends Controller
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

        if ($industry) {
            $criterion = CriterionIndustry::where('industry_id', $industry->id)->OrderBy('id')->get();

            $attractive = ($industry->suppliers +$industry->competitors +$industry->consumers +$industry->new +$industry->substitutes)/5;

            return view('admin.em.industry.index', compact('industry','criterion','attractive'));
        } else {
            return redirect()->route('industry.create');
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $industry = Industry::where('project_id', $this->project->projectUser(Auth::user()->id))->OrderBy('id')->first();

        if ($industry) {
            return redirect()->back();

        } else {
            $industry =  new Industry;
            $method = 'create';

            return view('admin.em.industry.industry', compact('industry','method'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          =>  'required|string|max:255',
        ]);

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'project_id' => $this->project->projectUser(Auth::user()->id),
        ));
        
        $industry = Industry::create($request->all());

        $criterion = DefaultIndustry::all();

        foreach ($criterion as $key => $value) {
            CriterionIndustry::create([
                'id' => Uuid::generate()->string,
                'title' => $value->title,
                'criterion' => $value->criterion,
                'industry_id' => $industry->id,
            ]);
        }

        return redirect()->route('industry.show',$industry->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        $method = 'show';

        return view('admin.em.industry.industry', compact('industry','method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit(Industry $industry)
    {
        $method = 'edit';

        return view('admin.em.industry.industry', compact('industry','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Industry $industry)
    {
        $this->validate($request,[
            'name'          =>  'required|string|max:255',
        ]);
        
        $industry->update($request->all());

        return redirect()->route('industry.show',$industry->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        $industry->delete();

        return redirect()->back();
    }
}
