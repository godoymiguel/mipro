<?php

namespace App\Http\Controllers;

use App\Models\Investigation;
use App\Models\Project;
use App\Models\Population;

use Illuminate\Http\Request;

use Auth;
use Uuid;

use MathPHP\Probability\Distribution\Continuous;

class PopulationController extends Controller
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
        return redirect()->route('investigation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $investigation = Investigation::where('project_id', $this->project->projectUser(Auth::user()->id))->first();
        $population = Population::where('investigation_id', $investigation->id)->get();

        if ($population->count() >= 2) {
            return redirect()->route('population.index');

        } else {
            $population =  new Population;
            $method = 'create';

            return view('admin.em.population.population', compact('investigation','population','method'));
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
            'size' =>  'required|string',
            'list' =>  'required',
            'sample_point' =>  'required|integer',
            'units' =>  'required|string',
            'type_sampling' =>  'required|string',
            'know_population' =>  'required',
            'proportion' =>  'required|integer',
            'level' =>  'required|integer',
            'error' =>  'required|integer',
        ]);

        $standardNormal = new Continuous\StandardNormal($request->level);

        dd($standardNormal);

        if ($request->know_population == 1) {
            $M1 = ($request->size)*($request->proportion)*(1-$request->proportion)*(pow($standardNormal,2));
            $M2 = ($request->size-1)*(pow($request->error,2))+(pow($standardNormal,2))*$request->proportion*(1-$request->proportion);

            if ($M2 == 0) {
                $M2 = 1;
            }
            $sample_size = $M1/$M2;

        } else {
            $sample_size = ($request->proportion*(1-$request->proportion)*(pow($standardNormal,2))/(pow($request->error,2));
        }        

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'sample_size' => $sample_size,
        ));
        
        $population = Population::create($request->all());

        return redirect()->route('population.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function show(Population $population)
    {
        $method = 'show';

        return view('admin.em.population.population', compact('population','method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function edit(Population $population)
    {
        $method = 'edit';

        return view('admin.em.population.population', compact('population','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Population $population)
    {
        $this->validate($request,[
            'title' =>  'required|string',
        ]);
        
        $population->update($request->all());

        return redirect()->route('population.show',$population->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function destroy(Population $population)
    {
        $population->delete();

        return redirect()->back();
    }
}
