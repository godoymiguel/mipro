<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\Models\Project;
use App\Models\Antecedentes;
use Auth;

class AntecedentesController extends Controller
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
       	$ante=Antecedentes::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();
       	return view('antecedentes.tabla_antecedente', compact('ante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('antecedentes.anadir_antecedente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ante=new Antecedentes($request->all());
        $ante->id=Uuid::generate()->string;
        $ante->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $ante->save();
        return redirect()->route('a.tabla');
        
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
    public function edit(Antecedentes $ante)
    {
	
        return view('antecedentes.editar_antecedente',compact('ante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Antecedentes $ante)
    {
        $ante->update($request->all());
        return redirect()->route('a.tabla');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Antecedentes $ante)
    {
        $ante->delete();
        return redirect()->route('a.tabla');
    }
}
