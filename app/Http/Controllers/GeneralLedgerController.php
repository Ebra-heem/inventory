<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\AccountGroup;
use App\GeneralLedger;
use App\ChartOfAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GeneralLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ledgers=GeneralLedger::with('group','chart')->get();
        $today=Carbon::today();
        return view('backend.account.ledger.ledger',compact('ledgers','today'));
    }

    public function trail(Request $request)
    {
        $ledgers=ChartOfAccount::with('ledger')->get();
        $today=Carbon::today();
       // return  $ledgers;
        return view('backend.account.ledger.trail',compact('ledgers','today'));
    }

    public function income(Request $request)
    {
        $ledgers=ChartOfAccount::with('ledger','group')->get();
        $today=Carbon::today();
       // return  $ledgers;
        return view('backend.account.ledger.income',compact('ledgers','today'));
    }

    public function balance(Request $request)
    {
       // $ledgers=GeneralLedger::with('group','chart')->get();
      // $groups=ChartOfAccount::with('group')->get();
       $groups=DB::table('account_groups')
                    ->select(DB::raw('account_type'))
                    ->groupBy('account_type')
                    ->get();
        $charts=DB::table('chart_of_accounts')
                    ->select(DB::raw('account_group_id'))
                    ->groupBy('account_group_id')
                    ->get();
        $ledgers=ChartOfAccount::with('ledger','group')->get();
        $today=Carbon::today();
        return view('backend.account.ledger.balance',compact('ledgers','today','groups','charts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneralLedger  $generalLedger
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralLedger $generalLedger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneralLedger  $generalLedger
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralLedger $generalLedger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GeneralLedger  $generalLedger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralLedger $generalLedger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GeneralLedger  $generalLedger
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralLedger $generalLedger)
    {
        //
    }
}
