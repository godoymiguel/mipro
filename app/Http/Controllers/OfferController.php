<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

use App\Models\Investigation;
use App\Models\Project;

use Auth;
use Uuid;

class OfferController extends Controller
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
        $investigation = Investigation::where('project_id', $this->project->projectUser(Auth::user()->id))->OrderBy('id')->first();

        if ($investigation->offer) {
            return view('admin.em.investigation.offer.index', compact('investigation'));
        } else {
            return redirect()->route('offer.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $investigation = Investigation::where('project_id', $this->project->projectUser(Auth::user()->id))->OrderBy('id')->first();

        if ($investigation) {
            if ($investigation->offer) {
                return redirect()->route('offer.edit',$investigation->offer->id);
            } else {
                $investigation->offer =  new offer;
                $method = 'create';

                return view('admin.em.investigation.offer.offer', compact('investigation','method'));
            }
        } else {
            return redirect()->route('investigation.create');            
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
        $this->validate($request,[
            'competitors' => 'required|min:0',
            'capacity' => 'required|min:0',
            'people_served' => 'required|min:0',
            'rate' => 'required|min:0'
        ]);

        $offer = $request->competitors *$request->people_served;

        $request->merge(array(
            'id' => Uuid::generate()->string,
            'offer'  =>  $offer,
        ));
        
        $offer = Offer::create($request->all());

        return redirect()->route('offer.show',$offer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        $method = 'show';

        $investigation = Investigation::where('project_id', $this->project->projectUser(Auth::user()->id))->OrderBy('id')->first();

        return view('admin.em.investigation.offer.offer', compact('offer','method','investigation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $method = 'edit';

        $investigation = Investigation::where('project_id', $this->project->projectUser(Auth::user()->id))->OrderBy('id')->first();

        return view('admin.em.investigation.offer.offer', compact('offer','method','investigation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $this->validate($request,[
            'competitors' => 'required|min:0',
            'capacity' => 'required|min:0',
            'people_served' => 'required|min:0',
            'rate' => 'required|min:0'
        ]);

        $offer = $request->total_population *($request->population/100) *($request->age/100) *($request->interested/100);

        $request->merge(array(
            'offer'  =>  $offer,
        ));
        
        $offer->update($request->all());

        return redirect()->route('offer.show',$offer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->back();
    }
}
