<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\Models\Project;
use App\Models\Precio;
use Auth;

class PrecioController extends Controller
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
        $method = 'create';
		$count=Precio::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->count();
		if($count>=1)
		{
			
			return redirect()->back();
		}else
		{
			$prec = new Precio;
			return view('producto.anadir_precio', compact('method','prec'));
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
		
        $prec=new Precio($request->all());
        $prec->id=Uuid::generate()->string;
        $prec->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $prec->save();
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
    public function edit(Precio $prec)
    {
		
        $method = 'edit';
        return view('producto.anadir_precio', compact('method','prec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Precio $prec)
    {
        $prec->update($request->all());
        return redirect()->route('contenedorprod.index');
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
