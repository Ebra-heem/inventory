@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
        <div class="section-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('stock.index') }}">Summary</a></li>
            </ol>
        </nav>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3>Warehouse Summary Report</h3>
                        </div>
                        @if (Request::routeIs('warehouse.summary'))
                            
                        <table class="table">
                          <thead>
                            <tr>
                              <th>SI.NO</th>
                              <th>Name</th>
                              <th>Without Purchase Rate (Qty)</th>
                              <th>With Purchase Rate(Qty)</th>
                             
                              <th>Total Qty</th>
                              <th>Total Price</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                  $without_purchase_qty=0;
                                  $with_purchase_qty=0;
                                  $avg_price=0;
                                  $total_qty=0;
                                  $total_price=0;
                                  $f_price=0;
                                  $f_qty=0;
                              @endphp
                            @foreach ($categories as $item)
                            <tr>
                              <td scope="row">{{ $item->id }}</td>
                              <td>{{ $item->name }}</td>
                                @php
                                    $without_purchase_qty= DB::table('products')
                                            ->join('stocks', 'products.id', '=', 'stocks.product_id')
                                            ->select('stocks.wh_qty', 'products.category_id','products.price')
                                            ->where('products.category_id',$item->id)
                                            ->where('products.price',0)
                                            ->sum('stocks.wh_qty');
                                    $with_purchase_qty= DB::table('products')
                                            ->join('stocks', 'products.id', '=', 'stocks.product_id')
                                            ->select('stocks.wh_qty', 'products.category_id','products.price')
                                            ->where('products.category_id',$item->id)
                                            ->where('products.price','!=','0')
                                            ->sum('stocks.wh_qty');
                                     $avg_price= DB::table('products')
                                            ->join('stocks', 'products.id', '=', 'stocks.product_id')
                                            ->select('stocks.wh_qty', 'products.category_id','products.price')
                                            ->where('products.category_id',$item->id)
                                            
                                            ->avg('products.price');
                                @endphp
                              <td>{{ $without_purchase_qty }}</td>
                              <td>{{ number_format($with_purchase_qty,2) }}</td>
                              <td>{{ $total_qty=$with_purchase_qty+$without_purchase_qty }}</td>
                              <td>{{ number_format($total_price=$avg_price*$total_qty,2) }}</td>
                              @php
                                  
                                  $f_price+=$total_price;
                              @endphp

                            </tr> 
                            @endforeach
                            
                            <tr>
                                <td></td>
                                <td><b>Total </b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td><b>{{ number_format($f_price,2) }}</b></td>
                            </tr>
                          </tbody>
                        </table>
                            
                        @endif
                        

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('extra-js')
 
  <script src="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="{{asset('admin/')}}/assets/js/page/datatables.js"></script>

 
@endsection

