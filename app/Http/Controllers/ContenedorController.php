<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use Auth;
use App\Models\Project;
use App\Models\Arbol_Problema;
use App\Models\CausasEfectos;
use App\Models\Arbol_Objetivo;
use App\Models\MediosFin;
use App\Models\Interesados;

class ContenedorController extends Controller
{
    /**
     * 
     * 	protected $project;
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
    
/* 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ap=Arbol_Problema::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();
        $cf=CausasEfectos::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();   
        $ao=Arbol_Objetivo::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();
        $mf=MediosFin::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();
        $inte=Interesados::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();
        return view('arbol_problema.contenedor', compact('ap', 'cf', 'ao', 'mf', 'inte'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
