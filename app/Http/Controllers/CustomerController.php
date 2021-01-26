<?php

namespace App\Http\Controllers;

use App\Customer;
use App\SaleInvoice;
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
        
        $sales = SaleInvoice::where('customer_id',$customer->id)->get();
        $total = SaleInvoice::where('customer_id',$customer->id)->sum('total');
        $paid = SaleInvoice::where('customer_id',$customer->id)->sum('paid');
        $due = SaleInvoice::where('customer_id',$customer->id)->sum('due'); 
        return view('backend.customer.show',compact('customer','total','paid','due','sales'));
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
        $all_due= DB::table('sale_invoices')->sum('due');

        return view('backend.customer.all_dues',compact('sales','all_due'));
    }
}
