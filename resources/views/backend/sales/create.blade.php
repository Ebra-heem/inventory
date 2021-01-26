@extends('layouts.master')

@section('extra-css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="card card-primary">
<form action="{{route('sales.store')}}" method="post">
    @csrf
      <div class="card-header">
        <h4>Product Stock In from Here..</h4>
      </div>
      <div class="card-body pb-0">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Import Date</label>
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
            <div class="form-group">
              <label>Wirehouse</label>
              <div class="input-group">
                <select name="wirehouse_id" class="form-control @error('buyer_id') is-invalid @enderror">
                  @foreach($wirehouses as $wirehouse)
                  <option value="{{ $wirehouse->id}}">{{ $wirehouse->name}}</option>
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
        </div>
        <div class="row">   
          <div class="col-md-4">
            <div class="form-group">
              <label>Qty</label>
              <div class="input-group">
                <input type="text" name="qty" id="qty"  class="form-control @error('qty') is-invalid @enderror">
                @error('qty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label>Weight per kg</label>
              <div class="input-group">
                <input type="text" name="weight"  id="weight"  class="form-control @error('weight') is-invalid @enderror">
                @error('weight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label>Price per kg</label>
              <div class="input-group">
                <input type="text" name="price" id="price"  class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>    
        </div>
        <div class="row">
          <div class="col-md-4">
            
          </div>  
          <div class="col-md-4">

          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Total</label>
              <div class="input-group">
                <input type="text" name="total" id="total" readonly  class="form-control @error('total') is-invalid @enderror">
                @error('total')
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
      </div>
    </form>
  </div>
@endsection

@section('extra-js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
  $(document).ready(function(){
    $("#weight,#price").on("keyup",function(){
      var qty= $('#weight').val();
      var price= $('#price').val();
      var total= qty*price;
      $('#total').val(total);
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