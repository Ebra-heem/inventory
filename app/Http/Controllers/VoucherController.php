<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Voucher;
use Carbon\Carbon;
use App\AccountGroup;
use App\GeneralLedger;
use App\ChartOfAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers=Voucher::with('ledger')->get();
        //return $vouchers;
        return view('backend.account.voucher.index',compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today=Carbon::today();
        $items=ChartOfAccount::with('group')->get();
        $banks=Bank::all();
        $last_id=DB::table('vouchers')->latest('id')->first();
        
        return view('backend.account.voucher.create',compact('today','items','last_id','banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
       $this->validate($request,[
        'narration'=>'required',
        'voucher_type'=>'required',
        'date'=>'required'
    ]);
        $chart_account_id=$request->input('chart_account_id');
        $debit=$request->input('debit');
        $credit=$request->input('credit');
        $remarks=$request->input('remarks');
        $date=Carbon::createFromFormat('d/m/Y', $request->input('date'));
      //  return ChartOfAccount::where('id',1)->value('account_group_id');
       $voucher_type=$request->input('voucher_type');
       $payment_type=$request->input('payment_type');
       $narration=$request->input('narration');
       $voucher_number=$request->input('voucher_number');
       $bank_id=$request->input('bank_id');
        
        $final_data=array_map(function($chart_account_id,$debit,$credit,$remarks){
            $data=[
                'chart_account_id'=>$chart_account_id,
                'debit'=>$debit,
                'credit'=>$credit,
                'remarks'=>$remarks
            ];
            return $data;
        },$chart_account_id,$debit,$credit,$remarks);

        
        $voucher=Voucher::create([
            'date'=>$date,
            'voucher_number'=>$voucher_number,
            'voucher_type'=>$voucher_type,
            'payment_type'=>$payment_type,
            'narration'=>$narration,
            'created_by'=>auth()->user()->name
        ]);
        //return $voucher;
        foreach($final_data as $data){
            
            GeneralLedger::create([
                'date'=>$date,
                'voucher_id'=>$voucher->id,
                'chart_account_id'=>$data['chart_account_id'],
                'account_group_id'=>ChartOfAccount::where('id',$data['chart_account_id'])->value('account_group_id'),
                'debit'=>$data['debit'],
                'credit'=>$data['credit'],
                'remarks'=>$data['remarks'],
                'narration'=>$narration,
                
            ]);
        }

        toastr()->success('Voucher  Created', 'System Says');
        return redirect()->route('voucher.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        $voucher=Voucher::with('ledger')->find($voucher);
        //return $voucher[0]->ledger;
        return view('backend.account.voucher.print',compact('voucher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
}
