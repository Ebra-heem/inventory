<?php

namespace App\Http\Controllers;

use App\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $today = Carbon::today();
       // return $today->format('d/m/Y');
        $dateJunk = $today->format('Y-m-d');
        //return $dateJunk;
        $today_purchase=DB::table('purchases')->whereDate('date',$dateJunk)->sum('total');
        $today_purchase_paid=DB::table('purchases')->whereDate('date',$dateJunk)->sum('paid');
        $today_purchase_due=DB::table('purchases')->whereDate('date',$dateJunk)->sum('due');

        $today_sale=DB::table('sale_invoices')->whereDate('date',$dateJunk)->sum('total');
        $today_sale_paid=DB::table('sale_invoices')->whereDate('date',$dateJunk)->sum('paid');
        $today_sale_due=DB::table('sale_invoices')->whereDate('date',$dateJunk)->sum('due');

        $today_data=[
            'today_purchase'=>$today_purchase,
            'today_purchase_paid'=>$today_purchase_paid,
            'today_purchase_due'=>$today_purchase_due,
            'today_sale'=>$today_sale,
            'today_sale_paid'=>$today_sale_paid,
            'today_sale_due'=>$today_sale_due,
        ];

        //total purchase
        $total=DB::table('purchases')->sum('total');
        $paid=DB::table('purchases')->sum('paid');
        $due=DB::table('purchases')->sum('due');

        $customers=DB::table('customers')->count();
        $purchases=DB::table('purchases')->count();
        $sale_invoices=DB::table('sale_invoices')->count();
        $suppliers=DB::table('suppliers')->count();
        //return $suppliers;
   
        //toastr()->success('Have fun storming the castle!', 'Miracle Max Says');
        return view('backend.home',compact(
        'today_data','total','paid','due','customers','purchases','sale_invoices','suppliers'));
    }
}
