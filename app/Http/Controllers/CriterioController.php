<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Criterios;
use Uuid;
use App\Models\Project;
use Auth;

class CriterioController extends Controller
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
		$idea=Idea::all();
        $criterio=Criterios::all();
        return view('idea.idea_tabla', compact('idea', 'criterio'));
               
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return view('idea.anadir_criterio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		$criterio=new Criterios($request->all());
        $criterio->id=Uuid::generate()->string;
        $criterio->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $criterio->save();
        return redirect()->route('idea.tabla');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     
    public function editar(Criterios $criterio)
    {
        return view('idea.editar_valoracion',compact('criterio'));
    }

    public function edit(Criterios $criterio)
    {
        return view('idea.editar_criterio',compact('criterio'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criterios $criterio)
    {
        $this->validate($request,[
            'name' =>  'required|string|max:255',
        ]);
       

        $criterio->update($request->all());

        return redirect()->route('idea.tabla');
    }
    
   public function actualizar(Request $request, Criterios $criterio)
    {
        $this->validate($request,[
            'valor1' =>  'required|int',
            'valor2' =>  'required|int',
            'valor3' =>  'required|int',
        ]);

        $criterio->update($request->all());     
        $valor_idea1 = Criterios::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->get();
        $asignar_idea = Idea::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->get();
        $asignar_idea[0]->valor = $valor_idea1->sum('valor1');
        $asignar_idea[1]->valor = $valor_idea1->sum('valor2');
        $asignar_idea[2]->valor = $valor_idea1->sum('valor3');
        
        $asignar_idea[0]->save();
        $asignar_idea[1]->save();
        $asignar_idea[2]->save();
        
        
        

        return redirect()->route('idea.tabla');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Criterios $criterio)
    {
        $criterio->delete();
        return redirect()->route('idea.tabla');
    }
}
