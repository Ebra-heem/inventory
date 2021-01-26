@extends('layouts.master')

@section('content')
<div class="card card-primary">
<form action="{{route('purchase.update',$purchase->id)}}" method="post">
    @csrf
    {{ method_field('PUT') }}
     
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
                <select name="supplier_id" id="supplier_id" value="{{old('supplier_id')}}" class="form-control  @error('supplier_id') is-invalid @enderror">
                  
                  @foreach($suppliers as $supplier)
                  <option value="{{ $supplier->id}}" @if ($purchase->supplier_id ==$supplier->id)
                      selected
                  @endif>{{ $supplier->name}}</option>
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
                  <option value="{{ $product->id}}" @if ($purchase->product_id==$product->id)
                      selected
                  @endif>{{ $product->code}} {{ $product->name}} -[unit: {{ $product->unit}}]</option>
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
                <input type="text" name="purchase_qty" id="qty" value="{{ $purchase->purchase_qty }}"  class="form-control">
    
              </div>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label>Cost Price</label>
              <div class="input-group">
                <input type="text" name="buy_price" id="price" value="{{ $purchase->buy_price }}"  class="form-control ">
               
              </div>
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Total</label>
              <div class="input-group">
                <input type="text" name="total" id="total"  value="{{ $purchase->total }}"   class="form-control ">
                
              </div>
            </div>
          </div>
           
        </div>
        <div class="row">
           
          <div class="col-md-4">
            <div class="form-group">
              <label>Sell Price</label>
              <div class="input-group">
                <input type="text" name="sell_price" id="sell_price" value="{{ $purchase->sell_price }}"   class="form-control ">
                
              </div>
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Paid </label>
              <div class="input-group">
                <input type="text" name="paid" id="paid" value="{{ $purchase->paid }}"  class="form-control">
            
              </div>
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Due </label>
              <div class="input-group">
                <input type="text" name="due" id="due" value="{{ $purchase->due }}"  class="form-control">
              </div>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label>Wirehouse </label>
              <div class="input-group">
                <select name="wirehouse_id" class="form-control wirehouse @error('wirehouse_id') is-invalid @enderror">
                  
                  @foreach($wirehouses as $wirehouse)
                  <option value="{{ $wirehouse->id}}" @if ($purchase->wirehouse_id==$wirehouse->id)
                      selected
                  @endif>{{ $wirehouse->name}}</option>
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
              <label>Rack No </label>
              <div class="input-group">
                <select name="rack_id" class="form-control rack @error('rack_id') is-invalid @enderror">
               
                  @foreach($racks as $rack)
                  <option value="{{ $rack->id}}" @if ($purchase->rack_id==$rack->id)
                      selected
                  @endif>{{ $rack->rack_no}}[{{ $rack->wirehouse->name}}]</option>
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
              <label>Note</label>
              <div class="input-group">
               <textarea name="note" class="form-control @error('note') is-invalid @enderror" cols="30" rows="10">{{ $purchase->note }}</textarea>
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
        <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Update</button>
        
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