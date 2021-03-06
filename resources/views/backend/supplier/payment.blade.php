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
                         @if (count($suppliers)>0) 
                            <form action="{{ route('supplier.paymentList') }}" method="POST">
                            @csrf
                            <div class="card-header">
                                <select name="suplier_id" class="form-control select2" >
                                    <option >Select a Supplier</option>
                                     @foreach ($suppliers as $customer)
                                     <option value="{{$customer->id}}">{{$customer->name}}</option>  
                                     @endforeach
                                    </select>
                                <button type="submit" class="btn btn-lg btn-info">Find</button> 
                            </div>
                        </form>
                        @endif 

                        @if(count($invoices)>0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th># Invoice No</th>   
                                            <th>Supplier</th>
                                            <th>Total</th>
                                            <th>Paid</th>
                                            <th>Due</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoices as $invoice)
                                        <tr>
                                        <td>#00{{$invoice->id}}</td>
                                      
                                       
                                        <td>{{$invoice->suppliers->name}}</td>
                                        <td>{{$invoice->total}}</td>
                                        <td>{{$invoice->paid}}</td>
                                        <td>{{$invoice->due}}</td>
                                        @if ($invoice->status==1)
                                        <td class="badge badge-success">Paid</td>
                                        @else
                                        <td class="badge badge-danger">Due</td>
                                        @endif
                                        
                                        <td>
                                            <a href="{{url('/purchase-details',$invoice->id)}}" class="btn btn-md btn-warning"><i class="fas fa-print"></i>Print</a>
                                            <a href="{{route('purchase.edit',$invoice->id)}}" class="btn btn-md btn-info"><i class="fas fa-eye"></i>Bill Payment</a>
                                            
                                            {{-- {!! Form::open(['method' => 'DELETE','route' => ['purchase.destroy', $invoice->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure want to delete this?")']) !!}
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

