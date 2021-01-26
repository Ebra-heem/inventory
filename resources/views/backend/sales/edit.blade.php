@extends('layouts.master')

@section('content')
<div class="card card-primary">
<form action="{{route('productbuy.update',$product->id)}}" method="post">
    @csrf
    {{ method_field('PUT') }}
      <div class="card-header">
      <h4>Bill  for {{$product->vendor_name}}</h4>
      </div>
      <div class="card-body pb-0">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Total</label>
              <div class="input-group">
                
              <input type="text" id="total" name="total" readonly value="{{$product->total}}" class="form-control @error('total') is-invalid @enderror" placeholder="Name">
                @error('total')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Paid</label>
              <div class="input-group">
              <input type="text" name="paid" id="paid" value="{{$product->paid}}" class="form-control @error('paid') is-invalid @enderror" placeholder="Paid">
                @error('paid')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Due</label>
              <div class="input-group">
              <input type="text" id="due" name="due" value="{{$product->due}}" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
            <label>Status</label>
            <div class="input-group">
             <select name="status" class="form-control">
                 <option selected value="1">Paid</option>
                 <option value="0">Due</option>
             </select>
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
<script>
  $(document).ready(function(){
    $('#paid').on("keyup",function(){
      var total= $('#total').val();
      var paid= $('#paid').val();
      var due= total-paid;
      $('#due').val(due);
    });
  });
</script>
@endsection