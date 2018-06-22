<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\Models\Project;
use App\Models\Distribucion;
use Auth;

class DistribucionController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    public function Bien()
    {
        $method = 'create';
		$count=Distribucion::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->count();
		if($count>=1)
		{
			
			return redirect()->back();
		}else
		{
			$dis = new Distribucion;
			return view('producto.anadir_distribucion_bien', compact('method','dis'));
		}
    }
    
    public function Servicio()
    {
        $method = 'create';
		$count=Distribucion::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->count();
		if($count>=1)
		{
			
			return redirect()->back();
		}else
		{
			$dis = new Distribucion;
			return view('producto.anadir_distribucion_servicio', compact('method','dis'));
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
        $dis=new Distribucion($request->all());
        $dis->id=Uuid::generate()->string;
        $dis->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $dis->save();
        return redirect()->route('contenedorprod.index');
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


     public function editar_bien(Distribucion $dis)
    {
        $method = 'edit';
        return view('producto.anadir_distribucion_bien', compact('method','dis'));
    }   
    
    public function editar_servicio(Distribucion $dis)
    {
        $method = 'edit';
        return view('producto.anadir_distribucion_servicio', compact('method','dis'));
    } 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribucion $dis)
    {
        $dis->update($request->all());
        return redirect()->route('contenedorprod.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Distribucion $dis)
    {
        $dis->delete();
        return redirect()->route('contenedorprod.index');
    }
    
    
}
