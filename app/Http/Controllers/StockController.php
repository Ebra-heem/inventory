<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Stock;
use App\Product;
use App\Category;
use App\Purchase;
use App\Transfer;
use App\Wirehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks=Stock::all();
        $products=Product::where('status',1)->get();
        $wirehouses=Wirehouse::where('status',1)->get();

        $categories=Category::all();

        // return view('backend.stock.index',compact('categories'));
        return view('backend.stock.index',compact('stocks','products','wirehouses','categories'));
    }

    public function wh_sr(){
       
        $categories=Category::all();
        $today = Carbon::today();
        return view('backend.stock.filter_wh_sr',compact('today','categories'));
    }

    public function filter_wh_sr(Request $request){
        $stocks = DB::table('products')
        ->join('stocks', 'products.id', '=', 'stocks.product_id')
        ->select('stocks.*', 'products.code', 'products.name','products.category_id')
        ->whereIn('products.category_id',$request->category_id)
        ->get();
        $categories=Category::all();
        $today = Carbon::today();
        return view('backend.stock.filter_wh_sr',compact('today','categories','stocks'));
    }

    public function showroom(){
        $categories=Category::all();
        $today = Carbon::today();
        return view('backend.stock.filter_sr',compact('today','categories'));
    }

    public function filter_sr(Request $request){
        
        $stocks = DB::table('products')
        ->join('stocks', 'products.id', '=', 'stocks.product_id')
        ->select('stocks.*', 'products.code', 'products.name','products.category_id')
        ->whereIn('products.category_id',$request->category_id)
        ->get();
        $categories=Category::all();
        $today = Carbon::today();
        return view('backend.stock.filter_sr',compact('today','categories','stocks'));
    }

    public function warehouse(){
        $categories=Category::all();
        $today = Carbon::today();
        return view('backend.stock.filter',compact('today','categories'));
    }

    public function filter(Request $request){
        $stocks = DB::table('products')
        ->join('stocks', 'products.id', '=', 'stocks.product_id')
        ->select('stocks.*', 'products.code', 'products.name','products.category_id')
        ->whereIn('products.category_id',$request->category_id)
        ->get();
        $categories=Category::all();
        $today = Carbon::today();
        return view('backend.stock.filter',compact('today','categories','stocks'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::where('status',1)->get();
        $wirehouses=Wirehouse::where('status',1)->get();
        $racks=Rack::all();
        return view('backend.stock.create',compact('products','wirehouses','racks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //return $request;
       $check=Stock::where('product_id',$request->product_id)->first();
       if(!empty($check)){
        $check->update([
            'wh_qty'=>$check->wh_qty+$request->wh_qty,
            'total_qty'=>$check->wh_qty+$request->wh_qty,
            'purchase_price'=>$request->purchase_price,
            'avg_price'=>$request->avg_price?$request->avg_price:$check->avg_price,
            'avg'=>$request->purchase_price,
            ]);
        toastr()->warning(' Stock Qty Updated  Successfully', 'System Says');
        return redirect()->route('stock.index');
       }else{
           Stock::create([
               'product_id'=>$request->product_id,
               'wirehouse_id'=>$request->wirehouse_id,
               'wh_qty'=>$request->wh_qty,
               'avg_price'=>$request->wh_qty*$request->purchase_price,
               'total_qty'=>$request->wh_qty,
               'purchase_price'=>$request->purchase_price,
               'avg'=>$request->purchase_price,
               
           ]);
        toastr()->success('Product Stock Add  Successfully', 'System Says');
        return redirect()->back();
       }
       
    }

    public function transfer(Request $request)
    {
        
        //return $request->all();
        
         $stock_id=$request->input('stock_id');
         $product=Stock::where('id',$stock_id)->first();
        $old_sr_qty= $product->sr_qty;
         $sr_qty=$request->input('sr_qty');
         $wh_qty= $product->wh_qty-$sr_qty;

         Stock::where('id', '=',$stock_id)
                        ->update(array('sr_qty' => $sr_qty+$old_sr_qty,'wh_qty'=>$wh_qty));
        Transfer::create([
               'date'=>Carbon::today(),
               'product_id'=>$product->product_id,
               'stock_id'=>$stock_id,
               'qty'=>$sr_qty,
           ]);

            toastr()->success('Product Transfer Successfully', 'System Says');
            return redirect()->route('stock.index');
    }

    public function transfer_list(){
        $categories=Category::all();
        $today = Carbon::today();
        $transfer_lists = DB::table('products')
           ->join('transfers', 'products.id', '=', 'transfers.product_id')
           ->select('products.*', 'transfers.date', 'transfers.qty')
           ->get(); 
        //return $transfer_lists;
       return view('backend.stock.transfer',compact('categories','today','transfer_lists'));
    }

    public function transfer_filter(Request $request){
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        
        $date = str_replace('/','-', $from_date); 
        $from_dateJunk=$date;
        $date2 = str_replace('/','-', $to_date); 
        $to_dateJunk=$date2;
        $newDate = date("Y-m-d", strtotime($date));
        $newDate2 = date("Y-m-d", strtotime($date2));
        //return $newDate; 
        $categories=Category::all();
       
         $categoty_id = $request->input('categoty_id');
         $today = Carbon::today(); 
         $transfer_lists = DB::table('products')
         ->join('transfers', 'products.id', '=', 'transfers.product_id')
         ->select('products.*', 'transfers.date', 'transfers.qty')
            ->whereBetween('transfers.date',[$newDate,$newDate2])
            ->whereIn('products.category_id',$request->category_id)
            ->get();
        
            return view('backend.stock.transfer',compact('today','transfer_lists','from_dateJunk','to_dateJunk','categories'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
       
        $product= Product::where('id',$stock->product_id)->first();
       //return $stock;
        return view('backend.stock.showroom',compact('stock','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $stock=Stock::find($stock->id)->update([
            'product_id'=>$request->product_id,
            'wirehouse_id'=>$request->wirehouse_id,
            'wh_qty'=>$request->wh_qty,
            'purchase_price'=>$request->purchase_price,
            'avg'=>$request->avg,
            'sr_qty'=>$request->showroom_qty,
            'sale_qty'=>$request->sale_qty,
        ]);
      
        toastr()->success('Stock Updated Successfully', 'System Says');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
