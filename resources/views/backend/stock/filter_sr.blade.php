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
                              @if(Request::routeIs('stock.showroom'))
                            <form action="{{ route('stock.filter_sr') }}" method="POST">
                                @csrf
                                    <div class="row">
                                        {{-- <div class="col-md-4">
                                          <div class="form-group">
                                            <label>From Date</label>
                                            <div class="input-group">
                                              <input id="datepicker"  data-date-format="dd/mm/yyyy" name="date" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
                                              @error('date')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                               @enderror
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>To Date</label>
                                            <div class="input-group">
                                              <input id="datepicker2"  data-date-format="dd/mm/yyyy" name="date" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
                                              @error('date')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                               @enderror
                                            </div>
                                          </div>
                                        </div> --}}
                                        
                                        {{-- @if (Request::routeIs('stock.index')) --}}
                            
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
                                              <input type="hidden"  name="report_type" value="{{ $report_type }}"/>
                                              <td></td>
                                            </tr> 
                                            @endforeach
                                          </tbody>
                                        </table> 
                                        {{-- @endif --}}
                                    </div>   
                                </form>
                                @endif

                                @if(Request::routeIs('stock.filter_sr'))
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    {{-- <th>Total Qty</th> --}}
                                                    {{-- <th>Price</th> --}}
                                                    {{-- <th>Avg Price</th>
                                                    <th>Total Taka</th> --}}
                                                    
                                                    
                                                   
                                                    <th>Showroom Qty</th>
                                                 

                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($stocks as $product)
                                                <tr>
        
                                                <td>{{$product->code}}</td>
                                                <td>{{$product->name}}</td>
                                                {{-- <td>{{$product->total_qty}} </td> --}}
                                                {{-- <td>{{$product->purchase_price}}</td> --}}
                                                {{-- <td>{{$product->avg}}</td>
                                                <td>{{$product->total_qty*$product->avg}}</td> --}}
                                             
                                                <td>{{$product->sr_qty}}</td>

                                                {{-- 
                                                <td>{{$product->sale_qty}}</td> --}}
                                               
                                                
                                                {{-- <td>
                                                    <a href="{{route('stock.show',$product->id)}}" title="Transfer warehouse to Showroom" class="btn btn-warning"> <i class="fas fa-redo"></i></a>
        
                                                    <a href="{{ route('stock.edit',$product->id) }}" title="Update Stock" data-toggle="modal" data-target="#myEditModal{{ $product->id }}" class="text-info"><em class="fa fa-2x fa-edit mr-1"></em></a>
        
                                                    {!! Form::open(['method' => 'DELETE','route' => ['stock.destroy', $product->id],'style'=>'display:inline']) !!}
                                                     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                      {!! Form::close() !!}
                                                </td> --}}
                                                </tr>

                                                @endforeach
                                                <tr>
                                                  <td ></td>
                                                  <td ><b>Total Showroom Qty</b></td>
                                                  <td><b>{{ $stock_total_sr }}</b></td>
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

