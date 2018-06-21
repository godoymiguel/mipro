<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use Auth;
use App\Models\Idea;
use App\Models\Criterios;
use App\Models\Project;
use App\Models\DefaultIdea;


class IdeaController extends Controller
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
		$idea=Idea::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->orderBy('id','ASC')->get();
        $criterio=Criterios::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->orderBy('id','ASC')->get();
        
        //Seleccion de la valoracion de la Idea 
        $count=Idea::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->count();    
        $mayor=Idea::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->max('valor');
        $seleccion=Idea::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->where('valor',$mayor)->first(); 
        if ($seleccion == null){
			$seleccionado = null;
		}
		else{
        
			$seleccionado=$seleccion->name;
		}
        return view('idea.idea_tabla', compact('idea', 'criterio', 'count', 'seleccionado'));
        
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$count=Idea::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->count();
		if($count>=3)
		{			
			return redirect()->back();
		}else
		{
			return view('idea.idea');
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
        $idea=new Idea($request->all());
        $idea->id=Uuid::generate()->string;
        $idea->proyecto_id=$this->project->projectUser(Auth::user()->id);
        $idea->save();

        $criterio = Criterios::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->get();

        if ($criterio->count() <1) {
            $criterion = DefaultIdea::all();

            foreach ($criterion as $key => $value) {
                Criterios::create([
                    'id' => Uuid::generate()->string,
                    'name' => $value->title,
                    'proyecto_id' => $idea->proyecto_id,
                ]);
            }
        }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {

        return view('idea.editar_idea',compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idea $idea)
    {
        $this->validate($request,[
            'name' =>  'required|string|max:255',
        ]);

        $idea->update($request->all());

        return redirect()->route('idea.tabla');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Idea $idea)
    {
        $idea->delete();

        return redirect()->back();
    
    }
}

