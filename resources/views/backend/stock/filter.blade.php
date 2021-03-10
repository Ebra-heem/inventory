@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
        <div class="section-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Warehouse report</a></li>
            </ol>
        </nav>
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-filter"></i> Filter Category Wise.
                              </button>
                            </h5>
                          </div>
                      
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              @if(Request::routeIs('stock.warehouse'))
                            <form action="{{ route('stock.filter') }}" method="POST">
                                @csrf
                                    <div class="row">
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th>SI.NO</th>
                                              <th>Name</th>
                                              <th>Manage</th>
                                              <th> <input type="checkbox" class="check_all"/> All Select </th>
                                              <th> <div class="col-md-4">
                                                <button type="submit" class="btn btn-info" style="margin-top:28px;"><i class="fas fa-filter"></i> Fillter</button>
                                            </div></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($categories as $item)
                                            <tr>
                                              <td scope="row">{{ $item->id }}</td>
                                              <td>{{ $item->name }}</td>
                                              <td><a class="btn btn-info" href="{{ route('category.show',$item->id) }}">Manage</a></td>
                                              <td><input type="checkbox" class="custom_name" name="category_id[]" value="{{ $item->id }}"/></td>
                                              
                                              <td></td>
                                            </tr> 
                                            @endforeach
                                          </tbody>
                                        </table> 
                                        {{-- @endif --}}
                                    </div>   
                                </form>
                                @endif

                                @if(Request::routeIs('stock.filter'))
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Warehouse Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @php
                                                  $stock_total_wh=0;
                                              @endphp
                                                @foreach($stocks as $product)
                                                <tr>
        
                                                <td>{{$product->code}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->wh_qty}}</td>
                                                @php
                                                  $stock_total_wh+=$product->wh_qty;
                                              @endphp
                                                </tr>

                                                @endforeach
                                                <tr>
                                                  <td ></td>
                                                  <td ><b>Total Warehouse Qty</b></td>
                                                  <td><b>{{ $stock_total_wh }}</b></td>
                                                </tr>
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
  <script>
    $(function () {
     $("#datepicker").datepicker({ 
           autoclose: true, 
           todayHighlight: true
     }).datepicker('update', new Date());
     $("#datepicker2").datepicker({ 
           autoclose: true, 
           todayHighlight: true
     }).datepicker('update', new Date());
   });
   </script>
   <script>
     
    $(".check_all").on("click", function(){
      
        $(".custom_name").each(function(){
            $(this).attr("checked", true);
           
        });
    });
</script>
 
@endsection

