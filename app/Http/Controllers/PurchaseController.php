<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Stock;
use App\Product;
use App\Customer;
use App\Purchase;
use App\Supplier;
use App\Wirehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\SupplierDetail;

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
        ]);
      
        foreach($final_data as $data){
            
            DB::table('purchase_details')->insert([
                [
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
                ->update(array('wh_qty'=>$stock_check->wh_qty+$data['qty']));
            }else{
                Stock::create([
                    
                        'product_id' => $data['product_id'],
                        'wh_qty' => $data['qty'],
                        'wirehouse_id'=>1
                    
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
        $pre_due=Purchase::where('supplier_id',$request->input('supplier_id'))->sum('due');

        $dateJunk = Carbon::createFromFormat('d/m/Y', $request->input('date'));
        $product=  Purchase::find($id);
        $product->date=$dateJunk;
        $product->supplier_id=$request->input('supplier_id');
        $product->product_id=$request->input('product_id');
        $product->purchase_qty=$request->input('purchase_qty');
        $product->buy_price=$request->input('buy_price');
        $product->sell_price=$request->input('sell_price');
        $product->total=$request->input('purchase_qty')*$request->input('buy_price');
        $product->wirehouse_id=$request->input('wirehouse_id');
        $product->rack_id=$request->input('rack_id');
        $product->wh_stock_qty=$request->input('purchase_qty');
        $product->sr_stock_qty=$request->input('sr_stock_qty');
        $product->paid=$request->input('paid');
        $product->due=$request->input('due');
        $product->note=$request->input('note');
        $product->previous_due=$pre_due;

        if($request->input('due')>0){
            $product->status=0;
        }else{
            $product->status=1;
        }
        
        //return $product->toArray();
        $product->save();
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
         $products=Product::where('status',1)->get();
         $buyers=Customer::where('status',1)->get();
         $today = Carbon::today();
        $purchases=Purchase::orderBy('id','desc')->get();
        return view('backend.purchase.manage',compact('purchases','products','buyers','today'));
    }

    public function filter(Request $request)
    {
        $date = $request->input('date');
         $dateJunk = Carbon::createFromFormat('d/m/Y',$date);
         $product_id = $request->input('product_id');
         $products=Product::where('status',1)->get();
         $buyers=Customer::where('status',1)->get();
         $today = Carbon::today();
        if($request->input('type')==1){
            
            $purchases=Purchase::whereDate('date',$dateJunk)->where('product_id',$product_id)->orderBy('id','desc')->get();
            $total_qty=Purchase::whereDate('date',$dateJunk)->where('product_id',$product_id)->orderBy('id','desc')->sum('qty');
            $total_price=Purchase::whereDate('date',$dateJunk)->where('product_id',$product_id)->orderBy('id','desc')->sum('total');
           
            return view('backend.purchase.filter',compact('purchases','products','buyers','today','total_qty','total_price','date','product_id'));
        } 
        if($request->input('type')==2){
            $buyer_id = $request->input('buyer_id');
            $purchases=Purchase::whereDate('date', $dateJunk)->where('buyer_id', $buyer_id)
            ->where('product_id',$product_id)->get();
            $total_qty=Purchase::whereDate('date', $dateJunk)->where('buyer_id', $buyer_id)
            ->where('product_id',$product_id)->sum('qty');
            $total_price=Purchase::whereDate('date', $dateJunk)->where('buyer_id', $buyer_id)
            ->where('product_id',$product_id)->sum('total');
            return view('backend.purchase.filter',compact('purchases','products','buyers','today','total_qty','total_price','date','product_id'));
        }
    }   
}