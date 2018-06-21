<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\Models\Project;
use App\Models\Foda;
use Auth;

class FodaController extends Controller
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
        $foda=Foda::where('proyecto_id', $this->project->projectUser(Auth::user()->id))->get();
       	return view('foda.foda_tabla', compact('foda'));
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
    
    public function fortaleza(Foda $foda)
    {
		$method = 'create';
        return view('foda.anadir_fortaleza', compact('method', 'foda'));
    }
    
    public function oportunidad(Foda $foda)
    {
		$method = 'create';
        return view('foda.anadir_oportunidad', compact('method', 'foda'));
    }
    
    public function amenaza(Foda $foda)
    {
		$method = 'create';
        return view('foda.anadir_amenaza', compact('method', 'foda'));
    }
    
    public function debilidad(Foda $foda)
    {
		$method = 'create';
        return view('foda.anadir_debilidad', compact('method', 'foda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foda=new Foda($request->all());
        $foda->id=Uuid::generate()->string;
        $foda->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $foda->save();
        return redirect()->route('foda.tabla');
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
    public function edit($id)
    {
        //
    }
 
     public function editar_fortaleza(Foda $foda)
    {
        $method = 'edit';
        return view('foda.anadir_fortaleza', compact('method','foda'));
    }   
    
    public function editar_oportunidad(Foda $foda)
    {
        $method = 'edit';
        return view('foda.anadir_oportunidad', compact('method','foda'));
    } 
    
    public function editar_debilidad(Foda $foda)
    {
        $method = 'edit';
        return view('foda.anadir_debilidad', compact('method','foda'));
    } 
    
    public function editar_amenaza(Foda $foda)
    {
        $method = 'edit';
        return view('foda.anadir_amenaza', compact('method','foda'));
    } 


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foda $foda)
    {
        $foda->update($request->all());
        return redirect()->route('foda.tabla'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Foda $foda)
    {
        $foda->delete();
        return redirect()->route('foda.tabla');
    }
}
