<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use App\Purchase;
use App\PurchaseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'code'=>'required|unique:products',
            'name'=>'required',
            'width'=>'required',
            'unit'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);
        $product= new Product();
        $product->code=$request->input('code');
        $product->name=$request->input('name');
        $product->width=$request->input('width');
        $product->origin=$request->input('origin');
        $product->unit=$request->input('unit');
        $product->description=$request->input('description');
        $product->status=$request->input('status');
        $product->save();
        toastr()->success('Product Save Successfully', 'System Says');
        return redirect()->route('product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      //  return $product->id;
      $product=Product::find($product->id);
        $purchases=  PurchaseDetail::where('product_id',$product->id)->get();
        $total_purchase_qty=  PurchaseDetail::where('product_id',$product->id)->sum('purchase_qty');
        $total_stock_qty=  DB::table('stocks')->where('product_id',$product->id)->sum('wh_qty');
        $total_sale_qty=DB::table('invoice_details')->where('product_id',$product->id)->sum('qty');
        return view('backend.product.show',compact('product','total_purchase_qty','total_stock_qty','total_sale_qty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('backend.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $product= Product::find($product->id);
        $product->code=$request->input('code');
        $product->name=$request->input('name');
        $product->width=$request->input('width');
        $product->origin=$request->input('origin');
        $product->unit=$request->input('unit');
        $product->description=$request->input('description');
        $product->status=$request->input('status');
        $product->save();
        $product->save();
        toastr()->success('Supplier Updated Successfully', 'System Says');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        toastr()->success('Supplier Deleted Successfully', 'System Says');
        return redirect()->route('product.index');
    }
    public function allProduct()
    {
        $products = Product::all();
        //echo json_encode($subjects);
       return response(['products'=>$products]); 
    }
}
