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
            <div class="col-4">
              @php
                  $product=App\Product::where('id',$stockin->product_id)->first();
                  $buyer=App\Buyer::where('id',$stockin->buyer_id)->first();
                  $wirehouse=App\Wirehouse::where('id',$stockin->wirehouse_id)->first();
              @endphp
              <ul class="list-group">
                <li class="list-group-item">Product Name: {{$product->name}} </li>
                <li class="list-group-item">Buyer Name: {{$buyer->name}} </li>
              <li class="list-group-item"> Date : {{$stockin->date}}</li>
              <li class="list-group-item">Available Qty in (bags) : 
                @if($stockin->stock_qty>=1)
                <b class="badge badge-success float-right">{{$stockin->stock_qty}}</b>
                @else
                <b class="badge badge-danger">{{$stockin->stock_qty}}</b>
                @endif
                
                </li>
              <li class="list-group-item">Available weight in (kg): @if($stockin->stock_weight>=1)
                <b class="badge badge-success float-right">{{$stockin->stock_weight}}</b>
                @else
                <b class="badge badge-danger">{{$stockin->stock_weight}}</b>
                @endif
                
              </li>
              <li class="list-group-item">Purchase quantity : {{ $stockin->qty }} bags</li>
              <li class="list-group-item">Purchase weight : {{ $stockin->weight }} kg</li>

                
                <li class="list-group-item">Weight per bags: {{ $stockin->weight/$stockin->qty }} kg</li>
                <li class="list-group-item">Avarage price per kg: {{ $stockin->price }} Taka</li>
                
                <li class="list-group-item">Wirehouse Name: {{$wirehouse->name}} </li>
              </ul>
            </div>
            <div class="col-8">
              <form action="{{ route('invoice.store')}}" method="post">
                @csrf
                <div class="card">
                  <div class="card-header">
                    <h3 class="text-center">Generate Quick Invoice</h3>
                    <div class="float-right">
                      <select name="vendor_id" class="form-control">
                        <option value="0">Default</option>
                        @foreach ($vendors as $vendor)
                      <option value="{{$vendor->id}}">{{$vendor->company_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                
                  <div class="card-body">
                    <table>
                      <thead>
                        <tr>
                          <th>Qty (#No of Bags)</th>
                          <th>Weight per kg</th>
                          <th>Price per kg</th>
                          <th>Taka</th>
                        </tr>
                      </thead>
                      <tr>
                        <td><input type="text" placeholder="Qty" value="{{$stockin->stock_qty}}" class="form-control" name="qty" id="qty"></td>
                        <td><input type="text" placeholder="Weight" value="{{ $stockin->stock_weight }}" class="form-control" name="weight" id="weight"></td>
                        <td><input type="text" placeholder="Price" class="form-control" name="price" id="price"></td>
                        <td><input type="text" placeholder="Subtotal" readonly class="form-control"  name="subtotal" id="subtotal"></td>
                      </tr>
                    <input type="hidden" name="stockin_id" value="{{$stockin->id}}">
                      <tr>
                        <td colspan="3">Commission</td>
                        <td><input type="number"  readonly placeholder="Commission"  class="form-control" name="commission" id="commission"></td>
                      </tr>
                      <tr>
                        <td colspan="3">Labour Cost</td>
                        <td><input type="number" value="0"  class="form-control" name="labour_cost" id="labour_cost"></td>
                      </tr>
                      <tr>
                        <td colspan="3">Bags Cost</td>
                        <td><input type="number"  value="0" class="form-control" name="bag_cost" id="bag_cost"></td>
                      </tr>
                      <tr>
                        <td colspan="3">Vehicle Cost</td>
                        <td><input type="number" value="0" class="form-control" name="vehicle_cost" id="vehicle_cost"></td>
                      </tr>
                      <tr>
                        <td colspan="3">Rental Cost</td>
                        <td><input type="number"  value="0" class="form-control" name="rental_cost" id="rental_cost"></td>
                      </tr>
                      <tr>
                        <td colspan="3">Others Cost</td>
                        <td><input type="number" value="0" class="form-control" name="other_cost" id="other_cost"></td>
                      </tr>
                      <tr>
                        <td colspan="3">Total Amount</td>
                        <td><input type="text" readonly class="form-control" name="total" id="total"></td>
                      </tr>
                      <tr>
                        <td colspan="3">Paid</td>
                        <td><input type="number" value="0" placeholder="Paid" class="form-control" name="paid" id="paid"></td>
                      </tr>
                      <tr>
                        <td colspan="3">Due</td>
                        <td><input type="text" placeholder="Due"  class="form-control" name="due" id="due"></td>
                      </tr>
                      <tr>
                        <td colspan="3"></td>
                        
                        <td>
                          <br>
                          <button type="submit" @if ($stockin->stock_qty<=0)
                              disabled
                          @endif class="btn btn-primary">SAVE</button></td>
                      </tr>
                    </table>
                  </div>
                
              </div>
            </form>
            </div>
          </div>
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
     
      
     
    $("#weight,#price,#commission,#labour_cost,#bag_cost,#vehicle_cost,#rental_cost,#other_cost").on("keyup",function(){
      var qty= $('#weight').val();
      var price= $('#price').val();
      var total= qty*price;
      var labour_cost= $('#labour_cost').val();
      var bag_cost= $('#bag_cost').val();
      var vehicle_cost= $('#vehicle_cost').val();
      var rental_cost= $('#rental_cost').val();
      var other_cost= $('#other_cost').val();

      $('#total').val(qty*price+qty*2 +parseInt(labour_cost)+
      parseInt(bag_cost)+parseInt(vehicle_cost)+parseInt(rental_cost)+parseInt(other_cost));
      $('#subtotal').val(qty*price);
      $('#commission').val(qty*2);
      //console.log("final: "+final);
      $("#paid").on("keyup",function(){
      var paid= $('#paid').val();
      var final= $('#total').val();
      var due =final-paid; 
      console.log("due: "+due);
      $('#due').val(due);
  

    });



    });
   
  
   });
   </script>
 
@endsection

