<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use App\Models\Project;
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
        $project = Project::where('project_id', $this->project->projectUser(Auth::user()->id))->get();

        return view('admin.em.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projection = new Projection();

        $method = 'create';

        return view('admin.em.projection.projection',compact('projection','method'));
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
            'year' =>  'required|integer|min:1',
            'number' =>  'required|numeric',
            'demand' =>  'required|numeric',
            'offer' =>  'required|numeric',
        ]);

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'model' => 'MEM',
            'project_id' => $this->project->projectUser(Auth::user()->id)
            'gap' => $request->demand -$request->offer;
        ));
        
        $projection = Projection::create($request->all());

        for ($i=0; $i < $request->number; $i++) { 
            $newProjection = new Projection;
            $newProjection->year = $projection->year + 1;
        }

        

        return redirect()->route('promotor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projection  $projection
     * @return \Illuminate\Http\Response
     */
    public function show(Projection $projection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projection  $projection
     * @return \Illuminate\Http\Response
     */
    public function edit(Projection $projection)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projection  $projection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projection $projection)
    {
        //
    }
}
