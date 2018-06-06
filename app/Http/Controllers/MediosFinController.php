<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use Auth;
use App\Models\Project;
use App\Models\Arbol_Objetivos;
use App\Models\MediosFin;


class MediosFinController extends Controller
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
        $ao=Arbol_Objetivos::all();
        $mf=MediosFin::all();
        return view('arbol_objetivo.arbolobjetivo_tabla', compact('ao','mf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arbol_objetivo.anadir_medio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mf=new MediosFin($request->all());
        $mf->id=Uuid::generate()->string;
        $mf->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $mf->save();
        return redirect()->route('arbolobj.tabla');
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
    public function edit(MediosFin $mf)
    {
        return view('arbol_objetivo.editar_medio',compact('mf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediosFin $mf)
    {
        $mf->update($request->all());
        return redirect()->route('arbolobj.tabla');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(MediosFin $mf)
    {
        $mf->delete();
        return redirect()->route('arbolobj.tabla');
    }
}
