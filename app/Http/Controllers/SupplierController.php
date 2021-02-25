<?php

namespace App\Http\Controllers;

use App\Ledger;
use App\Purchase;
use App\Supplier;
use App\SupplierDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::all();
        return view('backend.supplier.index',compact('suppliers'));
    }

    public function payment()
    {
        $suppliers=Supplier::all();
        $invoices=Purchase::latest()->get();
        return view('backend.supplier.payment',compact('suppliers','invoices'));
    }

    public function paymentList(Request $request)
    {
       // return $request;
        $invoices=Purchase::where('supplier_id',$request->suplier_id)->get();
        $suppliers=Supplier::all();
        $customer=Supplier::find($request->suplier_id);
        return view('backend.supplier.payment',compact('invoices','suppliers','customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
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
            'phone'=>'required',
            'status'=>'required'
        ]);
        $buyer= new Supplier();
        $buyer->name=$request->input('name');
        $buyer->phone=$request->input('phone');
        $buyer->address=$request->input('address');
        $buyer->status=$request->input('status');
        $buyer->save();
        toastr()->success('Supplier Save Successfully', 'System Says');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $purchases = SupplierDetail::where('supplier_id',$supplier->id)->get();
        //return $purchases;
        $total = Purchase::where('supplier_id',$supplier->id)->sum('total');
        $paid = Purchase::where('supplier_id',$supplier->id)->sum('paid');
        $due = Purchase::where('supplier_id',$supplier->id)->sum('due'); 
        
        return view('backend.supplier.show',compact('supplier','purchases','total','paid','due')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $supplier=Supplier::find($supplier->id);
        return view('backend.supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier= Supplier::find($supplier->id);
        $supplier->name=$request->input('name');
        $supplier->phone=$request->input('phone');
       
        $supplier->address=$request->input('address');
        $supplier->status=$request->input('status');
        $supplier->save();
        toastr()->success('Supplier Updated Successfully', 'System Says');
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        toastr()->success('Supplier Deleted Successfully', 'System Says');
        return redirect()->route('supplier.index');
    }

    public function allDues()
    {
        
        $purchases=Purchase::where('status',0)->orderby('id','desc')->get();
        $all_due= DB::table('purchases')->sum('due');

        return view('backend.supplier.all_dues',compact('purchases','all_due'));
    }

    public function ledger(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'date' => 'required',
            'purchase_id' => 'required',
            'amount' => 'required'
        ]);
        //return $request;
       
        SupplierDetail::create([
            'supplier_id'=>$request->supplier_id,
            'date'=>$request->date,
            'particular'=>$request->particular,
            'amount'=>$request->amount,
            'account_type'=>$request->account_type,
            'section'=>'bill',
            'purchase_id'=>$request->purchase_id,
           ]);

                       //Bs Cash on Hand Cr
                    Ledger::create([
                        'date'=>$request->date,
                        'chart_account_id'=>'16',
                        'supplier_id'=>$request->supplier_id,
                        'particular'=>$request->particular.'(Cash Payment to Supplier)',
                        'amount'=>$request->amount,
                        'account_type'=>'Cr',
                        'sale_invoice_id'=>$request->invoice_id,
                        
                    ]);
            
                      //Bs Account Payable Dr 
                      Ledger::create([
                        'date'=>$request->date,
                        'chart_account_id'=>'8',
                        'supplier_id'=>$request->supplier_id,
                        'particular'=>$request->particular.'(Account Payable to Supplier cr)',
                        'amount'=>$request->amount,
                        'account_type'=>'Dr',
                        'sale_invoice_id'=>$request->invoice_id,
                        
                    ]);

           $fee_total=0;
           $paid_total=0;
           //total fee
        $particulars_fee= SupplierDetail::where('supplier_id',$request->supplier_id)->where('purchase_id',$request->purchase_id)->where('account_type','Dr')->get();
        foreach ($particulars_fee as $fee){
            $fee_total+=$fee->amount;
        }
        
        $particulars_paid= SupplierDetail::where('supplier_id',$request->supplier_id)->where('purchase_id',$request->purchase_id)->where('account_type','Cr')->get();
        foreach ($particulars_paid as $paid){
            $paid_total+=$paid->amount;
        }

        Purchase::where('id',$request->purchase_id)
        ->update(['total'=>$fee_total,'paid'=>$paid_total,'due'=>$fee_total-$paid_total,'status'=>($fee_total==$paid_total)?1:0]);

        toastr()->success('Supplier Bill Save Successfully', 'System Says');
        return redirect()->back();
    }
}
