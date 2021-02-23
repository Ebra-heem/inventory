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
               <div class="col-md-4">
                <div class="card border-light mb-3">
                    <div class="card-header">Supplier Information</div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $supplier->name }}</h5>
                      <p class="card-text ">
                          Phone: {{ $supplier->phone }}<br>
                        Address: {{ $supplier->address }}<br>
                        Created At: {{ $supplier->created_at }}<br>
                    </p>
                    </div>
                </div>
                <div class="card border-light mb-3">
                    <div class="card-header">Transaction Information</div>
                    <div class="card-body">
                      <p>Total Payable Amount: <span class="badge badge-info">{{ $total }}</span></p>
                      <p>Total Paid Amount: <span class="badge badge-success">{{ $paid }}</span></p>
                      <p>Total Due Amount: <span class="badge badge-danger">{{ $due }}</span></p>
                    </div>
                </div>
               </div>
               <div class="col-md-8">
                <div class="card border-light mb-3">
                    <div class="card-header">Supplier Ledger</div>
                @if(count($purchases)>0)
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Particulars</th>
                                    
                                    <th>Debit(Dr)</th>
                                    <th>Credit(Cr)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchases as $product)
                                <tr>
                                <td>{{$product->date}}</td>
                                <td>{{$product->particular}}</td>
                                @if ($product->account_type=='Dr')
                                    <td> {{$product->amount}} </td>
                                @else
                                <td></td>
                                <td>{{$product->amount}}</td> 
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

