<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use App\Category;
use App\Purchase;
use App\PurchaseDetail;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();

        return view('backend.product.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category=Category::find($request->category_id);
        
        return view('backend.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importProduct(Request $request){
       //return $request->file('file')->store('temp');
        // $array = Excel::toArray(new ProductsImport, request()->file('file'));
        // return $array;
        try{
            Excel::import(new ProductsImport, request()->file('file')->store('temp'));
        //return $collection[0];
        toastr()->success('Product Upload Successfully', 'System Says');
        return back();
        }catch(\Exception $e){
            return $e->getMessage();
        }

        
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'code'=>'required|unique:products',
            'name'=>'required',
           
            'unit'=>'required',
           
        ]);
        $product= new Product();
        $product->code=$request->input('code');
        $product->name=$request->input('name');
        $product->category_id=$request->input('category_id');
        $product->width=$request->input('width');
        $product->origin=$request->input('origin');
        $product->unit=$request->input('unit');
        $product->description=$request->input('description');
        $product->status=$request->input('status');
        $product->save();
        toastr()->success('Product Save Successfully', 'System Says');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //return $product;
      $product=Product::find($product->id);
        $purchases=  PurchaseDetail::where('product_id',$product->id)->get();
        $total_purchase_qty=  PurchaseDetail::where('product_id',$product->id)->sum('purchase_qty');
        $total_stock_qty=  DB::table('stocks')->where('product_id',$product->id)->sum('wh_qty');
        $total_sale_qty=DB::table('invoice_details')->where('product_id',$product->id)->sum('qty');
        return view('backend.product.show',compact('product','total_purchase_qty','total_stock_qty','total_sale_qty'));
    }

    public function productList($category_id)
    {
        
      $products=Product::where('category_id',$category_id)->get();
     // return $products;
        // $purchases=  PurchaseDetail::where('product_id',$product->id)->get();
        // $total_purchase_qty=  PurchaseDetail::where('product_id',$product->id)->sum('purchase_qty');
        // $total_stock_qty=  DB::table('stocks')->where('product_id',$product->id)->sum('wh_qty');
        // $total_sale_qty=DB::table('invoice_details')->where('product_id',$product->id)->sum('qty');
        return view('backend.product.product-list',compact('products'));
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
        $product->category_id=$request->input('category_id');
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
