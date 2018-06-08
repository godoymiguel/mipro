<?php

namespace App\Http\Controllers;
use Uuid;
use Auth;
use App\Models\Project;
use App\Models\Arbol_Problema;
use App\Models\CausasEfectos;


use Illuminate\Http\Request;

class CausasEfectosController extends Controller
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
        $ap=Arbol_Problema::all();
        $cf=CausasEfectos::all();
        return view('arbol_problema.arbolproblema_tabla', compact('ap','cf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arbol_problema.anadir_causa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cf=new CausasEfectos($request->all());
        $cf->id=Uuid::generate()->string;
        $cf->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $cf->save();
        return redirect()->route('arbolprob.tabla');
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
    public function edit(CausasEfectos $cf)
    {
         return view('arbol_problema.editar_causa',compact('cf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CausasEfectos $cf)
    {
        $cf->update($request->all());
        return redirect()->route('arbolprob.tabla');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(CausasEfectos $cf)
    {
        $cf->delete();
        return redirect()->route('arbolprob.tabla');
    }
}
