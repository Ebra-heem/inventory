<?php

namespace App\Http\Controllers;

use App\Vendor;
use Carbon\Carbon;
use App\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes=Collection::all();
        $total=Collection::sum('amount');
        $today = Carbon::today();
        return view('backend.collection.index',compact('incomes','today','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors= Vendor::where('status',1)->get();
        $today = Carbon::today();
        return view('backend.collection.create',compact('today','vendors'));
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
            'collection_date'=>'required',
            'vendor_id'=>'required',
            'amount'=>'required'
        ]);
        $dateJunk = Carbon::createFromFormat('d/m/Y', $request->input('collection_date'));
        $income= new Collection();
        $income->collection_date= $dateJunk;
        $income->vendor_id= $request->input('vendor_id');
        $income->amount= $request->input('amount');
        $income->note= $request->input('note');
        $income->payment_type= $request->input('payment_type');
        $income->save();
        toastr()->success('Collection Save Successfully', 'System Says');
        return redirect()->route('collection.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
    public function filter(Request $request)
    {
        $date=$request->input('date');
        $dateJunk = Carbon::createFromFormat('d/m/Y',$date);
        $incomes=Collection::whereDate('collection_date',$dateJunk)->get();
        $total=Collection::whereDate('collection_date',$dateJunk)->sum('amount');
        $today = Carbon::today();
        return view('backend.collection.index',compact('incomes','today','total'));
    }
}
