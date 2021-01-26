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
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Library</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
              </nav>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <p> Purchase & Stock Information</p>
                        <br>
                        <h3 class="text-center">Total Purchase Qty: {{ $total_purchase_qty }}</h3>
                        
                        </div>
                        
                        @if(count($purchases)>0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Supplier</th>
                                            <th>Purchase Qty</th>
                                            <th>Price</th>
                                            <th>Purchase Due</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchases as $product)
                                        <tr>
                                        <td>{{$product->date}}</td>
                                        <td>{{$product->products->code}}</td>
                                        <td>{{$product->products->name}}</td>
                                        <td>{{$product->suppliers->name}}</td>
                                        <td>{{$product->purchase_qty}}</td>
                                        <td>{{$product->buy_price}}</td>
                                        <td>{{$product->due}}</td>
                                        <td><?php
                                        if($product->status==1){
                                            echo "<b class='badge badge-pill badge-success mb-1'>Paid</b>";
                                        }else{
                                            echo "<b class='badge badge-pill badge-danger mb-1'>Due</b>";
                                        }
                                        ?></td>
                                       
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                       
                    </div>
                </div>

                {{-- <div class="col-4">
                    <form action="{{ route('purchase.transfer') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">Enter Showroom Qty: </span>
                            </div>
                            <input type="text" name="sr_stock_qty" class="form-control" value="" aria-describedby="inputGroup-sizing-sm">
                            <input type="hidden" name="purchase_id" class="form-control" value="" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            
                            <button type="submit" class="form-control btn btn-danger">Transfer wirehouse to showroom</button>
                        </div>
                    </form>
                </div> --}}
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

