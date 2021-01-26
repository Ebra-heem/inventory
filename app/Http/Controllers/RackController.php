<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Product;
use App\Purchase;
use App\Wirehouse;
use Carbon\Carbon;
use App\Collection;
use Illuminate\Http\Request;

class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $racks=Rack::all();
        return view('backend.rack.index',compact('racks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wirehouses= Wirehouse::all();
        return view('backend.rack.create',compact('wirehouses'));
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
            'rack_no'=>'required',
            'wirehouse_id'=>'required'
        ]);
        $rack= new Rack();
        $rack->rack_no=$request->input('rack_no');
        $rack->wirehouse_id=$request->input('wirehouse_id');
        $rack->save();
        toastr()->success('Rack Save Successfully', 'System Says');
        return redirect()->route('rack.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rack=rack::find($id);
        $purchases=Purchase::with('products')->where('rack_id',$id)->get();
       // return $purchases;
        return view('backend.rack.show',compact('purchases','rack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rack=rack::find($id);
        return view('backend.rack.edit',compact('rack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rack $rack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rack $rack)
    {
        //
    }
}
