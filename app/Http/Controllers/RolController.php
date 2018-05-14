<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

use Uuid;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Rol::all();
        return view('admin.rol.index', compact('rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'create';
        $rol = new Rol();
        return view('admin.rol.create', compact('method','rol'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'value' =>  'required|string|max:255|unique:rols',
            'title' =>  'required|string|max:255'
        ]);
        $rol = new Rol($request->all());
        $rol->id = Uuid::generate()->string;
        $rol->save();

        return redirect()->route('rol.show',$rol->id);

        //return response()->json($rol,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        $method = 'show';
        return view('admin.rol.create', compact('method','rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        $method = 'edit';
        return view('admin.rol.create', compact('method','rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        $rol->update($request->all());
        return redirect()->route('rol.show',$rol->id);
        //return response()->json($rol,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();

        return response()->json(null,204);
    }
}
