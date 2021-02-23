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
                        <div class="card-header">
                      
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            +ADD Stock
                          </button>
                        </div>
                        @if(count($stocks)>0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Total Qty</th>
                                            <th>Price/Taka</th>
                                            <th>Wirehouse Qty</th>
                                            <th>Showroom Qty</th>
                                            <th>Sale Qty</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stocks as $product)
                                        <tr>

                                        <td>{{$product->products->code}}</td>
                                        <td>{{$product->products->name}}</td>
                                        <td>{{$product->total_qty}} ({{$product->products->unit}})</td>
                                        <td>{{$product->purchase_price}}</td>
                                        
                                        <td>{{$product->wh_qty}} ({{$product->products->unit}})</td>
                                        <td>{{$product->sr_qty}}</td>
                                        <td>{{$product->sale_qty}}</td>
                                       
                                        
                                        <td>
                                            <a href="{{route('stock.show',$product->id)}}" class="btn btn-warning">Transfer <i class="fas fa-redo"></i> Showroom</a>

                                            <a href="{{ route('stock.edit',$product->id) }}" title="Update Stock" data-toggle="modal" data-target="#myEditModal{{ $product->id }}" class="text-info"><em class="fa fa-2x fa-edit mr-1"></em></a>

                                            {!! Form::open(['method' => 'DELETE','route' => ['stock.destroy', $product->id],'style'=>'display:inline']) !!}
                                             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                              {!! Form::close() !!}
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

        <!--Create Modal -->
      <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stock Info Add <small>(* fields are required)</small></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div>
                      <form action="{{route('stock.store')}}" method="post">
                          @csrf
                            <div class="card-header">
                              <h4>Stock Entry Form</h4>
                            </div>
                            <div class="card-body pb-0">
                              <div class="form-group">
                                <label>Product(*)</label>
                                <div class="input-group">
                                  <select name="product_id" class="form-control select2" style="width: 600px!important;" required>
                                      @foreach ($products as $item)
                                          <option value="{{ $item->id }}">{{ $item->code }}-{{ $item->name }}</option>
                                    
                                      @endforeach
                                      
                                  </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label>Wirehouse(*)</label>
                                  <div class="input-group">
                                    <select name="wirehouse_id" class="form-control select2" style="width: 600px!important;" required>
                                        @foreach ($wirehouses as $wh)
                                            <option value="{{ $wh->id }}">{{ $wh->name }}</option>
                                      
                                        @endforeach
                                        
                                    </select>
                                    </div>
                              </div>
                              <div class="form-group">
                                <label>Wirehouse Qty(*)</label>
                                <div class="input-group">
                                  
                                  <input type="text" name="wh_qty" class="form-control @error('wh_qty') is-invalid @enderror" required>
                                  <input type="hidden" name="total_qty" >
                                  @error('wh_qty')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>
                
                              <div class="form-group">
                                <label>Purchase Price</label>
                                <div class="input-group">
                                  <input type="text" name="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror">
                                  @error('purchase_price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group">
                                  <label>Showroom Qty</label>
                                  <div class="input-group">
                                    <input type="text" name="showroom_qty" class="form-control @error('showroom_qty') is-invalid @enderror">
                                    @error('showroom_qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label>Sales Qty</label>
                                  <div class="input-group">
                                    <input type="text" name="sale_qty" class="form-control @error('sale_qty') is-invalid @enderror">
                                    @error('sale_qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                              </div>

                            </div>
                            <div class="card-footer pt-">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Save</button>
                            </div>
                          </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      @foreach ($stocks as $product)
                                  <!--Edit Modal -->
        <div class="modal fade" id="myEditModal{{ $product->id }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stock Info Edit <small>(* fields are required)</small></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div>
                      <form action="{{route('stock.update',$product->id)}}" method="post">
                          @csrf
                          @method('PUT')
                            <div class="card-header">
                              <h4>Stock Update Form</h4>
                            </div>
                            <div class="card-body pb-0">
                              <div class="form-group">
                                <label>Product(*)</label>
                                <div class="input-group">
                                  <select name="product_id" class="form-control select2" style="width: 600px!important;" required>
                                      @foreach ($products as $item)
                                          <option @if ($item->id==$product->product_id)
                                              selected
                                          @endif value="{{ $item->id }}">{{ $item->code }}-{{ $item->name }}</option>
                                     
                                      @endforeach
                                      
                                  </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label>Wirehouse(*)</label>
                                  <div class="input-group">
                                    <select name="wirehouse_id" class="form-control select2" style="width: 600px!important;" required>
                                        @foreach ($wirehouses as $wh)
                                            <option @if ($wh->id==$product->wirehouse_id)
                                              selected
                                          @endif value="{{ $wh->id }}">{{ $wh->name }}</option>
                                       
                                        @endforeach
                                        
                                    </select>
                                    </div>
                                </div>
                              <div class="form-group">
                                <small>Total Qty: {{ $product->total_qty }}</small>
                                <label>Wirehouse Qty(*)</label>
                                <div class="input-group">
                                  
                                  <input type="text" name="wh_qty" value="{{ $product->wh_qty }}" class="form-control @error('wh_qty') is-invalid @enderror" required>
                                  @error('wh_qty')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>
                
                              <div class="form-group">
                                <label>Price</label>
                                <div class="input-group">
                                  <input type="text" name="purchase_price" value="{{ $product->purchase_price }}" class="form-control @error('purchase_price') is-invalid @enderror">
                                  @error('purchase_price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group">
                                  <label>Showroom Qty</label>
                                  <div class="input-group">
                                    <input type="text" name="showroom_qty" value="{{ $product->sr_qty }}" class="form-control @error('showroom_qty') is-invalid @enderror">
                                    @error('showroom_qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                </div>
      
                              <div class="form-group">
                                  <label>Sales Qty</label>
                                  <div class="input-group">
                                    <input type="text" name="sale_qty" value="{{ $product->sale_qty }}" class="form-control @error('sale_qty') is-invalid @enderror">
                                    @error('sale_qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                </div>
      
                            </div>
                            <div class="card-footer pt-">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Save</button>
                            </div>
                          </form>
                </div>
              </div>
      
            </div>
          </div>
        </div>
      @endforeach

      </div>


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

