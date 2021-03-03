@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
      <h3>Purchase Report</h3>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        {{-- <div class="card">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-filter"></i> Fillter by Date and Product types..
                              </button>
                            </h5>
                          </div>
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                            <form action="{{route('purchase.filter')}}" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Date</label>
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
                                        <input type="hidden" name="type" value="1">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Product Name</label>
                                            <div class="input-group">
                                              <select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
                                                @foreach($products as $product)
                                                <option value="{{ $product->id}}">{{ $product->name}}</option>
                                                @endforeach
                                              </select>
                                              @error('product_id')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                               @enderror
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-info" style="margin-top:28px;"><i class="fas fa-filter"></i> Fillter</button>
                                        </div>

                                    </div>
                                      
                                </form>
                            </div>
                          </div>
                        </div> --}}

                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fas fa-filter"></i> Fillter by Date and Category wise..
                              </button>
                            </h5>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <form action="{{route('purchase.filter')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>From Date</label>
                                            <div class="input-group">
                                              
                                              <input id="datepicker"  data-date-format="dd/mm/yyyy" name="from_date" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
                                              @error('date')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                               @enderror 
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>To Date</label>
                                            <div class="input-group">
                                              
                                              <input id="datepicker2"  data-date-format="dd/mm/yyyy" name="to_date" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
                                              @error('date')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                               @enderror
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-info" style="margin-top:28px;"><i class="fas fa-filter"></i>Filter</button>
                                        </div>
                                    </div>
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th>SI.NO</th>
                                          <th>Name</th>
                                          <th> <input type="checkbox" class="check_all"/> All Select </th>
                                         
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($categories as $item)
                                        <tr>
                                          <td scope="row">{{ $item->id }}</td>
                                          <td>{{ $item->name }}</td>
                          
                                          <td><input type="checkbox" class="custom_name" name="category_id[]" value="{{ $item->id }}"/></td>
                                          
                                          <td></td>
                                        </tr> 
                                        @endforeach
                                        
                                        
                                      </tbody>
                                    </table>
                                      
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            @if(count($purchase_lists)>0)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          @if (isset($from_dateJunk))
                          <h4 class="text-center">Purchase Products List from:{{ $from_dateJunk }} to {{ $to_dateJunk }}</h4>
                          @else
                             <h4 class="text-center"> All Purchase Products List:</h4>
                          @endif
                            
                            
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                      <tr>
                                        <td>SI.No</td>
                                        <td>Date</td>
                                        <td>Code</td>
                                        <td>Name</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                        <td>Amount</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $total=0;
                                          $qty=0;
                                          $price=0;
                                      @endphp
                                      @foreach ($purchase_lists as $item)
                                      <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $qty+=$item->purchase_qty }} ({{ $item->unit }})</td>
                                        <td>{{ $price+=$item->buy_price }}</td>
                                        <td>{{ $total+=$item->purchase_qty*$item->buy_price }}</td>
                                      </tr>
                                      @endforeach
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total </b></td>
                                        <td><b>{{ $qty }}</b></td>
                                        <td><b>{{ $price }}</b></td>
                                        <td><b>{{ $total }}</b></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                        
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif
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

