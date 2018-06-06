<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pastel;
use App\Models\Project;

use Auth;
use Uuid;

class PastelController extends Controller
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
        $pastel = Pastel::where('project_id', $this->project->projectUser(Auth::user()->id))->get();

        return view('admin.em.pastel.index', compact('pastel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pastel = new Pastel();

        $method = 'create';

        return view('admin.em.pastel.pastel',compact('pastel','method'));
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
            'title' =>  'required|string|max:255',
            'factor' =>  'required|string|max:255',
        ]);

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'project_id' => $this->project->projectUser(Auth::user()->id)
        ));
        
        $pastel = Pastel::create($request->all());

        return redirect()->route('pastel.show',$pastel->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function show(Pastel $pastel)
    {
        $method = 'show';

        return view('admin.em.pastel.pastel',compact('pastel','method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function edit(Pastel $pastel)
    {
        $method = 'edit';

        return view('admin.em.pastel.pastel',compact('pastel','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pastel $pastel)
    {
        $this->validate($request,[
            'title' =>  'required|string|max:255',
            'factor' =>  'required|string|max:255',
        ]);

        $pastel->update($request->all());

        return redirect()->route('pastel.show',$pastel->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pastel $pastel)
    {
        $pastel->delete();

        return redirect()->back();
    }
}
