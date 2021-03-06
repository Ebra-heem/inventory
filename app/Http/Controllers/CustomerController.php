<?php

namespace App\Http\Controllers;

use App\Ledger;
use App\Customer;
use Carbon\Carbon;
use App\SaleInvoice;
use App\CustomerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();
        return view('backend.customer.index',compact('customers'));
    }
    public function payment()
    {
        $customers=Customer::all();
        $invoices=SaleInvoice::latest()->get();
        return view('backend.customer.payment',compact('customers','invoices'));
    }

    public function paymentList(Request $request)
    {
        //return $request;
        $invoices=SaleInvoice::where('customer_id',$request->customer_id)->get();
        $customers=Customer::all();
        $customer=Customer::find($request->customer_id);
        return view('backend.customer.payment',compact('invoices','customers','customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
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
            'address'=>'required',
            'status'=>'required'
        ]);
        $customer= new Customer();
        $customer->name=$request->input('name');
        $customer->phone=$request->input('phone');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->status=$request->input('status');
        $customer->save();
        toastr()->success('Customer Save Successfully', 'System Says');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        
        $sales = CustomerDetail::where('customer_id',$customer->id)->get(); 
        $total = SaleInvoice::where('customer_id',$customer->id)->sum('total');
        $paid = SaleInvoice::where('customer_id',$customer->id)->sum('paid');
        $due = SaleInvoice::where('customer_id',$customer->id)->sum('due'); 
        return view('backend.customer.show',compact('customer','total','paid','due','sales'));
    }

    public function print($id)
    {
        $sales = CustomerDetail::where('customer_id',$id)->get();
        $customer=Customer::find($id);
        //return $purchases;
        $total = SaleInvoice::where('customer_id',$id)->sum('total');
        $paid = SaleInvoice::where('customer_id',$id)->sum('paid');
        $due = SaleInvoice::where('customer_id',$id)->sum('due'); 
        
        return view('backend.customer.print',compact('customer','sales','total','paid','due')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::find($id);
        return view('backend.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer= Customer::find($customer->id);
        $customer->name=$request->input('name');
        $customer->phone=$request->input('phone');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->status=$request->input('status');
        $customer->save();
        toastr()->success('Customer Updated Successfully', 'System Says');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        toastr()->success('Customer Deleted Successfully', 'System Says');
        return redirect()->route('customer.index');
    }

    public function allDues()
    {
        
        $sales=SaleInvoice::where('status',0)->orderby('id','desc')->get();
      

        return view('backend.customer.all_dues',compact('sales'));
    }

    public function allPaid()
    {
        
        $sales=SaleInvoice::where('status',1)->orderby('id','desc')->get();
        $all_paid= DB::table('sale_invoices')->sum('paid');

        return view('backend.customer.all_paid',compact('sales','all_paid'));
    }

    public function ledger(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'date' => 'required',
            'invoice_id' => 'required',
            'amount' => 'required'
        ]);
       // return $request;
       $date=Carbon::createFromFormat('d/m/Y', $request->input('date'));
        CustomerDetail::create([
            'customer_id'=>$request->customer_id,
            'date'=>$date,
            'particular'=>$request->particular,
            'amount'=>$request->amount,
            'account_type'=>$request->account_type,
            'section'=>'paid',
            'invoice_id'=>$request->invoice_id,
           ]);


           $fee_total=0;
           $paid_total=0;
           //total fee
        $particulars_fee= CustomerDetail::where('customer_id',$request->customer_id)->where('invoice_id',$request->invoice_id)->where('account_type','Dr')->get();
        foreach ($particulars_fee as $fee){
            $fee_total+=$fee->amount;
        }
        
        $particulars_paid= CustomerDetail::where('customer_id',$request->customer_id)->where('invoice_id',$request->invoice_id)->where('account_type','Cr')->get();
        foreach ($particulars_paid as $paid){
            $paid_total+=$paid->amount;
        }

        SaleInvoice::where('id',$request->invoice_id)
        ->update(['total'=>$fee_total,'paid'=>$paid_total,'due'=>$fee_total-$paid_total,'status'=>($fee_total==$paid_total)?1:0]);

        toastr()->success('Customer Bill Save Successfully', 'System Says');
        return redirect()->back();
    }
}
