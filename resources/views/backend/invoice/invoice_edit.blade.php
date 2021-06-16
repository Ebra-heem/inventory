@extends('layouts.master')

@section('content')
<div class="">
 
 
 
  
  <h3 class="text-center">Customer Invoice Update</h3>
</div>
  <div class="card card-primary">
    <div class="row ">

      <br>
      <br>
      <div class="col-md-8 card-body">
        <form class="form-inline" action="{{ route('product.add') }}" method="post">
            @csrf
        <table>
                <tr>
                    <td>
                        <select class="form-control product" name="product_id">
                            @foreach ($products as $item)
                            <option value="{{ $item->product_id }}">{{ $item->code }} Qty: {{ $item->sr_qty }}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                      <input type="text" class="form-control" name="qty" placeholder="Qty">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="price" placeholder="Price">

                        <input type="hidden"  value="{{ $purchase->customer_id }}" name="customer_id">
                        <input type="hidden" value="{{ $purchase->id }}"  name="invoice_id"> 
                    </td>

                    <td><button class="btn btn-success" type="submit">+Add</button></td>
                </tr>
        </table>
        </form>
    </div>
    <div class="col-md-4">
        <table class="table">
            <tr>
                <td>Customer Name: {{ $supplier->name }}</td>
            </tr>
            <tr> <td>Phone: {{ $supplier->phone }}</td></tr>
            <tr><td>Address: {{ $supplier->address }}</td></tr>
        </table>
    </div>
    <br>
    <br>
    <div class="col-md-12 card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
     </div>
  @endif
  <table  class="table table-striped table-bordered">
      <thead>
          <tr>
          <th>Particulars</th>
          <th>Qty</th>
          <th>Price</th>
          <th>Taka</th>
          <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @php
            $sub=0;
        @endphp
        @foreach ($details as $item)
        @php
        $product =\App\Product::where('id', '=',$item->product_id)->first();
        @endphp
            <tr class="item">
                
              <td>
                {{$product->code}}-{{$product->name}}
              </td>
              <td>
                  {{$item->qty}}/{{$product->unit}}
              </td>
        
              <td>
                  {{$item->price}}
              </td>
              <td>
                  {{$item->qty * $item->price}}
              </td>
              @php
                  $sub+=$item->qty * $item->price;
              @endphp
              <td><a href="{{ route('add_item.delete',$item->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</a></td>
            </tr>
            @endforeach
            <form action="{{ route('invoice.update',$purchase->id) }}" method="POST">
              @csrf
              @method('PUT')
              <tr>
                <td></td>
                <td></td>
                <td>Sub Total</td>
                <td>
                  <input type="text" value="{{ $sub }}" readonly class="form-control" id="sub" />
                  
                  <input type="hidden"  value="{{ $purchase->customer_id }}" name="customer_id">
                </td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>Discount</td>
                <td><input type="text" class="form-control" value="{{ $purchase->discount }}" id="discount" name="discount" /></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td><input type="text" class="form-control" name="total" id="total" /></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>Advance</td>
                <td><input type="text" class="form-control" value="{{ $purchase->advance }}" name="advance" id="advance" /></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>Due</td>
                <td><input type="text" class="form-control" value="{{ $purchase->due }}" name="due" id="due" /></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><button type="submit" class="btn btn-info">Update Invoice</button></td>
              </tr>
          </form>
      </tbody>
  </table>
  </div>
  </div>

 
@endsection

@section('extra-js')
<script>
    $(document).ready(function() {
    
    $('.product').select2();

    
    });
  $(document).ready(function(){
    var sub= $('#sub').val();
    var discount= $('#discount').val();
    $('#total').val(sub-discount);
    $('#discount,#advance').on("keyup",function(){
      
      var discount= $('#discount').val();
      var advance= $('#advance').val();
      var total= sub-discount;
      var due= total-advance;
      $('#total').val(total);
      $('#due').val(due);

    });


  });
</script>
@endsection