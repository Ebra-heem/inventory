<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Stock;
use App\Product;
use App\Category;
use App\Customer;
use App\Purchase;
use App\Supplier;
use App\Wirehouse;
use Carbon\Carbon;
use App\SupplierDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
       // $dateJunk = Carbon::createFromFormat('d/m/Y',$today);
        //return $dateJunk;
       $purchases=Purchase::with('products')->orderBy('id','desc')->get();
       //return $purchases;
       // dd($purchases);
        return view('backend.purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $products=Product::where('status',1)->get();
        $suppliers=Supplier::where('status',1)->get();
        $wirehouses=Wirehouse::where('status',1)->get();
        $racks=Rack::all();
       
        $today = Carbon::today();
       // return $today->format('d/m/Y');
        return view('backend.purchase.create',compact('suppliers','today','wirehouses','racks'));
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
            'supplier_id'=>'required',
            'price'=>'required',
            'qty'=>'required'
        ]);
        $product_id=$request->input('product_id');
        $supplier_id=$request->input('supplier_id');
        $prices=$request->input('price');
        $quantities=$request->input('qty');
        $discount=$request->input('discount');
        $shipping=$request->input('shipping');
        $dateJunk = Carbon::createFromFormat('d/m/Y', $request->input('date'));

       
        $final_data=array_map(function($product_id,$prices,$quantities){
            $data=[
                'product_id'=>$product_id,
                'price'=>$prices,
                'qty'=>$quantities,
                'subtotal'=>$prices*$quantities
            ];
            return $data;
        },$product_id,$prices,$quantities);
        
       // return $final_data;
   
        $total=0;
        foreach($final_data as $data){  
            $total+=$data['subtotal'];
        }

        $grandTotal=$total-$discount+$shipping;
        if($total==$discount){
            $status=1;
        }else{
            $status=0; 
        }
        $invoice=Purchase::create([
            'date'=>$dateJunk,
            'supplier_id'=>$supplier_id,
            'paid'=>$discount,
            'total'=>$total,
            'due'=>$grandTotal,
            'status'=>$status,
        ]);

        SupplierDetail::create([
            'date'=>$dateJunk,
            'supplier_id'=>$supplier_id,
            'purchase_id'=>$invoice->id,
            'particular'=>'Purchase Product',
            'amount'=>$total,
            'account_type'=>'Dr',
            'section'=>'purchase'
        ]);
      
        foreach($final_data as $data){
            
            DB::table('purchase_details')->insert([
                [
                    'date'=>$dateJunk,
                    'product_id' => $data['product_id'],
                    'supplier_id' => $invoice->supplier_id,
                    'purchase_id' => $invoice->id,
                    'buy_price'=>$data['price'],
                    'purchase_qty'=>$data['qty']
                ]
            ]);

            $stock_check=Stock::where('product_id',$data['product_id'])->first();
            //return $stock_check;
            if(isset($stock_check)){
                Stock::where('product_id',$data['product_id'])
                ->update(array(
                    'wh_qty'=>$stock_check->wh_qty+$data['qty'],
                    'total_qty'=>$stock_check->total_qty+$data['qty'],
                ));
            }else{
                Stock::create([
                    
                        'product_id' => $data['product_id'],
                        'wh_qty' => $data['qty'],
                        'total_qty' => $data['qty'],
                        'purchase_price' => $data['price'],
                        'wirehouse_id'=>1,
                ]);
            }
        }

        toastr()->success('Purchase Invoice Save Successfully', 'System Says');
        return redirect()->route('purchase.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $Purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
       
        $total_purchase_qty=  Purchase::where('product_id',$purchase->product_id)->sum('purchase_qty');
        $purchases=  Purchase::where('product_id',$purchase->product_id)->get();
      //  return $purchases;
        return view('backend.purchase.showroom',compact('purchases','total_purchase_qty'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $Purchase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase=Purchase::find($id);
        $supplier= Supplier::find($purchase->supplier_id);
        $today = Carbon::today();
        $particulars_fee=SupplierDetail::where('supplier_id',$purchase->supplier_id)->where('purchase_id',$purchase->id)->where('account_type','Dr')->where('section','purchase')->get();
        //return $particulars_fee;
        $particulars_bill=SupplierDetail::where('supplier_id',$purchase->supplier_id)->where('purchase_id',$purchase->id)->where('account_type','Cr')->where('section','bill')->get();
        $details = DB::table('purchases')
            ->join('purchase_details', 'purchases.id', '=', 'purchase_details.purchase_id')
            ->select('purchases.*', 'purchase_details.product_id', 'purchase_details.buy_price','purchase_details.purchase_qty')
            ->where('purchase_details.purchase_id','=',$id)
            ->get()
            ->toArray();
        return view('backend.purchase.edit',compact('purchase','particulars_fee','particulars_fee','particulars_bill','today','details','supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $Purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            toastr()->success('Payment Save Successfully', 'System Says');
            return redirect()->route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $Purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
       
        $details=DB::table('purchase_details')->where('purchase_id',$purchase->id)->get();
        if(count($details)>0){
            foreach($details as $detail)
                {
                    // $sr_qty_check= Stock::where('product_id', $detail->product_id)->first();
        
                
                    // $updated_sr_qty = $sr_qty_check->sr_qty+$detail->purchase_qty;
                    // $updated_sale_qty = $sr_qty_check->sale_qty-$detail->purchase_qty;
                    // Stock::where('product_id', $detail->product_id)
                    // ->update(['sr_qty' => $updated_sr_qty,'sale_qty'=>$updated_sale_qty]);

                    DB::table('purchase_details')->where('id',$detail->id)->delete();
                }
        }
        

        $purchase->delete();

        toastr()->warning('Invoice Deleted Successfully', 'System Says');
            return redirect()->route('purchase.index');
        
    }

    public function details($id)
    {
      //dd('workinf');
      $invoice=Purchase::find($id);
        $details = DB::table('purchases')
            ->join('purchase_details', 'purchases.id', '=', 'purchase_details.purchase_id')
            ->select('purchases.*', 'purchase_details.product_id', 'purchase_details.buy_price','purchase_details.purchase_qty')
            ->where('purchase_details.purchase_id','=',$id)
            ->get()
            ->toArray();
        //return $details;
        return view('backend.purchase.purchase_details',compact('invoice','details'));
    }

    public function manage()
    {
         $products=Category::all();
         $buyers=Customer::where('status',1)->get();
         $today = Carbon::today(); 
        $purchases=Purchase::orderBy('id','desc')->get();
        return view('backend.purchase.manage',compact('purchases','products','buyers','today'));
    }

    public function filter(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        
         $from_dateJunk = Carbon::createFromFormat('d/m/Y',$from_date);
         $to_dateJunk = Carbon::createFromFormat('d/m/Y',$to_date);
         $categoty_id = $request->input('categoty_id');
         $products=Category::all();
         $buyers=Customer::where('status',1)->get();
         $today = Carbon::today(); 
        
         $users = DB::table('products')
            ->join('purchase_details', 'products.id', '=', 'purchase_details.product_id')
            ->select('products.*', 'purchase_details.date', 'purchase_details.buy_price','purchase_details.purchase_qty')
            ->whereBetween('purchase_details.date',[$from_dateJunk,$to_dateJunk])
            ->get();
            return $users;
       
        if($request->input('type')==2){
            
            return view('backend.purchase.filter',compact('purchases','products','buyers','today','total_qty','total_price','date','product_id'));
        }
    }   
}
