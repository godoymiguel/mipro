<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use Auth;
use App\Models\Project;
use App\Models\Arbol_Problema;
use App\Models\CausasEfectos;

class Arbol_ProblemaController extends Controller
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
        $ap=Arbol_Problema::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();
        $cf=CausasEfectos::all();
       	return view('arbol_problema.arbolproblema_tabla', compact('ap', 'cf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		$count=Arbol_Problema::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->count();
		if($count>=1)
		{
			return redirect()->back();
		}else
		{
			 return view('arbol_problema.anadir_problema');
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
        $ap=new Arbol_Problema($request->all());
        $ap->id=Uuid::generate()->string;
        $ap->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $ap->save();
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
     
     
    public function edit(Arbol_Problema $ap)
    {
	
        return view('arbol_problema.editar_problema',compact('ap'));
    }
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arbol_Problema $ap)
    {
		$this->validate($request,[
            'problema' =>  'required|string|max:255',
        ]);
        $ap->update($request->all());
        return redirect()->route('arbolprob.tabla');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Arbol_Problema $ap)
    {
        $ap->delete();
        return redirect()->route('contenedor.index');
    }
}
