<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Stock;
use App\Product;
use App\Category;
use App\Purchase;
use App\Wirehouse;
use Illuminate\Http\Request;

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

            toastr()->success('Product Transfer Successfully', 'System Says');
            return redirect()->route('stock.index');
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
