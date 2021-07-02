@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
        <div class="section-body">
            <div class="alert alert-primary" role="alert">
                <h3 class="text-center">All Vouchers</h3>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            
                          <a href="{{route('voucher.create')}}" class="btn btn-success">+ Create Voucher</a>
                        </div>
                       
                        @if(count($vouchers))
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Voucher No</th>                                            
                                            <th>Voucher Type</th>                                            
                                            <th>Payment Type</th>                                            
                                            <th>Narration</th>                                          
                                            <th>Action</th>                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vouchers as $item)
                                        <tr>
                                        <td>{{$item->date}}</td>
                                        <td>{{$item->voucher_number}}</td>
                                        <td>{{$item->voucher_type}}</td>
                                        <td>{{$item->payment_type}}</td>
                                        <td>{{$item->narration}}</td>
                                        <td>
                                            
                                             <a href="{{route('voucher.show',$item->id)}}" class="btn btn-md btn-info"><i class="fas fa-print"></i></a>
                                           
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
            <div class="row">
              
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

