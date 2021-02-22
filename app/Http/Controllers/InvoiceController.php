<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Vendor;
use App\Invoice;
use App\Product;
use App\StockIn;
use App\Customer;
use App\Purchase;
use Carbon\Carbon;
use App\SaleInvoice;
use App\CustomerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=SaleInvoice::latest()->orderby('id','desc')->get();
        //return $invoices;
        return view('backend.invoice.index',compact('invoices'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::where('status',1)->get();
        $vendors = array();
        $today = Carbon::today();
        return view('backend.invoice.create',compact('customers','vendors','today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'qty'=>'required',
            'stockin_id'=>'required',
            'vendor_id'=>'required',
            'weight'=>'required',
            'price'=>'required',
            'total'=>'required'
        ]);
        $invoice= new Invoice(); 
        $invoice->qty=$request->input('qty');
        $invoice->weight=$request->input('weight');
        $invoice->price=$request->input('price');
        $invoice->stockin_id=$request->input('stockin_id');
        $invoice->vendor_id=$request->input('vendor_id');
        $invoice->commission=$request->input('commission');
        $invoice->labour_cost=$request->input('labour_cost');
        $invoice->bag_cost=$request->input('bag_cost');
        $invoice->vehicle_cost=$request->input('vehicle_cost');
        $invoice->rental_cost=$request->input('rental_cost');
        $invoice->other_cost=$request->input('other_cost');
        $invoice->total=$request->input('total');
        $invoice->paid=$request->input('paid');
        $invoice->due= $request->input('paid')==0? 0:$request->input('due');
        //return $invoice->toArray();
       
        $stock =StockIn::where('id', '=', $request->input('stockin_id'))->first();
        if($stock->stock_qty>=$request->input('qty') ||$stock->stock_qty>=$request->input('weight')){
            $invoice->save();
            $update_qty= $stock->stock_qty-$request->input('qty');
            $update_weight= $stock->stock_weight-$request->input('weight');
            
                StockIn::where('id', '=', $request->input('stockin_id'))->update(array(
                    'stock_qty' => $update_qty,
                    'stock_weight' => $update_weight
                   ));
                   toastr()->success('Invoice Save Successfully', 'System Says');
                   return redirect()->route('invoice.index');
        }
       
        toastr()->warning('An Error Occur ', 'System Says');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = SaleInvoice::find($id);
        return view('backend.invoice.invoice',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $purchase=SaleInvoice::find($id);
        
        $supplier= Customer::find($purchase->customer_id);
        //return $supplier;
        $today = Carbon::today();
        $particulars_fee=CustomerDetail::where('customer_id',$purchase->customer_id)->where('invoice_id',$purchase->id)->where('account_type','Dr')->where('section','sale')->get();
        //return $particulars_fee;
        $particulars_bill=CustomerDetail::where('customer_id',$purchase->customer_id)->where('invoice_id',$purchase->id)->where('account_type','Cr')->where('section','paid')->get();
        $details = DB::table('sale_invoices')
            ->join('invoice_details', 'sale_invoices.id', '=', 'invoice_details.invoice_id')
            ->select('sale_invoices.*', 'invoice_details.product_id', 'invoice_details.price','invoice_details.qty')
            ->where('invoice_details.invoice_id','=',$id)
            ->get()
            ->toArray();
        return view('backend.invoice.edit',compact('purchase','particulars_fee','particulars_fee','particulars_bill','today','details','supplier'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice = SaleInvoice::find($id);
        $pay =$request->input('paid');
        $previous_paid=$invoice->paid;
        $previous_due=$invoice->due;
        $paid= $previous_paid+$pay;
        
        $total=$invoice->total;
        $due= $total-$paid;
        if($paid>$total){
            
            toastr()->warning('You have given more paid amount', 'System Says');
            return redirect()->route('invoice.index');
        }

        SaleInvoice::where('id', '=', $id)->update(array(
            'paid' => $paid,
            'due' => $due,
            'status' => $due<=0?1:0
           ));
            toastr()->success('Invoice Updated Successfully', 'System Says');
            return redirect()->route('invoice.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleInvoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleInvoice $invoice)
    {
        
        $details=DB::table('invoice_details')->where('invoice_id',$invoice->id)->get();
       
        foreach($details as $detail)
        {
            $sr_qty_check= Purchase::where('product_id', $detail->product_id)->first();
  
           
            $updated_sr_qty = $sr_qty_check->sr_stock_qty+$detail->qty;
            $updated_sale_qty = $sr_qty_check->sale_qty-$detail->qty;
            Purchase::where('product_id', $detail->product_id)
            ->update(['sr_stock_qty' => $updated_sr_qty,'sale_qty'=>$updated_sale_qty]);

            DB::table('invoice_details')->where('id',$detail->id)->delete();
        }

        $invoice->delete();

        toastr()->warning('Invoice Deleted Successfully', 'System Says');
            return redirect()->route('invoice.index');
       
    }

    public function save(Request $request)
    {
        
        $this->validate($request,[
            'customer_id'=>'required',
            'price'=>'required',
            'qty'=>'required'
        ]);
        
        // return $request;
        $product_id=$request->input('product_id');
        $customer_id=$request->input('customer_id');
        $prices=$request->input('price');
        $quantities=$request->input('qty');
        $advanced=$request->input('advanced');
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
        
        //return $final_data;
        $total=0;
        foreach($final_data as $data){
          $sr_qty_check= Stock::where('product_id', $data['product_id'])->first();

           if($sr_qty_check->sr_qty>=$data['qty']){
               
                 $total+=$data['subtotal'];
           }else{
            toastr()->warning('You entered more quantity.', 'System Says');
            return redirect()->route('invoice.create');
           }
            
        }
        //update the sale qty 
        foreach($final_data as $data){
            $sr_qty_check= Stock::where('product_id', $data['product_id'])->first();
  
             if($sr_qty_check->sr_qty>=$data['qty']){
                $updated_sr_qty = $sr_qty_check->sr_qty-$data['qty'];
                $updated_sale_qty = $sr_qty_check->sale_qty+$data['qty'];
                Stock::where('product_id', $data['product_id'])
                ->update(['sr_qty' => $updated_sr_qty,'sale_qty'=>$updated_sale_qty]);
             }
            
              
              
          }

        $grandTotal=$total;
        $invoice=SaleInvoice::create([
            'date'=>$dateJunk,
            'customer_id'=>$customer_id,
            'advance'=>$advanced,
            'paid'=>$advanced,
            'total'=>$grandTotal
        ]);
       
       
       CustomerDetail::create([
        'date'=>$dateJunk,
        'customer_id'=>$customer_id,
        'invoice_id'=>$invoice->id,
        'particular'=>'Sale Products',
        'amount'=>$grandTotal,
        'account_type'=>'Dr',
        'section'=>'sale',
    ]);
    CustomerDetail::create([
        'date'=>$dateJunk,
        'customer_id'=>$customer_id,
        'invoice_id'=>$invoice->id,
        'particular'=>'Advanced Payment',
        'amount'=>$advanced,
        'account_type'=>'Cr',
        'section'=>'paid',
    ]);
        foreach($final_data as $data){
            
            DB::table('invoice_details')->insert([
                [
                    'product_id' => $data['product_id'],
                    'invoice_id' => $invoice->id,
                    'price'=>$data['price'],
                    'qty'=>$data['qty']
                ]
            ]);
        }

        toastr()->success('Sale Invoice Save Successfully', 'System Says');
        return redirect()->route('invoice.index');
    }
    public function sale_index()
    {
        $invoices=SaleInvoice::all();
        
      // return $invoices;
       // dd($invoices);
        return view('backend.invoice.sale_index',compact('invoices'));
    }
    public function details($id)
    {
      //dd('workinf');
      $invoice=SaleInvoice::find($id);
        $details = DB::table('sale_invoices')
            ->join('invoice_details', 'sale_invoices.id', '=', 'invoice_details.invoice_id')
            ->select('sale_invoices.*', 'invoice_details.product_id', 'invoice_details.price','invoice_details.qty')
            ->where('invoice_details.invoice_id','=',$id)
            ->get()
            ->toArray();
        //return $details;
        return view('backend.invoice.invoice_details',compact('invoice','details'));
    }
    public function delivery($id)
    {
      //dd('workinf');
      $invoice=SaleInvoice::find($id);
        
         $invoice->delivery_status=1;
         $invoice->save();
        return redirect()->back();
    }


}
