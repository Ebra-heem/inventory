<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Wirehouse;
use Illuminate\Http\Request;

class WirehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wirehouses=Wirehouse::with('racks')->get();
        
        return view('backend.wirehouse.index',compact('wirehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wirehouse.create');
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
            'name'=>'required',
            'address'=>'required',
            'status'=>'required'
        ]);
        $wirehouse= new Wirehouse();
        $wirehouse->name=$request->input('name');
        $wirehouse->address=$request->input('address');
        $wirehouse->status=$request->input('status');
        $wirehouse->save();
        toastr()->success('Wirehouse Save Successfully', 'System Says');
        return redirect()->route('wirehouse.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wirehouse  $wirehouse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wirehouse=Wirehouse::find($id);
        $purchases=Purchase::with('products')->where('wirehouse_id',$id)->get();
        return view('backend.wirehouse.show',compact('purchases','wirehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wirehouse  $wirehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wirehouse=Wirehouse::find($id);
        return view('backend.wirehouse.edit',compact('wirehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wirehouse  $wirehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wirehouse $wirehouse)
    {
        $wirehouse=  Wirehouse::find($wirehouse->id);
        $wirehouse->name=$request->input('name');
        $wirehouse->address=$request->input('address');
        $wirehouse->status=$request->input('status');
        $wirehouse->save();
        toastr()->success('Wirehouse Updated Successfully', 'System Says');
        return redirect()->route('wirehouse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wirehouse  $wirehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wirehouse $wirehouse)
    {
        //
    }
}
