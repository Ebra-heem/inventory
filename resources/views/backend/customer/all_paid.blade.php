@extends('layouts.master')
@section('extra-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

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
                  <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customers</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Customer Paid List</h4>
                        </div>
                        @if(count($sales)>0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th># Invoice No</th>
                                            
                                            <th>Customer</th>

                                            <th>Total</th>
                                            <th>Paid</th>
                                            <th>Due</th>
                                            <th>Status</th>
                                   
                                        </tr>
                                    </thead>
                                    @php
                                        $paid_total=0;
                                    @endphp
                                    <tbody>
                                        @foreach($sales as $invoice)
                                        <tr>
                                        <td>#00{{$invoice->id}}</td>
                                      
                                       
                                        <td>{{$invoice->customers->name}}</td>
                                        <td>{{$invoice->total}}</td>
                                        <td>{{$paid_total+=$invoice->paid}}</td>
                                        <td>{{$due_total+=$invoice->total-$invoice->paid}}</td>
                                        
                                        @if ($invoice->status==1)
                                        <td class="badge badge-success">Paid</td>
                                        @else
                                        <td class="badge badge-danger">Due</td>
                                        @endif

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tr>
                                        <td>Total:</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $paid_total }}</td>
                                        <td></td>
                                    </tr>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


 
@endsection

