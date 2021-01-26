@extends('layouts.master')

@section('extra-css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
<div class="card card-primary">
<form action="{{route('stock.store')}}" method="post">
    @csrf
      <div class="card-header">
        <h4 class="text-info">Create Stock Invoice</h4>
      </div>
      <div class="card-body pb-0">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Product Name</label>
              <div class="input-group">
                <select name="product_id" class="form-control product @error('product_id') is-invalid @enderror">
                
                  @foreach($products as $product)
                  <option value="{{ $product->id}}">{{ $product->code}} {{ $product->name}} -[unit: {{ $product->unit}}]</option>
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
            <div class="form-group">
              <label>Wirehouse Qty</label>
              <div class="input-group">
                <input type="text" name="wh_qty" class="form-control"/>
                @error('product_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Wirehouse</label>
              <div class="input-group">
                <select name="wirehouse_id" class="form-control product @error('wirehouse_id') is-invalid @enderror">
                  <option></option>
                  @foreach($wirehouses as $wirehouse)
                  <option value="{{ $wirehouse->id}}">{{ $wirehouse->name}} </option>
                  @endforeach
                </select>
                @error('wirehouse_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
              <label>Rack</label>
              <div class="input-group">
                <select name="rack_id" class="form-control product @error('rack_id') is-invalid @enderror">
                  <option></option>
                  @foreach($racks as $rack)
                  <option value="{{ $rack->id}}">{{ $rack->rack_no}} </option>
                  @endforeach
                </select>
                @error('rack_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>
        </div>



      </div>
      <div class="card-footer pt-">
        <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Save</button>
        <a href="{{ route('purchase.create') }}" class="btn btn-info"> <i class="fas fa-sync-alt"></i> Refresh</a>
      </div>
    </form>
  </div>
@endsection

@section('extra-js')
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script>


  $(document).ready(function(){
    $("#qty,#price").on("keyup",function(){
      var qty= $('#qty').val();
      var price= $('#price').val();
      var total= qty*price;
      $('#total').val(total);
    });

    $('.product').on("change",function(){
      
      var total= $('.product').val();
      //alert(total);
      
    });
  });
</script>
<script>
 $(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

</script>
@endsection