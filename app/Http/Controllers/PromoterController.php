<?php

namespace App\Http\Controllers;

use App\Models\Promoter;
use App\Models\Project;
use Illuminate\Http\Request;

use Uuid;
use Auth;

class PromoterController extends Controller
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
        $promoter = Promoter::where('project_id', $this->project->projectUser(Auth::user()->id))->get();

        return view('admin.em.promoter.index', compact('promoter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promoter = new Promoter();

        $method = 'create';

        return view('admin.em.promoter.promoter',compact('promoter','method'));
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
            'type' =>  'required|string|max:255',
            'cedula' =>  'required|integer|min:0',
            'email' =>  'required|email|max:255',
        ]);

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'model' => 'MEM',
            'project_id' => $this->project->projectUser(Auth::user()->id)
        ));
        
        $promoter = Promoter::create($request->all());

        return redirect()->route('promotor.show',$promoter->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promoter  $promoter
     * @return \Illuminate\Http\Response
     */
    public function show(Promoter $promoter)
    {
        $method = 'show';

        return view('admin.em.promoter.promoter',compact('promoter','method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promoter  $promoter
     * @return \Illuminate\Http\Response
     */
    public function edit(Promoter $promoter)
    {
        $method = 'edit';

        return view('admin.em.promoter.promoter',compact('promoter','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promoter  $promoter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promoter $promoter)
    {
        $this->validate($request,[
            'name' =>  'required|string|max:255',
            'type' =>  'required|string|max:255',
            'cedula' =>  'required|integer|min:0',
            'email' =>  'required|email|max:255',
        ]);

        $promoter->update($request->all());

        return redirect()->route('promotor.show',$promoter->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promoter  $promoter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promoter $promoter)
    {
        $promoter->delete();

        return redirect()->back();
    }
}
