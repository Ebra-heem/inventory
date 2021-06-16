<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Ledger;
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
    //invoice update code
    public function invoice_edit($id)
    {
       
        $purchase=SaleInvoice::find($id);
        
        $supplier= Customer::find($purchase->customer_id);
        //return $supplier;
        $today = Carbon::today();
        $products= DB::table('stocks')
        ->join('products', 'stocks.product_id', '=', 'products.id')
        ->select('stocks.*', 'products.code')
        ->where('stocks.sr_qty','>',0)
        ->get();
       
        
        //return $products;
        
        $details = DB::table('sale_invoices')
            ->join('invoice_details', 'sale_invoices.id', '=', 'invoice_details.invoice_id')
            ->select('sale_invoices.*', 'invoice_details.product_id', 'invoice_details.price','invoice_details.qty','invoice_details.id')
            ->where('invoice_details.invoice_id','=',$id)
            ->get()
            ->toArray();
        return view('backend.invoice.invoice_edit',compact('purchase','products','details','supplier'));
       
    }

    public function add(Request $request)
    {
        //return $request;
        try {
            $sr_qty_check= Stock::where('product_id', $request->product_id)->first();
            $updated_sr_qty = $sr_qty_check->sr_qty-$request->qty;
            $updated_sale_qty = $sr_qty_check->sale_qty+$request->qty;
            //return $updated_sale_qty;
            DB::table('invoice_details')->insert([
                    'product_id' => $request->product_id,
                    'invoice_id' => $request->invoice_id,
                    'price'=>$request->price,
                    'qty'=>$request->qty
            ]);
            Stock::where('product_id', $request->product_id)
            ->update(['sr_qty' => $updated_sr_qty,'sale_qty'=>$updated_sale_qty]);
            toastr()->success('Invoice Added New Product', 'System Says');
            return redirect()->back();

        } catch (\Throwable $th) {
            throw $th->getMessage();
        }

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
        $dateJunk=Carbon::now()->format('Y-m-d');
        //return $dateJunk;
        SaleInvoice::where('id', '=', $id)->update(array(
            'total' => $request->total,
            'discount' => $request->discount,
            'advance' => $request->advance,
            'paid' => $request->advance,
            'due' => $request->due
           ));
           $customer_dr=CustomerDetail::where('customer_id',$request->customer_id)
                                    ->where('invoice_id',$id)
                                    ->where('account_type','Dr')
                                    ->first();
            $customer_dr->update(array('amount'=>$request->total));
            $customer_cr=CustomerDetail::where('customer_id',$request->customer_id)
                                    ->where('invoice_id',$id)
                                    ->where('account_type','Cr')
                                    ->first();
            if(isset($customer_cr)){
                $customer_cr->update(array('amount'=>$request->advance));
            }else{
                if($request->advance>0){
                    CustomerDetail::create([
                        'date'=>$dateJunk,
                        'customer_id'=>$request->customer_id,
                        'invoice_id'=>$id,
                        'particular'=>'Advanced Payment',
                        'amount'=>$request->advance,
                        'account_type'=>'Cr',
                        'section'=>'paid',
                    ]);
                }
            }
            
            toastr()->warning('Invoice Updated', 'System Says');
            return redirect()->route('invoice.index');
        
       // $invoice = SaleInvoice::find($id);
        // $pay =$request->input('paid');
        // $previous_paid=$invoice->paid;
        // $previous_due=$invoice->due;
        // $paid= $previous_paid+$pay;
        
        // $total=$invoice->total;
        // $due= $total-$paid;
        // if($paid>$total){
            
        //     toastr()->warning('You have given more paid amount', 'System Says');
        //     return redirect()->route('invoice.index');
        // }

        // SaleInvoice::where('id', '=', $id)->update(array(
        //     'paid' => $paid,
        //     'due' => $due,
        //     'status' => $due<=0?1:0
        //    ));
        //     toastr()->success('Invoice Updated Successfully', 'System Says');
        //     return redirect()->route('invoice.index');

    }

    public function delete_item($id)
    {
       try {
           // return $id;
        $product= DB::table('invoice_details')->where('id',$id)->get();
        
        $sr_qty_check= Stock::where('product_id', $product[0]->product_id)->first();
        //return $sr_qty_check;
           
            $updated_sr_qty = $sr_qty_check->sr_qty+$product[0]->qty;
            $updated_sale_qty = $sr_qty_check->sale_qty-$product[0]->qty;
            Stock::where('product_id', $product[0]->product_id)
            ->update(['sr_qty' => $updated_sr_qty,'sale_qty'=>$updated_sale_qty]);
            DB::table('invoice_details')->where('id',$id)->delete();
            toastr()->success(' Deleted  Product from Invoice', 'System Says');
            return redirect()->back();
       } catch (\Throwable $th) {
           return  $th->getMessage();
       }
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
        $discount=$request->input('discount');
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
        
        
        $total=0;
        
        $actual_price=0;
        foreach($final_data as $data){
          $sr_qty_check= Stock::where('product_id', $data['product_id'])->first();

           if($sr_qty_check->sr_qty>=$data['qty']){
                $actual_price+=$sr_qty_check->avg*$data['qty'];
                // $sell_price+=$data['price']*$data['qty'];
                // $profit+=$sell_price-$actual_price;
                 $total+=$data['subtotal'];
           }else{
            toastr()->warning('You entered more quantity.', 'System Says');
            return redirect()->route('invoice.create');
           }
            
        }
        
        $profit= $total-$actual_price;
        //return 'buy:'.$actual_price.' sell'.$total.'='.$profit;
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

        $grandTotal=$total-$discount;
        $invoice=SaleInvoice::create([
            'date'=>$dateJunk,
            'customer_id'=>$customer_id,
            'discount'=>$discount,
            'advance'=>$advanced,
            'paid'=>$advanced,
            'total'=>$grandTotal,
            'user_id'=>auth()->user()->id
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
        if($advanced>0){
            CustomerDetail::create([
                'date'=>$dateJunk,
                'customer_id'=>$customer_id,
                'invoice_id'=>$invoice->id,
                'particular'=>'Advanced Payment',
                'amount'=>$advanced,
                'account_type'=>'Cr',
                'section'=>'paid',
            ]);
        }
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

        //BS Account Receivable Dr

        Ledger::create([
            'date'=>$dateJunk,
            'chart_account_id'=>'9',
            'customer_id'=>$customer_id,
            'particular'=>'Sale Invoice Account Receivable',
            'amount'=>$grandTotal,
            'account_type'=>'Dr',
            'sale_invoice_id'=>$invoice->id,
        ]);
        //IS Inventory Sale Cr

        Ledger::create([
            'date'=>$dateJunk,
            'chart_account_id'=>'4',
            'customer_id'=>$customer_id,
            'particular'=>'Sale Invoice Inventory Sale',
            'amount'=>$grandTotal,
            'account_type'=>'Cr',
            'sale_invoice_id'=>$invoice->id,
        ]);

        //BS Inventory on Hand Cr

        Ledger::create([
            'date'=>$dateJunk,
            'chart_account_id'=>'3',
            'customer_id'=>$customer_id,
            'particular'=>'Sale Invoice Inventory on Hand Cr',
            'amount'=>$actual_price,
            'account_type'=>'Cr',
            'sale_invoice_id'=>$invoice->id,
            ]);

                //BS Inventory Cost Dr

                Ledger::create([
                    'date'=>$dateJunk,
                    'chart_account_id'=>'15',
                    'customer_id'=>$customer_id,
                    'particular'=>'Sale Invoice-Inventory Cost',
                    'amount'=>$actual_price,
                    'account_type'=>'Dr',
                    'sale_invoice_id'=>$invoice->id,
                    ]);

            //BS Retained Earning Cr

            Ledger::create([
                'date'=>$dateJunk,
                'chart_account_id'=>'13',
                'customer_id'=>$customer_id,
                'particular'=>'Sale Invoice-Retained Earning',
                'amount'=>$profit,
                'account_type'=>'Cr',
                'sale_invoice_id'=>$invoice->id,
                ]);

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
