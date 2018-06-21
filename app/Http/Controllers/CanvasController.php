<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canvas;
use Uuid;
use App\Models\Project;
use Auth;


class CanvasController extends Controller
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
    public function index(Canvas $canvas){
		$canvas=Canvas::where('project_id', $this->project->projectUser(Auth::user()->id))->get();
        return view('canvas.canvas', compact('canvas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Canvas $canvas)
    {
		$canvas=Canvas::where('project_id',$this->project->projectUser(Auth::user()->id))->first();
		
		if($canvas != null )
		{
			/***$errors = "Canvas Editado!!";
			return redirect()->route('canvas.edit', $canvas->id)->withErrors($errors);*/
			
			
			/**Mensaje*/
			 \Session::flash('flash_message','¡Canvas Guardado!.');	
			return redirect()->route('canvas.edit', $canvas->id);
			
			
		}else
		{
			         $method = 'create';
			         $canvas = new Canvas();
					 return view('canvas.canvas', compact('method', 'canvas'));
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
        $canvas=new Canvas($request->all());
        $canvas->id=Uuid::generate()->string;
        $canvas->project_id=$this->project->projectUser(Auth::user()->id);
        $canvas->save();
        return redirect()->route('canvas.create');
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
    public function edit(Canvas $canvas)
    {
        $method = 'edit';
        return view('canvas.canvas', compact('method','canvas'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Canvas $canvas)
    {
        $canvas->update($request->all());
        return redirect()->route('canvas.create');
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
