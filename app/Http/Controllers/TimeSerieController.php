<?php

namespace App\Http\Controllers;

use App\Models\TimeSerie;
use App\Models\Project;
use Illuminate\Http\Request;

use Uuid;
use Auth;
use Excel;
use Storage;

class TimeSerieController extends Controller
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
        $timeSerie = TimeSerie::where('project_id', $this->project->projectUser(Auth::user()->id))->OrderBy('year','ASC')->get();

        return view('admin.em.timeSerie.index', compact('timeSerie'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timeSerie =  new TimeSerie;
        $method = 'create';

        return view('admin.em.timeSerie.serie', compact('timeSerie','method'));
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
            'year'          =>  'required|integer|min:0',
            'production'    =>  'required|numeric',
            'import'        =>  'required|numeric',
            'existence'     =>  'required|numeric',
            'export'        =>  'required|numeric',
            'population'    =>  'required|numeric',
            'price'         =>  'required|numeric',
            'real_income'   =>  'required|numeric',
        ]);

        $apparent_consumption = $request->production +$request->import +$request->existence -$request->export;

        $precapita_consumption = $apparent_consumption /$request->population;

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'model' => 'MEM',
            'project_id' => $this->project->projectUser(Auth::user()->id),
            'apparent_consumption' => number_format($apparent_consumption,2),
            'precapita_consumption' => number_format($precapita_consumption,2),
        ));
        
        $timeSerie = TimeSerie::create($request->all());

        return redirect()->route('serietemporal.show',$timeSerie->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\timeSerie  $timeSerie
     * @return \Illuminate\Http\Response
     */
    public function show(timeSerie $timeSerie)
    {
        $method = 'show';

        return view('admin.em.timeSerie.serie', compact('timeSerie','method'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\timeSerie  $timeSerie
     * @return \Illuminate\Http\Response
     */
    public function edit(timeSerie $timeSerie)
    {
        $method = 'edit';

        return view('admin.em.timeSerie.serie', compact('timeSerie','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\timeSerie  $timeSerie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, timeSerie $timeSerie)
    {
        $this->validate($request,[
            'year'          =>  'required|integer|min:0',
            'production'    =>  'required|numeric',
            'import'        =>  'required|numeric',
            'existence'     =>  'required|numeric',
            'export'        =>  'required|numeric',
            'population'    =>  'required|numeric',
            'price'         =>  'required|numeric',
            'real_income'   =>  'required|numeric',
        ]);

        $apparent_consumption = $request->production +$request->import +$request->existence -$request->export;

        $precapita_consumption = $apparent_consumption /$request->population;

        $request->merge(array(
            'apparent_consumption' => number_format($apparent_consumption,2),
            'precapita_consumption' => number_format($precapita_consumption,2),
        ));
        
        $timeSerie->update($request->all());

        return redirect()->route('serietemporal.show',$timeSerie->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\timeSerie  $timeSerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(timeSerie $timeSerie)
    {
        $timeSerie->delete();

        return redirect()->back();
    }

    public function csv()
    {
        return view('admin.em.timeSerie.csv');   
    }

    public function import(Request $request)
    {
        $this->validate($request,[
            'file'  =>  'required|file',
        ]);

        TimeSerie::where('project_id', $this->project->projectUser(Auth::user()->id))->delete();

        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
 
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('local')->put($nombre,  \File::get($file));

        Excel::load('storage/app/'. $nombre, function($reader) {
 
            foreach ($reader->get() as $book) {
                TimeSerie::create([
                    'year' => $book->ano,
                    'production' => $book->produccion,
                    'import' => $book->importaciones,
                    'existence'=> $book->var_existencia,
                    'export' => $book->exportacion,
                    'population' => $book->poblacion,
                    'price'=> $book->precio_del_bien,
                    'real_income'=> $book->ingreso_real,
                    'id' => Uuid::generate()->string,
                    'model' => 'MEM',
                    'project_id' => $this->project->projectUser(Auth::user()->id),
                    'apparent_consumption' => $book->consumo_aparente,
                    'precapita_consumption' => $book->consumo_percapita,
                ]);
            }
        });

        Storage::delete($nombre);

        return redirect()->route('serietemporal.index');
    }
}
