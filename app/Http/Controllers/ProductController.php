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
    public function importList()
    {
        return view('backend.product.import');
    }

    public function sr_importList()
    {
        return view('backend.product.sr_import');
    }
    public function importProduct(Request $request){
       //return $request->file('file')->store('temp');

        
        try{
            //Excel::import(new ProductsImport, request()->file('file')->store('temp'));
            $products = Excel::toArray(new ProductsImport, request()->file('file'));
            //return $products;
            foreach ($products[0] as $product){
               $p=Product::where('code',$product['code'])->first();
               //return $p;
              // return $check->id;
               if(isset($p)){
   
                   $stock_check=Stock::where('product_id',$p->id)->first();
                       if(!empty($stock_check)){
                           //return 'if product already been  stock';
                           $stock_check->update([
                               'wh_qty'=>$product['qty'],
                               'total_qty'=>$product['qty'],
                               'purchase_price'=>$product['price'],
                               'avg_price'=>$product['qty']*$product['price'],
                               'avg'=>$product['price'],
                               ]);
                       }else{
                           //return 'if product not in stocks table but product table exist';
                           $p->update([
                               'code'=>$product['code'],
                               'name'=>$product['name'],
                               'category_id'=>$product['category_id'],
                               'unit'=>$product['unit'],
                               'status'=>1,
                               'qty'=>$product['qty'],
                               'price'=>$product['price'],
                             
                           ]);
                           Stock::create([
                               'product_id'=>$pro->id,
                               'wirehouse_id'=>1,
                               'wh_qty'=>$pro->qty,
                               'avg_price'=>$pro->qty*$pro->price,
                               'total_qty'=>$pro->wh_qty,
                               'purchase_price'=>$pro->price,
                               'avg'=>$pro->price,
                               
                           ]);
                       }
               }else{
                   //$newProduct[]=$product;
                   $pro=  Product::create([
                       'code'=>$product['code'],
                       'name'=>$product['name'],
                       'category_id'=>$product['category_id'],
                       'unit'=>$product['unit'],
                       'status'=>1,
                       'qty'=>$product['qty'],
                       'price'=>$product['price'],
                     
                   ]);
                   Stock::create([
                       'product_id'=>$pro->id,
                       'wirehouse_id'=>1,
                       'wh_qty'=>$pro->qty,
                       'avg_price'=>$pro->qty*$pro->price,
                       'total_qty'=>$pro->wh_qty,
                       'purchase_price'=>$pro->price,
                       'avg'=>$pro->price,
                       
                   ]);
               }
           }
        toastr()->success('Product Upload Successfully', 'System Says');
        return back();
        }catch(\Exception $e){
            return $e->getMessage();
        }

        
    }

    public function sr_importProduct(Request $request)
    {
        try{
        //return $request->file('file')->store('temp');
        $products = Excel::toArray(new ProductsImport, request()->file('file'));
        //return $products;
        foreach ($products[0] as $product){
            $p=Product::where('code',$product['code'])->first();
            //return $p;
           // return $check->id;
            if(isset($p)){

                $stock_check=Stock::where('product_id',$p->id)->first();
                    if(!empty($stock_check)){
                        //return 'if product already been  stock';
                        $stock_check->update([
                            'sr_qty'=>$product['qty'],
                            'purchase_price'=>$product['price'],
                            'avg_price'=>$product['qty']*$product['price'],
                            'avg'=>$product['price'],
                            ]);
                    }else{
                        //return 'if product code not exist in stocks table but exist on products table then product will be updated and stock will created';
                        $p->update([
                            'code'=>$product['code'],
                            'name'=>$product['name'],
                            'category_id'=>$product['category_id'],
                            'unit'=>$product['unit'],
                            'status'=>1,
                            'qty'=>$product['qty'],
                            'price'=>$product['price'],
                          
                        ]);
                        Stock::create([
                            'product_id'=>$p->id,
                            'wirehouse_id'=>1,
                            'sr_qty'=>$p->qty,
                            'avg_price'=>$p->qty*$p->price,

                            'purchase_price'=>$p->price,
                            'avg'=>$p->price,
                            
                        ]);
                    }
            }else{
                //$newProduct[]=$product;
                $pro=  Product::create([
                    'code'=>$product['code'],
                    'name'=>$product['name'],
                    'category_id'=>$product['category_id'],
                    'unit'=>$product['unit'],
                    'status'=>1,
                    'qty'=>$product['qty'],
                    'price'=>$product['price'],
                  
                ]);
                Stock::create([
                    'product_id'=>$pro->id,
                    'wirehouse_id'=>1,
                    'sr_qty'=>$pro->qty,
                    'avg_price'=>$pro->qty*$pro->price,
                    'purchase_price'=>$pro->price,
                    'avg'=>$pro->price,
                    
                ]);
            }
        }
     toastr()->success('Showroom Product Upload Successfully', 'System Says');
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

        
        $product=  Product::create([
               'code'=>$request->input('code'),
               'name'=>$request->input('name'),
               'category_id'=>$request->input('category_id'),
               'unit'=>$request->input('unit'),
               'status'=>$request->input('status'),
               'qty'=>$request->input('wh_qty'),
               'price'=>$request->input('purchase_price'),
             
           ]);
        
         //return $request;
       $check=Stock::where('product_id',$product->product_id)->first();
       if(!empty($check)){
        $check->update([
            'wh_qty'=>$check->wh_qty+$request->wh_qty,
            'total_qty'=>$check->wh_qty+$request->wh_qty,
            'purchase_price'=>$request->purchase_price,
            'avg_price'=>$request->avg_price?$request->avg_price:$check->avg_price,
            'avg'=>$request->purchase_price,
            ]);
        toastr()->warning(' Stock Qty Updated  Successfully', 'System Says');
        return redirect()->back();
       }else{
           Stock::create([
               'product_id'=>$product->id,
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
        // toastr()->success('Product Save Successfully', 'System Says');
        // return redirect()->route('product.index');
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
        $product->update([
            'code'=>$request->input('code'),
            'name'=>$request->input('name'),
            'category_id'=>$request->input('category_id'),
            'unit'=>$request->input('unit'),
            'status'=>$request->input('status'),
            'qty'=>$request->input('wh_qty'),
            'price'=>$request->input('purchase_price'),
            ]);
         $check=Stock::where('product_id',$product->id)->first();
       if(!empty($check)){
        $check->update([
            'wh_qty'=>$check->wh_qty+$request->wh_qty,
            'total_qty'=>$check->wh_qty+$request->wh_qty,
            'purchase_price'=>$request->purchase_price,
            'avg_price'=>$check->wh_qty+$request->wh_qty*$request->purchase_price,
            'avg'=>$request->purchase_price,
            ]);
        toastr()->warning(' Stock Qty Updated  Successfully', 'System Says');
        return redirect()->back();
       }else{
           Stock::create([
               'product_id'=>$product->id,
               'wirehouse_id'=>$request->wirehouse_id,
               'wh_qty'=>$request->wh_qty,
               'avg_price'=>$request->wh_qty*$request->purchase_price,
               'total_qty'=>$request->wh_qty,
               'purchase_price'=>$request->purchase_price,
               'avg'=>$request->purchase_price,
               
           ]);
        toastr()->success('Product Stock Updated  Successfully', 'System Says');
        return redirect()->back();
       }
   
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
