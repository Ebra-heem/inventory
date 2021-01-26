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
                  <li class="breadcrumb-item"><a href="{{ route('purchase.index') }}">Purchase</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <a href="{{route('purchase.create')}}" class="btn btn-success">+ Purchase Create</a>
                        </div>
                        @if(count($purchases)>0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Invoice No</th>
                                            <th>Date</th>
                                            <th>Supplier</th>
                                            <th>Total</th>
                                            <th>Paid</th>
                                            <th>Due</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchases as $invoice)
                                        <tr>
                                        <td>#0{{$invoice->id}}</td>
                                        <td>{{$invoice->date}}</td>
                                        <td>{{$invoice->suppliers->name}}</td>
                                        
                                        <td>{{$invoice->total}}</td>
                                        <td>{{$invoice->paid}}</td>
                                        <td>{{$invoice->due}}</td>
                                        <td><?php
                                        if($invoice->status==1){
                                            echo "<b class='badge badge-pill badge-success mb-1'>Paid</b>";
                                        }else{
                                            echo "<b class='badge badge-pill badge-danger mb-1'>Due</b>";
                                        }
                                        ?></td>
                                        <td>
                                            <a href="{{url('/purchase-details',$invoice->id)}}" class="btn btn-md btn-warning"><i class="fas fa-print"></i>Print</a>
                                            <a href="{{route('purchase.edit',$invoice->id)}}" class="btn btn-md btn-info"><i class="fas fa-eye"></i>Bill Payment</a>
                                            
                                            {!! Form::open(['method' => 'DELETE','route' => ['purchase.destroy', $invoice->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure want to delete this?")']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger fas fa-trash ']) !!}
                                             {!! Form::close() !!}
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
<script>

jQuery(document).ready(function($){
     $('.deleteGroup').on('submit',function(e){
        if(!confirm('Do you want to delete this item?')){
              e.preventDefault();
        }
      });
});
</script>
 
@endsection

