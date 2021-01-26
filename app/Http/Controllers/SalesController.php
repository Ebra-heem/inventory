<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Product;
use App\Customer;
use App\Wirehouse;
use Carbon\Carbon;
use App\SaleInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $today = Carbon::today();
        $sales=SaleInvoice::whereDate('date',$today)->get();
        $all_sales= DB::table('sale_invoices')->where('date',$today)->sum('total');
        $all_paid= DB::table('sale_invoices')->where('date',$today)->sum('paid');
        $all_due= DB::table('sale_invoices')->where('date',$today)->sum('due');
        
        return view('backend.sales.index',compact('today','sales','all_sales','all_paid','all_due'));
    }

    public function allSales()
    {
        $sales=SaleInvoice::orderby('id','desc')->get();
        $today = Carbon::today();
        $all_sales= DB::table('sale_invoices')->sum('total');
        $all_paid= DB::table('sale_invoices')->sum('paid');
        $all_due= DB::table('sale_invoices')->sum('due');
        
        return view('backend.sales.index',compact('today','sales','all_sales','all_paid','all_due'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::where('status',1)->get(); 
        $buyers=Customer::where('status',1)->get();
        $wirehouses=Wirehouse::where('status',1)->get();
        $today = Carbon::today();
       // return $today->format('d/m/Y');
        return view('backend.sales.create',compact('products','buyers','today','wirehouses'));
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
            'from'=>'required',
            'to'=>'required',

        ]);
        $from = Carbon::createFromFormat('d/m/Y', $request->input('from'));
        $to = Carbon::createFromFormat('d/m/Y', $request->input('to'));
            $sales=SaleInvoice::whereBetween('date', [$from, $to])->get();

            // $sales=SaleInvoice::whereDate('date', '>=', $from)
            // ->whereDate('date', '<=', $to)->get();
           // return $sales;
            $today = Carbon::today();
            $all_sales= DB::table('sale_invoices')->whereBetween('date', [$from, $to])->sum('total');
            $all_paid= DB::table('sale_invoices')->whereBetween('date', [$from, $to])->sum('paid');
            $all_due= DB::table('sale_invoices')->whereBetween('date', [$from, $to])->sum('due');
            
            return view('backend.sales.index',compact('today','sales','all_sales','all_paid','all_due','from','to'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendors=Vendor::where('status',1)->get();
        $Sales= Sale::find($id);
        return view('backend.sales.show',compact('Sales','vendors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $Sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $Sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $Sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $Sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sale)
    {
        //
    }
}
