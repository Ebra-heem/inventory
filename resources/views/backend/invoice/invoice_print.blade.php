@extends('layouts.master')

@section('extra-css')

<style>
    .invoice-box {
  max-width: 800px;
  margin: auto;
  padding: 30px;
  border: 1px solid #eee;
  box-shadow: 0 0 10px rgba(0, 0, 0, .15);
  font-size: 16px;
  line-height: 24px;
  font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
  color: #555;
}

.invoice-box table {
  width: 100%;
  line-height: inherit;
  text-align: left;
}

.invoice-box table td {
  padding: 5px;
  vertical-align: top;
}

.invoice-box table tr td:nth-child(n+2) {
  text-align: right;
}

.invoice-box table tr.top table td {
  padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
  font-size: 45px;
  line-height: 45px;
  color: #333;
}

.invoice-box table tr.information table td {
  padding-bottom: 40px;
}

.invoice-box table tr.heading td {
  background: #eee;
  border-bottom: 1px solid #ddd;
  font-weight: bold;
}

.invoice-box table tr.details td {
  padding-bottom: 20px;
}

.invoice-box table tr.item td{
  border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
  border-bottom: none;
}

.invoice-box table tr.item input {
  padding-left: 5px;
}

.invoice-box table tr.item td:first-child input {
  margin-left: -5px;
  width: 100%;
}

.invoice-box table tr.total td:nth-child(2) {
  border-top: 2px solid #eee;
  font-weight: bold;
}

.invoice-box input[type=number] {
  width: 60px;
}

@media only screen and (max-width: 600px) {
  .invoice-box table tr.top table td {
      width: 100%;
      display: block;
      text-align: center;
  }
  
  .invoice-box table tr.information table td {
      width: 100%;
      display: block;
      text-align: center;
  }
}

/** RTL **/
.rtl {
  direction: rtl;
  font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
}

.rtl table {
  text-align: right;
}

.rtl table tr td:nth-child(2) {
  text-align: left;
}
</style>
@endsection

@section('content')


    <div class="invoice-box">
      <h3>Sales Invoice</h3>
        <table cellpadding="0" cellspacing="0">
          <tr class="top">
            <td colspan="5">
              <table>
                <tr>
                  <td class="title">
                    
                    <img src="https://i.ibb.co/CBXMvGX/fabric.jpg" style=" max-width:150px;">
                  </td>
      
                  <td>
                    Invoice #: {{$invoice->id}}<br> Created: {{$invoice->created_at}}<br> Date: {{$invoice->date}}
                  </td>
                </tr>
              </table>
            </td>
          </tr>
      
          
              <tr class="information">
                <td colspan="5">
                  <table>
                    <tr>
                      <td>
                       Fabiric View<br> Uttar Badda, Dhaka<br> Bangladesh
                      </td>
                      <td>
                        Customer Info<br> Name:  {{$invoice->customers->name}}<br> Address: {{$invoice->customers->address}}
                       </td>
                      
                    </tr>
                  </table>
                </td>
              </tr>
            
           
          
          
      
          <tr>
            <td colspan="4">
              Payment Status: @if ($invoice->status==1)
              <span class="badge badge-success">Paid</span>
              @else
              <span class="badge badge-danger">Due</span>
              @endif
            </td>
            <td colspan="4">
              Order Status: @if ($invoice->delivery_status==1)
              <span class="badge badge-success">Invoice</span>
              @else
              <span class="badge badge-danger">ORDER BOOK</span>
              @endif
            </td>
          </tr>
      
         
      
          <tr class="heading">
            <td>
              Product Name
            </td>
      
          
      
            <td>
              Quantity
            </td>
      
            <td>
              Price
            </td>
            <td>
                Total
            </td>
          </tr>
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
          </tr>
          @endforeach
          <tr class="item">
            <td colspan="4"></td>
      
            <td>
              Discount: {{$invoice->discount}}
            </td>
          </tr>
          <tr class="item">
            <td colspan="4"></td>
      
            <td>
              Shipping: {{$invoice->shipping}}
            </td>
          </tr>
          <tr class="total">
            <td colspan="4"></td>
      
            <td>
              Total: {{$invoice->total}}
            </td>
          </tr>
      
          
         
          
        </table>
      </div>

@endsection

@section('extra-js')
<script src="{{asset('admin/assets/js/autocal/jautocalc.js')}}"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('admin/assets/js/autocal/script.js')}}"></script>


@endsection