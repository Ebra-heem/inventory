@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <a href="{{route('stockout.index')}}"  class="btn btn-primary ml-10">Back</a><br>
                        <h4 class="text-center"> Delivery List Date of {{$date}} and 
                            Total Weight:<span class="text-success"> kg</span> 
                            Total Price: <span class="text-info">  Taka</span> Avarage Price: </h4>
                        </div>

                        @if(count($stockouts)>0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Product Name</th>
                                            <th>Buyer Name</th>
                                            <th>Lot</th>
                                            <th>Bags</th>
                                            <th>Weight</th>
                                            <th>Price</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stockouts as $stock)
                                        <tr>
                                        <td>{{$stock->delivery_date}}</td>
                                        @php
                                            $product= \App\Product::where('id',$stock->product_id)->first();
                                            $buyer= \App\Vendor::where('id',$stock->vendor_id)->first();
                                        @endphp
                                        <td>{{ $product->name}}</td>
                                        <td>{{ $buyer->company_name}}</td>
                                        <td>{{$stock->lot}} </td>
                                        <td>{{$stock->bag}}</td>
                                        <td>{{$stock->weight}}</td>
                                        <td>{{$stock->price}}</td>
                                        <td>{{$stock->note}}</td>
                                        <td> <a href="{{route('stockout.edit',$stock->id)}}" class="btn btn-warning">Edit</a> 
                                           </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

