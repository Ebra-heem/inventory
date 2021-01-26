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
                                <i class="fas fa-filter"></i> Fillter by Date and Product types..
                              </button>
                            </h5>
                          </div>
                      
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                            <form action="{{route('productbuy.filter')}}" method="POST">
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
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fas fa-filter"></i> Fillter by Date and Buyers wise..
                              </button>
                            </h5>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <form action="{{route('productbuy.filter')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group">
                                              
                                              <input id="datepicker2"  data-date-format="dd/mm/yyyy" name="date" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
                                              @error('date')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                               @enderror
                                            </div>
                                          </div>
                                        </div>
                                        <input type="hidden" name="type" value="2">
                                        <div class="col-md-3">
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
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>Buyer Name</label>
                                            <div class="input-group">
                                              <select name="buyer_id" class="form-control @error('buyer_id') is-invalid @enderror">
                                                @foreach($buyers as $buyer)
                                                <option value="{{ $buyer->id}}">{{ $buyer->name}}</option>
                                                @endforeach
                                              </select>
                                              @error('buyer_id')
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
                                      
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            @if(count($product_buys)>0)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Date:  || Product Name:
                            {{-- @php
                                $product=App\Product::where('id',$product_id)->first();
                                
                            @endphp
                            {{$product->name}} --}}
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Paid</th>
                                            <th>Due</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product_buys as $product)
                                        <tr>
                                        <td>{{$product->vendor_name}}</td>
                                        <td>{{$product->qty}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->total}}</td>
                                        <td>{{$product->paid}}</td>
                                        <td>{{$product->due}}</td>
                                        <td><?php
                                        if($product->status==1){
                                            echo "<b class='badge badge-pill badge-success mb-1'>Paid</b>";
                                        }else{
                                            echo "<b class='badge badge-pill badge-danger mb-1'>Due</b>";
                                        }
                                        ?></td>
                                        <td> <a href="{{route('productbuy.edit',$product->id)}}" class="text-success">Edit</a>|| <a href="#" class="text-danger">Delete</a></td>
                                        </tr>
                                        @endforeach
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
 
@endsection

