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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <a href="{{route('sales.index')}}" class="btn btn-success ">Today Sales</a>

                            <div class="ml-5">
                                <form class="form-inline" action="{{ route('sales.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-2 ml-2">
                                        <label>From Date</label>
                                        <div class="input-group">
                                          
                                          <input id="datepicker"  data-date-format="dd/mm/yyyy" name="from" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
                                          @error('date')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                           @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 ml-2">
                                        <label>To Date</label>
                                        <div class="input-group">
                                          
                                          <input id="datepicker"  data-date-format="dd/mm/yyyy" name="to" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
                                          @error('date')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                           @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </form>
                            </div>
                        </div>
                        
                        <hr>
                        @isset($from)
                        <div class="card-body">
                            <center>From {{ $from->format('d/m/Y') }} to {{ $to->format('d/m/Y') }}</center>
                        </div>
                        @endisset
                        <div class="card-body">
                            <div class="row">
                            
                                <div class="col-4">
                                    @if (isset($all_sales))
                                <h4 class="text-info">Total Sales: {{ $all_sales }}</h4>
                                @endif
                                </div>
                                <div class="col-4">
                                    @if (isset($all_sales))
                                    <h4 class="text-success" >Total Paid: {{ $all_paid }}</h4>
                                    @endif
                                </div>
                                
                                <div class="col-4">
                                    @if (isset($all_due))
                                    <h4 class="text-danger">Total Due: {{ $all_sales-$all_paid }}</h4>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        
                        <hr>
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
                                    <tbody>
                                        @foreach($sales as $invoice)
                                        <tr>
                                        <td>#00{{$invoice->id}}</td>
                                        <td>{{$invoice->customers->name}}</td>
                                        <td>{{$invoice->total}}</td>
                                        <td>{{$invoice->paid}}</td>
                                        <td>{{$invoice->due}}</td>
                                        
                                        @if ($invoice->status==1)
                                        <td class="badge badge-success">Paid</td>
                                        @else
                                        <td class="badge badge-danger">Due</td>
                                        @endif
                                        
                                        
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


 
@endsection

