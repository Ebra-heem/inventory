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
                  <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Suppliers</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4>Total Dues: {{ $all_due }}</h4>
                        </div>
                        @if(count($purchases)>0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Purchase Date</th>
                                           
                                            <th>Supplier</th>
                                            <th>Total</th>
                                            <th>Paid</th>
                                            <th>Due</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchases as $product)
                                        <tr>
                                        <td>{{$product->date}}</td>
                                        
                                        <td>{{$product->suppliers->name}}</td>
                                        <td>{{$product->total}}</td>
                                        <td>{{$product->paid}}</td>
                                        <td>{{$product->due}}</td>
                                        <td><?php
                                        if($product->status==1){
                                            echo "<b class='badge badge-pill badge-success mb-1'>Paid</b>";
                                        }else{
                                            echo "<b class='badge badge-pill badge-danger mb-1'>Due</b>";
                                        }
                                        ?></td>
                                        <td>
                                            <a href="{{url('/purchase-details',$product->id)}}" class="btn btn-md btn-warning"><i class="fas fa-print"></i>Print</a>
                                            {{-- <a href="{{route('invoice.edit',$product->id)}}" class="btn btn-md btn-info"><i class="fas fa-eye"></i>Edit</a>
                                            
                                            {!! Form::open(['method' => 'DELETE','route' => ['purchase.destroy', $product->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure want to delete this?")']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger fas fa-trash ']) !!}
                                             {!! Form::close() !!} --}}
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

