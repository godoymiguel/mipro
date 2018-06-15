<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;

use App\Models\Investigation;
use App\Models\Project;

use Auth;
use Uuid;

class DemandController extends Controller
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

        if ($investigation->demand) {
            return view('admin.em.demand.index', compact('investigation'));
        } else {
            return redirect()->route('demand.create');
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

        if ($investigation->demand) {
            return redirect()->route('demand.edit',$investigation->demand->id);

        } else {
            $investigation->demand =  new Demand;
            $method = 'create';

            return view('admin.em.investigation.demand.demand', compact('investigation','method'));
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
            'total_population' => 'required|string|min:0',
            'total_detail' =>  'required|string',
            'population' => 'required|string|min:0',
            'population_detail' =>  'required|string',
            'age' => 'required|string|min:0',
            'age_detail' =>  'required|string',
            'interested' => 'required|string|min:0',
            'interested_detail' =>  'required|string',
            'buy' => 'required|string|min:0',
            'buy_detail' =>  'required|string',
            'entry' => 'required|string|min:0',
            'entry_detail' =>  'required|string',
            'cup' => 'required|string|min:0',
        ]);

        $potential_market = $request->total_population *($request->population/100) *($request->age/100) *($request->interested/100);
        $available_market =($request->buy/100) *$potential_market;
        $qualified_market =($request->entry/100) *$available_market;

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'potential_market'  =>  $potential_market,
            'available_market'  =>  $available_market,
            'qualified_market'  =>  $qualified_market,
        ));
        
        Demand::create($request->all());

        return redirect()->route('population.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function show(Demand $demand)
    {
        $method = 'show';

        return view('admin.em.investigation.demand.demand', compact('demand','method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function edit(Demand $demand)
    {
        $method = 'edit';

        return view('admin.em.investigation.demand.demand', compact('demand','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demand $demand)
    {
        $this->validate($request,[
            'total_population' => 'required|string|min:0',
            'total_detail' =>  'required|string',
            'population' => 'required|string|min:0',
            'population_detail' =>  'required|string',
            'age' => 'required|string|min:0',
            'age_detail' =>  'required|string',
            'interested' => 'required|string|min:0',
            'interested_detail' =>  'required|string',
            'buy' => 'required|string|min:0',
            'buy_detail' =>  'required|string',
            'entry' => 'required|string|min:0',
            'entry_detail' =>  'required|string',
            'cup' => 'required|string|min:0',
        ]);

        $potential_market = $request->total_population *($request->population/100) *($request->age/100) *($request->interested/100);
        $available_market =($request->buy/100) *$potential_market;
        $qualified_market =($request->entry/100) *$available_market;

        $request->merge(array(
            'potential_market'  =>  $potential_market,
            'available_market'  =>  $available_market,
            'qualified_market'  =>  $qualified_market,
        ));
        
        $demand->update($request->all());

        return redirect()->route('demand.show',$demand->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand)
    {
        $demand->delete();

        return redirect()->back();
    }
}
