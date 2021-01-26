@extends('layouts.master')

@section('extra-css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
<div class="card card-primary">
<form action="{{route('purchase.store')}}" method="post">
    @csrf
      <div class="card-header">
        <h4 class="text-info">Create Purchase Invoice</h4>
      </div>
      <div class="card-body pb-0">
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
          <div class="col-md-4">
            <div class="form-group">
              <label>Supplier Name</label>
              <div class="input-group">
                <select name="supplier_id"  value="{{old('supplier_id')}}" class="form-control  @error('supplier_id') is-invalid @enderror">
                  <option></option>
                  @foreach($suppliers as $supplier)
                  <option value="{{ $supplier->id}}">{{ $supplier->name}}</option>
                  @endforeach
                </select>
                @error('supplier_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Product Name</label>
              <div class="input-group">
                <select name="product_id" class="form-control product @error('product_id') is-invalid @enderror">
                  <option></option>
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
          
        </div>
        <div class="row">   
          <div class="col-md-4">
            <div class="form-group">
              <label>Purchase Qty</label>
              <div class="input-group">
                <input type="text" name="purchase_qty" id="qty"  class="form-control @error('purchase_qty') is-invalid @enderror">
                @error('purchase_qty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label>Cost Price</label>
              <div class="input-group">
                <input type="text" name="buy_price" id="price"  class="form-control @error('buy_price') is-invalid @enderror">
                @error('buy_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
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
        <div class="row">
           
          <div class="col-md-4">
            <div class="form-group">
              <label>Sell Price</label>
              <div class="input-group">
                <input type="text" name="sell_price" id="sell_price"  class="form-control @error('sell_price') is-invalid @enderror">
                @error('sell_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
              </div>
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Paid </label>
              <div class="input-group">
                <input type="text" name="paid" id="paid"  class="form-control @error('paid') is-invalid @enderror">
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
              <label>Due </label>
              <div class="input-group">
                <input type="text" name="due" id="due"  class="form-control">
              </div>
            </div>
          </div> 

          <div class="col-md-4">
            <div class="form-group">
              <label>Note</label>
              <div class="input-group">
               <textarea name="note" class="form-control @error('note') is-invalid @enderror" cols="30" rows="10"></textarea>
               @error('note')
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

    $('#paid').on("keyup",function(){
      let due=0;
      var total= $('#total').val();
      var paid=$('#paid').val();
       due= total-paid;
      $('#due').val(due);
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