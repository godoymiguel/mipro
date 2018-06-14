<?php

namespace App\Http\Controllers;

use App\Models\Investigation;
use App\Models\Project;
use App\Models\Population;

use Illuminate\Http\Request;

use Auth;
use Uuid;

class InvestigationController extends Controller
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
        $investigation = Investigation::where('project_id', $this->project->projectUser(Auth::user()->id))->OrderBy('id')->first();

        if ($investigation) {

            $population = Population::where('investigation_id', $investigation->id)->OrderBy('id')->get();

            //dd($investigation->populations,$population);
           
            return view('admin.em.investigation.index', compact('investigation'));
        } else {
            return redirect()->route('investigation.create');
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $investigation = Investigation::where('project_id', $this->project->projectUser(Auth::user()->id))->OrderBy('id')->first();

        if ($investigation) {
            return redirect()->route('investigation.edit',$investigation->id);

        } else {
            $investigation =  new Investigation;
            $method = 'create';

            return view('admin.em.investigation.investigation', compact('investigation','method'));
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
            'title' =>  'required|string',
        ]);

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'project_id' => $this->project->projectUser(Auth::user()->id),
        ));
        
        $investigation = Investigation::create($request->all());

        return redirect()->route('population.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function show(Investigation $investigation)
    {
        $method = 'show';

        return view('admin.em.investigation.investigation', compact('investigation','method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Investigation $investigation)
    {
        $method = 'edit';

        return view('admin.em.investigation.investigation', compact('investigation','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investigation $investigation)
    {
        $this->validate($request,[
            'title' =>  'required|string',
        ]);
        
        $investigation->update($request->all());

        return redirect()->route('investigation.show',$investigation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investigation $investigation)
    {
        $investigation->delete();

        return redirect()->back();
    }
}
