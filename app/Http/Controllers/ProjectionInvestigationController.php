<?php

namespace App\Http\Controllers;

use App\Models\ProjectionInvestigation;
use Illuminate\Http\Request;

use App\Models\Investigation;
use App\Models\Project;

use Auth;
use Uuid;

class ProjectionInvestigationController extends Controller
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

        if ($investigation->projection) {
            $investigation->load('projection');
            return view('admin.em.investigation.projection.index', compact('investigation'));
        } else {
            return redirect()->route('projectionInvestigation.create')->withErrors('¡ERROR! Debe crear Investigación antes');
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

            if (!$investigation->demand) {
                return redirect()->route('demand.index')->withErrors('¡ERROR! Debe crear Demanda antes');
            } else if(!$investigation->offer) {
                return redirect()->route('offer.index')->withErrors('¡ERROR! Debe crear Oferta antes');
            }
            

            $investigation->projection =  new ProjectionInvestigation;
            $method = 'create';

            return view('admin.em.investigation.projection.projection', compact('investigation','method'));
        } else {
            return redirect()->route('investigation.create')->withErrors('¡ERROR! Debe crear Investigación antes');           
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
        ProjectionInvestigation::where('investigation_id', $request->investigation_id)->delete();

        $this->validate($request,[
            'year' =>  'required|integer|min:1',
            'number' =>  'required|numeric',
        ]);

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'gap' => $request->demand -$request->offer,
        ));
        
        $projection = ProjectionInvestigation::create($request->all());

        for ($i=0; $i < $request->number; $i++) { 
            $newProjection = new ProjectionInvestigation;
            $newProjection->id = Uuid::generate()->string;
            $newProjection->investigation_id = $projection->investigation_id;
            $newProjection->year = $projection->year + 1;
            $newProjection->demand = $projection->demand *pow((1+($request->cup/100)),($i+1));
            $newProjection->offer = $projection->offer *pow((1+($request->rate/100)),($i+1));
            $newProjection->gap = $newProjection->demand -$newProjection->offer;
            $newProjection->save();

            $projection = $newProjection;

        }        

        return redirect()->route('projectionInvestigation.index');
    }

    /**
     * graf the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function marketGap(Investigation $investigation)
    {
        $projection = ProjectionInvestigation::where('investigation_id', $investigation->id)->get();

        if ($projection->count() > 1) {
            $year = $projection[0]->year;

            return view('admin.em.marketGap.index', compact('year','projection'));
        } else {
            return redirect()->route('projectionInvestigation.index')->withErrors('¡ERROR! Debe calcular proyección antes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectionInvestigation  $projectionInvestigation
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectionInvestigation $projectionInvestigation)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectionInvestigation  $projectionInvestigation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectionInvestigation $projectionInvestigation)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectionInvestigation  $projectionInvestigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectionInvestigation $projectionInvestigation)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectionInvestigation  $projectionInvestigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectionInvestigation $projectionInvestigation)
    {
        return redirect()->back();
    }
}
