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
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                        <p> Wirehouse to Showroom Transfer </p>
                        <br>

                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <td>Wh qty</td>
                                    <td>{{ $stock->wh_qty }}</td>
                                </tr>

                                <tr>
                                    <td>Showroom Qty</td>
                                    <td>{{ $stock->sr_qty }}</td>
                                </tr>

                                <tr>
                                    <td>Sale Qty</td>
                                    <td>{{ $stock->sale_qty }}</td>
                                </tr>
                            </table>
                        </div>
                       
                       
                    </div>
                </div>

                <div class="col-4">
                    <form action="{{ route('stock.transfer') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">Enter Showroom Qty: </span>
                            </div>
                            <input type="text" name="sr_qty" class="form-control" value="{{ $stock->wh_qty }}" aria-describedby="inputGroup-sizing-sm">
                            <input type="hidden" name="stock_id" class="form-control" value="{{ $stock->id }}" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            
                            <button type="submit" class="form-control btn btn-danger">Transfer wirehouse to showroom</button>
                        </div>
                    </form>
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

