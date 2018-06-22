<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\Models\Project;
use App\Models\Publicidad;
use Auth;
use Image;

class PublicidadController extends Controller
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
         return view('publicidad.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'create';
		$count=Publicidad::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->count();
		if($count>=1)
		{
			
			return redirect()->back();
		}else
		{
			$pub = new Publicidad;
			return view('producto.anadir_publicidad', compact('method','pub'));
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
        $pub=new Publicidad($request->all());
        $pub->id=Uuid::generate()->string;
        $pub->proyecto_id=$this->project->projectUser(Auth::user()->id);  
        $pub->save(); 
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
    public function edit(Publicidad $pub)
    {
        $method = 'edit';
        return view('producto.anadir_publicidad', compact('method','pub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicidad $pub)
    {
        $pub->update($request->all());
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
    
    public function image(Request $request)
{
   
   	    $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
 
        Publicidad::where('project_id', $this->project->projectUser(Auth::user()->id))->delete();

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        return back()

        	->with('success','Imagen Subida Correctamente')
        	->with('imageName',$input['imagename']); 
        	
        	
        //return redirect()->route('contenedorprod.index'); 
}
}
