<?php

namespace App\Http\Controllers;

use App\ChartAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ChartAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bs_items=ChartAccount::where('parent_id',0)->where('account','BS')->get();
        //return $bs_items;
        $is_items=ChartAccount::where('parent_id',0)->where('account','IS')->get();
        return view('backend.chart_account.index',compact('bs_items','is_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bs_items=ChartAccount::where('parent_id',0)->where('account','BS')->get();
        //return $bs_items;
        $is_items=ChartAccount::where('parent_id',0)->where('account','IS')->get();
        return view('backend.chart_account.show',compact('bs_items','is_items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        ChartAccount::create(request()->all());
        toastr()->success('Master Account Created Successfully', 'System Says');
        return back();
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function show(ChartAccount $chartAccount)
    {
        $Drtotal=DB::table('ledgers')->where('account_type','Dr')->where('chart_account_id',$chartAccount->id)->sum('amount');
        $Crtotal=DB::table('ledgers')->where('account_type','Cr')->where('chart_account_id',$chartAccount->id)->sum('amount');

        return 'Dr'.$Drtotal.' Cr'.$Crtotal;

        $Drtotal=DB::table('ledgers')->where('account_type','Dr')->where('chart_account_id',$chartAccount->id)->sum('amount');
        $Crtotal=DB::table('ledgers')->where('account_type','Cr')->where('chart_account_id',$chartAccount->id)->sum('amount');

        $bs_items=ChartAccount::where('parent_id',0)->where('account','BS')->get();
        //return $bs_items;
        $is_items=ChartAccount::where('parent_id',0)->where('account','IS')->get();
        return view('backend.chart_account.show',compact('bs_items','is_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartAccount $chartAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChartAccount $chartAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChartAccount $chartAccount)
    {
        //
    }
}
