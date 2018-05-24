<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;

use Illuminate\Http\Request;

use Uuid;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->rol = new Rol();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $user->load('rol');
        
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'create';
        $rol = $this->rol->all();
        $user = new User();
        $user->load('rol');

        return view('admin.user.edit', compact('method','rol','user'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol_id = $this->rol->searchUuid($request->rol_id);

        $request->merge(array('rol_id' => $rol_id,'username' => strtoupper($request->username)));
            
        $this->validate($request,[
            'name'      => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users',
            'cedula'    => 'required|integer|min:0|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
            'type'      => 'required',
        ]);

        $user = new User($request->all());
        $user->id = Uuid::generate()->string;
        $user->save();

        return redirect()->route('usuario.show',$user->id);

        //return response()->json($rol,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $method = 'show';
        $user = User::findOrFail($id);
        $rol = $this->rol->all();
        return view('admin.user.edit', compact('method','user','rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = 'edit';
        $user = User::findOrFail($id);
        $user->rol;
        $rol = $this->rol->all();
        
        return view('admin.user.edit', compact('method','user','rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$this->validate($request,[
    		'name'      => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'username'  => 'required|string|max:255',
            'cedula'    => 'required|integer|min:0',
            'email'     => 'required|string|email|max:255',
            'type'      => 'required',
    	]);
        $user = User::find($id);
        $rol_id = $this->rol->searchUuid($request->rol_id);

        $request->merge(array('rol_id' => $rol_id,'username' => strtoupper($request->username)));
        //dd($request->all());
        $user->update($request->all());

        //$user->update($request->has('password') ? array_merge($request->except('password'), ['password' => bcrypt($request->input('password'))]) : $request->except('password'));
        
        return redirect()->route('usuario.show',$user->id);

        //return response()->json($rol,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //User$user->delete();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request, $id)
    {
    	$user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->back();
    }
}
