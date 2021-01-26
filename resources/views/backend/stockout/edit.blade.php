@extends('layouts.master')

@section('content')
<div class="card card-primary">
<form action="{{route('stockout.update',$product->id)}}" method="post">
    @csrf
    {{ method_field('PUT') }}
    @php
          $p= \App\Product::where('id',$product->product_id)->first();
          $buyer= \App\Vendor::where('id',$product->vendor_id)->first();
       @endphp
      <div class="card-header">
      <h4>{{$p->name}}//  {{$buyer->company_name}}</h4>
 
      </div>
      <div class="card-body pb-0">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Lot</label>
              <div class="input-group">
              <input type="text" id="lot" name="lot"  value="{{$product->lot}}" class="form-control @error('lot') is-invalid @enderror" placeholder="Lot">
                @error('lot')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Bag</label>
              <div class="input-group">
              <input type="text" id="bag" name="bag"  value="{{$product->bag}}" class="form-control @error('bag') is-invalid @enderror" placeholder="Bag">
                @error('bag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Weight</label>
              <div class="input-group">
              <input type="text" name="weight" id="weight" value="{{$product->weight}}" class="form-control @error('weight') is-invalid @enderror" placeholder="weight">
                
              @error('weight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>

                </span>
                 @enderror
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Price</label>
              <div class="input-group">
              <input type="text" id="price" name="price" placeholder="Price" value="{{$product->price}}" class="form-control">
              
            </div>
            </div>
          </div>
        </div>

        <div class="form-group">
            <label>Note</label>
            <div class="input-group">
            <textarea name="note" class="form-control" >{{$product->note}}</textarea>
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
          <p>Price per kg: <span id="perkg" class="text-danger"></span>Taka</p>
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
    $('#price').on("keyup",function(){
      var weight= $('#weight').val();
      var price= $('#price').val();
      var perkg= price/weight;
      $('#perkg').html(perkg);
    });
  });
</script>
@endsection