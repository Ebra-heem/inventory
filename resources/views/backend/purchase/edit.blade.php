@extends('layouts.master')

@section('content')
<div class="">
 
  Supplier/Company Name: {{ $supplier->name }}<br>
  Phone: {{ $supplier->phone }}<br>
  Address: {{ $supplier->address }}<br>
 
  
  <h3 class="text-center">Supplier Bill Payment</h3>
</div>
  <div class="card card-primary">
    <div class="row card-body">
      
      <br>
      <br>
      <div class="col-md-12 ">
        <form class="form-inline" action="{{ route('supplier.ledger') }}" method="post">
            @csrf
        <table>
                <tr>
                    <td>
                        <input type="date" class="form-control" id="date" name="date" value="{{$today->format('Y-m-d')}}"  required="required" />
                    </td>

                    <td>
                        
                      <input type="text" class="form-control" name="particular" placeholder="Particulars">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="amount" placeholder="Amount">

                        <input type="hidden"  value="{{ $purchase->supplier_id }}" name="supplier_id">
                        <input type="hidden" value="{{ $purchase->id }}"  name="purchase_id"> 
                    </td>
                    <td>
                                                        
                      <select class="form-control" name="account_type" >
                          <option value="Cr">Cr</option>
                        </select>
                  </td>
                    
                    
                    <td><button class="btn btn-success" type="submit">+Add</button></td>
                </tr>
        </table>
        </form>
    </div>
    <div class="col-md-12 card-footer">
         
      <table  class="table table-striped table-bordered">
          <thead>
              <tr>
              
              <th>Date</th>
              <th>Particulars</th>
              <th>Amount</th>
              <th>Taka</th>
              </tr>
          </thead>

          
          <tbody>
              @php
                  $fee_total=0;
                  $less_total=0;
                  $paid_total=0;
              @endphp
              <tr>
                  <td><b>Purchase:</b></td>
              </tr>
              @foreach ($particulars_fee as $fee)
                  
                      <tr>
                          
                          <td>{{ $fee->date }}</td>
                          <td>{{ $fee->particular }}</td>
                      
                          <td>{{ $fee->amount }}</td>
                          @php
                              $fee_total+=$fee->amount;
                          @endphp
                         
                          <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                  Purchase Details
                              </button>
                          </td>
                          
                      </tr>
                      
              @endforeach
                  <tr>
                      <td></td>
                      <td colspan="2">a. Total</td>
                      <td >{{ $fee_total }}</td>
                  </tr>
                  <tr>
                      <td><b>Bill:</b></td>
                  </tr>
                  <tr>
              
          @foreach ($particulars_bill as $paid)  
                      <tr>
                      
                          <td>{{ $paid->date }}</td>
                          <td>{{ $paid->particular }}</td>
                          @php
                          $paid_total+=$paid->amount;
                          @endphp
                          <td>{{ $paid->amount }}</td>
                          <td>
                              {{-- <a href="#" class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this item?');"> 
                               <i class="fas fa-trash"></i> Delete</a> --}}
                          </td>
                      </tr>
                      
                     
              @endforeach
              <tr>
                  <td></td>
                  <td colspan="2">d.Total</td>
                  <td>{{ $paid_total }}</td>
              </tr>
              <tr>
                  <td></td>
                  <td colspan="2">e.Total Dues</td>
                  <td>{{ $fee_total-$paid_total }}</td>
              </tr>
                      
              
          </tbody>
          
      </table>
      </div>

  </div>

   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Purchase Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table  class="table table-striped table-bordered">
              
            @foreach ($details as $item)
            @php
            $product =\App\Product::where('id', '=',$item->product_id)->first();
        @endphp
                <tr class="item">
                  <td>
                    {{$product->code}}-{{$product->name}}
                  </td>
                  <td>
                      {{$item->purchase_qty}}/{{$product->unit}}
                  </td>
            
                  <td>
                      {{$item->buy_price}}
                  </td>
                  <td>
                      {{$item->purchase_qty * $item->buy_price}}
                  </td>
                </tr>
                @endforeach
                

              
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
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