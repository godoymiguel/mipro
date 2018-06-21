<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use Auth;
use App\Models\Project;
use App\Models\Arbol_Objetivo;
use App\Models\MediosFin;


class Arbol_ObjetivoController extends Controller
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
        $ao=Arbol_Objetivo::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();
        $mf=MediosFin::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();
       	return view('arbol_objetivo.arbolobjetivo_tabla', compact('ao', 'mf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        		
		$count=Arbol_Objetivo::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->count();
		if($count>=1)
		{
			return redirect()->back();
		}else
		{
			 return view('arbol_objetivo.anadir_objetivo');
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
        $ao=new Arbol_Objetivo($request->all());
        $ao->id=Uuid::generate()->string;
        $ao->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $ao->save();
        return redirect()->route('contenedor.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Arbol_Objetivo $ao)
    {
         return view('arbol_objetivo.editar_objetivo',compact('ao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arbol_Objetivo $ao)
    {
        $this->validate($request,[
            'objetivo' =>  'required|string|max:255',
        ]);
        $ao->update($request->all());
        return redirect()->route('arbolobj.tabla');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Arbol_Objetivo $ao)
    {
        $ao->delete();
        MediosFin::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->delete();
        return redirect()->route('contenedor.index');
    }
}
