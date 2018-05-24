<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Criterios;
use Uuid;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$idea=Idea::all();
        $criterio=Criterios::all();
        return view('idea.idea_tabla', compact('idea', 'criterio'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$count=Idea::where('proyecto_id',"789a6f50-5aa8-11e8-bc75-efb4a09d8425")->count();
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
        $idea->proyecto_id="789a6f50-5aa8-11e8-bc75-efb4a09d8425";
        $idea->save();
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

