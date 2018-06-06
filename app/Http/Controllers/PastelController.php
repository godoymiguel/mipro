<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pastel;
use App\Models\Project;

use Auth;
use Uuid;

class PastelController extends Controller
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
        $pastel = Pastel::where('project_id', $this->project->projectUser(Auth::user()->id))->orderBy('id')->get();

        # Valor total Factor Politico
        $political = $pastel->where('factor','P');
        $total_p = ($political->where('value', 1 )->count() * 1 
            +$political->where('value', 2 )->count() * 2 
            +$political->where('value', 3 )->count() * 3 
            +$political->where('value', 4 )->count() * 4 
            +$political->where('value', 5 )->count() * 5)/$political->count();

        # Valor total Factor Ambiental
        $environmental = $pastel->where('factor','A');
        $total_a = ($environmental->where('value', 1 )->count() * 1 
            +$environmental->where('value', 2 )->count() * 2 
            +$environmental->where('value', 3 )->count() * 3 
            +$environmental->where('value', 4 )->count() * 4 
            +$environmental->where('value', 5 )->count() * 5)/$environmental->count();

         # Valor total Factor Sociocultural
        $Sociocultural = $pastel->where('factor','S');
        $total_s = ($Sociocultural->where('value', 1 )->count() * 1 
            +$Sociocultural->where('value', 2 )->count() * 2 
            +$Sociocultural->where('value', 3 )->count() * 3 
            +$Sociocultural->where('value', 4 )->count() * 4 
            +$Sociocultural->where('value', 5 )->count() * 5)/$Sociocultural->count();

         # Valor total Factor Tecnologico
        $technological = $pastel->where('factor','T');
        $total_t = ($technological->where('value', 1 )->count() * 1 
            +$technological->where('value', 2 )->count() * 2 
            +$technological->where('value', 3 )->count() * 3 
            +$technological->where('value', 4 )->count() * 4 
            +$technological->where('value', 5 )->count() * 5)/$technological->count();

         # Valor total Factor Economico
        $economic = $pastel->where('factor','E');
        $total_e = ($economic->where('value', 1 )->count() * 1 
            +$economic->where('value', 2 )->count() * 2 
            +$economic->where('value', 3 )->count() * 3 
            +$economic->where('value', 4 )->count() * 4 
            +$economic->where('value', 5 )->count() * 5)/$economic->count();

         # Valor total Factor Legal
        $Legal = $pastel->where('factor','L');
        $total_l = ($Legal->where('value', 1 )->count() * 1 
            +$Legal->where('value', 2 )->count() * 2 
            +$Legal->where('value', 3 )->count() * 3 
            +$Legal->where('value', 4 )->count() * 4 
            +$Legal->where('value', 5 )->count() * 5)/$Legal->count();

        # Indice de Riesgo 
        $risk = ($pastel->where('value', 1 )->count()*1 
            +$pastel->where('value', 2 )->count()*2 
            +$pastel->where('value', 3 )->count()*3
            +$pastel->where('value', 4 )->count()*4
            +$pastel->where('value', 5 )->count()*5)/
            ($pastel->where('value', 1 )->count() 
            +$pastel->where('value', 2 )->count() 
            +$pastel->where('value', 3 )->count()
            +$pastel->where('value', 4 )->count()
            +$pastel->where('value', 5 )->count());

        return view('admin.em.pastel.index', compact('pastel','total_p','total_a','total_s','total_t','total_e','total_l','risk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pastel = new Pastel();

        $method = 'create';

        return view('admin.em.pastel.pastel',compact('pastel','method'));
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
            'title' =>  'required|string|max:255',
            'factor' =>  'required|string|max:255',
        ]);

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'project_id' => $this->project->projectUser(Auth::user()->id)
        ));
        
        $pastel = Pastel::create($request->all());

        return redirect()->route('pastel.show',$pastel->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function show(Pastel $pastel)
    {
        $method = 'show';

        return view('admin.em.pastel.pastel',compact('pastel','method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function edit(Pastel $pastel)
    {
        $method = 'edit';

        return view('admin.em.pastel.pastel',compact('pastel','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pastel $pastel)
    {
        $this->validate($request,[
            'title' =>  'sometimes|required|string|max:255',
            'factor' =>  'sometimes|required|string|max:255',
            'value' =>  'sometimes|required|string|max:255',
            'justification' =>  'sometimes|required|string|max:255',
        ]);

        $pastel->update($request->all());

        return redirect()->route('pastel.show',$pastel->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pastel $pastel)
    {
        $pastel->delete();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function value(Pastel $pastel)
    {
        $method = 'value';

        return view('admin.em.pastel.pastel',compact('pastel','method'));
    }
}
