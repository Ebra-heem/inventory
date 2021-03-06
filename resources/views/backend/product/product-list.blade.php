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
                  <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product List</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                       
                        @if(count($products))
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Database ID</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Unit</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Taka</th>
                                            <th>Total Taka</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $t_taka=0;
                                        
                                    @endphp
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->unit}}</td>
                                        <td>{{$product->qty}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->qty*$product->price}}</td>
                                        <td>{{$t_taka+=$product->qty*$product->price}}</td>
                                        
                                        <td>
                                           
                                             <a href="{{route('product.show',$product->id)}}" class="btn btn-md btn-warning"><i class="fas fa-eye"></i>View</a>
                                             <a href="{{route('product.edit',$product->id)}}" class="btn btn-md btn-success"><i class="fas fa-user-edit"></i>Edit</a> 
                                             {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->id],'style'=>'display:inline']) !!}
                                             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                              {!! Form::close() !!}
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @else
                        <p>No Product Available Here!</p>
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

