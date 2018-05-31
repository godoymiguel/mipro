<?php

namespace App\Http\Controllers;

use App\Models\Regression;
use App\Models\Project;
use App\Models\TimeSerie;
use Illuminate\Http\Request;

use Uuid;
use Auth;

use MathPHP\Statistics\Regression as Regressions;
use MathPHP\Functions\Map;

class RegressionController extends Controller
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
        $regression = Regression::where('project_id', $this->project->projectUser(Auth::user()->id))->get();

        return view('admin.em.regression.index', compact('regression'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timeSerie = TimeSerie::where('project_id', $this->project->projectUser(Auth::user()->id))->get();

        if ($timeSerie->count() < 1) {
            return redirect()->route('serietemporal.index');
        } else {
            Regression::where('project_id', $this->project->projectUser(Auth::user()->id))->delete();

            $pointsR1 = array();
            $pointsR2 = array();

            $x1 = array();
            $x2 = array();
            $y = array();

            foreach ($timeSerie as $key => $value) {
                $pointsR1 = array_add($pointsR1, $key, [$value->year,log($value->apparent_consumption)]);
                $pointsR2 = array_add($pointsR2, $key, [$value->year,log($value->production)]);

                $x1 = array_add($x1, $key, log($value->price));
                $x2 = array_add($x2, $key, log($value->real_income));
                $y = array_add($y, $key, log($value->apparent_consumption));
            }

            # First Regression
            $regression1 = new Regressions\Linear($pointsR1);
            $parametersR1 = $regression1->getParameters();          // [m => 1.2209302325581, b => 0.6046511627907]

            # Second Regression
            $regression2 = new Regressions\Linear($pointsR2);
            $parametersR2 = $regression2->getParameters();          // [m => 1.2209302325581, b => 0.6046511627907]

            # Third  Regression

            $count = count($timeSerie);
            $x1y    = array_sum(Map\Multi::multiply($x1, $y));
            $x2y    = array_sum(Map\Multi::multiply($x2, $y));
            $x1x2    = array_sum(Map\Multi::multiply($x1, $x2));
            $powX1    = array_sum(Map\Multi::multiply($x1, $x1));
            $powX2    = array_sum(Map\Multi::multiply($x2, $x2));
            $x1 = array_sum($x1);

            dd($count,$x1,$x2,$y,$x1y);

            Regression::create([
                'id' => Uuid::generate()->string,
                'model' => 'MEM',
                'project_id' => $this->project->projectUser(Auth::user()->id),
                'coefficient_r1' => $parametersR1['m'],
                'coefficient_r2' => $parametersR2['m'],
                'coefficient_r31' => 0.0,
                'coefficient_r32' => 0.0,
            ]);

            return redirect()->back();
            
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
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regression  $regression
     * @return \Illuminate\Http\Response
     */
    public function show(Regression $regression)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Regression  $regression
     * @return \Illuminate\Http\Response
     */
    public function edit(Regression $regression)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regression  $regression
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regression $regression)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regression  $regression
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regression $regression)
    {
        return redirect()->back();
    }
}
