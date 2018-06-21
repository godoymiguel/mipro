<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\Models\Project;
use App\Models\Interesados;
use Auth;

class InteresadosController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interesados.anadir_interesados');
    }
    
    
    public function contacto_create(Interesados $inte)
    {
		$method = 'create';
		return view('interesados.anadir_contacto', compact('method', 'inte'));

	}
	
	public function contacto_edit(Interesados $inte)
    {
        $method = 'edit';
        return view('interesados.anadir_contacto', compact('method','inte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	
        $inte=new Interesados($request->all());
        $inte->id=Uuid::generate()->string;
        $inte->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $inte->save();
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
    public function edit(Interesados $inte)
    {
        return view('interesados.editar_interesados',compact('inte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interesados $inte)
    {
        $inte->update($request->all());
        return redirect()->route('contenedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Interesados $inte)
    {
        $inte->delete();
        return redirect()->route('contenedor.index');
    }
}
