<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use App\Models\Project;
use App\Models\Regression;
use Illuminate\Http\Request;

use Auth;
use Uuid;

class ProjectionController extends Controller
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
        $regression = Regression::where('project_id', $this->project->projectUser(Auth::user()->id))->first();

        if ($regression) {
            $projection = Projection::where('project_id', $this->project->projectUser(Auth::user()->id))->get();

            return view('admin.em.projection.index', compact('projection','regression'));
        } else {
            return redirect()->route('regresion.index');
        }
    }

    /**
     * graf the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function marketGap()
    {
        $projection = Projection::where('project_id', $this->project->projectUser(Auth::user()->id))->get();

        if ($projection) {
            $year = $projection[0]->year;
            $demand = array();
            $offer = array();
            $gap = array();
            foreach ($projection as $key => $value) {
                $demand = array_add($demand,$key,$value->demand);
                $offer = array_add($offer,$key,$value->offer);
                $gap = array_add($gap,$key,$value->gap);
            }

            return view('admin.em.marketGap.index', compact('year','demand','offer','gap'));
        } else {
            return redirect()->route('proyeccion.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regression = Regression::where('project_id', $this->project->projectUser(Auth::user()->id))->first();
        
        if ($regression) {
            $projection = new Projection();

            $method = 'create';

            return view('admin.em.projection.projection',compact('projection','method'));
        } else {
            return redirect()->route('regresion.index');
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
        Projection::where('project_id', $this->project->projectUser(Auth::user()->id))->delete();

        $this->validate($request,[
            'year' =>  'required|integer|min:1',
            'number' =>  'required|numeric',
            'demand' =>  'required|numeric',
            'offer' =>  'required|numeric',
        ]);

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'model' => 'MEM',
            'project_id' => $this->project->projectUser(Auth::user()->id),
            'gap' => $request->demand -$request->offer,
        ));
        
        $projection = Projection::create($request->all());

        $regression = Regression::where('project_id', $this->project->projectUser(Auth::user()->id))->first();

        for ($i=0; $i < $request->number; $i++) { 
            $newProjection = new Projection;
            $newProjection->id = Uuid::generate()->string;
            $newProjection->model = $projection->model;
            $newProjection->project_id = $projection->project_id;
            $newProjection->year = $projection->year + 1;
            $newProjection->demand = $projection->demand *(1 +$regression->coefficient_r1);
            $newProjection->offer = $projection->offer *(1 +$regression->coefficient_r2);
            $newProjection->gap = $newProjection->demand -$newProjection->offer;
            $newProjection->save();

            $projection = $newProjection;

        }

        

        return redirect()->route('proyeccion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projection  $projection
     * @return \Illuminate\Http\Response
     */
    public function show(Projection $projection)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projection  $projection
     * @return \Illuminate\Http\Response
     */
    public function edit(Projection $projection)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projection  $projection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projection $projection)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projection  $projection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projection $projection)
    {
        return redirect()->back();
    }    
}
