<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

use Uuid;
use Auth;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol->value == 'TEACHER' || Auth::user()->rol->value == 'ADMIN') {
            $project = Project::orderBy('created_at','DESC')->get();
        } else {
            $project = Project::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->get();
        }

        return view('admin.project.index', compact('project'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'create';
        $project = new Project();
        return view('admin.project.create', compact('method','project')); 
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
            'name' =>  'required|string|max:255',
        ]);

        Project::where('user_id', Auth::user()->id)
                ->where('active',1)
                ->update(['active'=>0]);
        
        $request->merge(array('user_id' => Auth::user()->id));
        //dd($request->all());
        $project = new Project($request->all());
        $project->id = Uuid::generate()->string;
        $project->save();

        return redirect()->route('proyectos.show',$project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $method = 'show';
        return view('admin.project.create', compact('method','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $method = 'edit';

        return view('admin.project.create', compact('method','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request,[
            'name' =>  'required|string|max:255',
        ]);

        $project->update();

        return redirect()->route('proyectos.show',$project->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request, Project $project)
    {
        Project::where('user_id', Auth::user()->id)
                ->where('active',1)
                ->update(['active'=>0]);

        $project->update($request->all());

        return redirect()->back();
    }
}
