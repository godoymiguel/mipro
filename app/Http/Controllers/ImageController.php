<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use App\Models\Publicidad;
use Uuid;
use App\Models\Project;
use Auth;

class ImageController extends Controller
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
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function resizeImage()
    {
    	return view('producto.imagen');
    }


    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function cargar_imagen(Request $request)
    {
	    $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $img = Image::make($image->getRealPath());
        $img->resize(200, 200, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);
		
		$informacion='images/'.$input['imagename'];
		$pub=Publicidad::where('proyecto_id',$this->project->projectUser(Auth::user()->id))->first();	
		$pub->logo=$informacion;
		$pub->save();

        return redirect()->route('contenedorprod.index')

        	->with('success','Imagen Subida Correctamente')
        	->with('imageName',$input['imagename']);

    }
}
