<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <!------ Include the above in your HEAD tag ---------->
    <title>Order Book</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-5">
                            <img src="https://i.ibb.co/CBXMvGX/fabric.jpg" class="float-right" width="100px;" height="100px;">
                        </div>
                        <div class="col-md-6">
                          <h2 style="font-family: 'Permanent Marker', cursive; color:rgb(243, 102, 8)">FABRICS VIEW</h2>
                          <h2 style="font-family: 'Permanent Marker', cursive; color:rgb(243, 102, 8)" class="px-3">ফেব্রিক্‌স ভিউ </h2>
                          <p class="px-5">Shop for Interior <br> &nbsp; SINCE 1999</p>
                      </div>
                      <div class="col-md-12">
                          <p class="text-center">Cha-104/1 (Ground Floor), Pragoti Sarani, Bir-Uttam Rafiqul Islam avenue (Near of Badda General Hospital Oposite A.M.Z Hospital), Uttar Badda, Dhaka-1212, Bangladesh</p>
                          <p class="text-center">Mob: 01305-642804, 01732-648748,01881-017301, Phone: 02222284953,02222249370, 02-41081583</p>
                          <p class="text-center">E-mail: ahmed.royel123@gmail.com, fabricsviewltd@gmail.com</p>
                          <h3 class="text-center">@if ($invoice->delivery_status==1)
                            <span class="badge badge-success">Invoice</span>
                            @else
                            <span class="badge badge-danger">ORDER BOOK</span>
                            @endif</h3>
                          <p class="text-center">Customer Copy</p>
                      </div>
                    </div>
                    
                    <div class="row  pl-5">
                        <div class="col-md-8">
                            <p>Order No: {{$invoice->id}}</p>
                            <p>Client: {{$invoice->customers->name}}</p>
                            <p>Address: {{$invoice->customers->address}}</p>
                        </div>
                        <div class="col-md-4">
                            <p>Date: {{date_format($invoice->created_at,"j F Y")}}</p>
                            <p>Tel: {{$invoice->customers->phone}}</p>
                        </div>
                    </div>
                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">SL NO</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Yrd/Feet/MTR</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Rate</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Taka</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $item)
                                    @php
                                    $product =\App\Product::where('id', '=',$item->product_id)->first();
                                @endphp
                                        <tr class="item">
                                            <td>{{ $loop->index+1}}</td>
                                          <td>
                                            {{$product->code}}-{{$product->name}}
                                          </td>

                                          <td>
                                              {{$item->qty}}/{{$product->unit}}
                                          </td>
                                    
                                          <td>
                                            &#2547; {{$item->price}}
                                          </td>
                                          <td>
                                              {{$item->qty * $item->price}}
                                          </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>Discount</td>
                                            <td></td>
                                            <td>{{$discount=$invoice->discount}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>Total</td>
                                            <td></td>
                                            <td>{{$total=$invoice->total}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>Advance</td>
                                            <td></td>
                                            <td>{{$advance=$invoice->advance}}</td>
                                        </tr>
                                        @php
                                        //advance =paid amount
                                        // if($advance>0){
                                        //     $due=$total-$advance;
                                        // }else{
                                           
                                        // }
                                        $due=$total-$invoice->paid;  
                                            
                                        @endphp
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>Due</td>
                                            <td></td>
                                            <td>{{$due}}</td>
                                        </tr>
                                </tbody>
                            </table>
                            <p><b>N.B Advance 75%, Goods Once sold are not Returnable.</b></p>
                        <p>Date of Delivery:</p>
                        </div>
                        <hr>
                        
                        <div class="col-md-6">
                            Receiver's Signature
                        </div>
                        <div class="col-md-6 text-right">Signature</div>
                    </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small"> </div>

</div>

</body>
<script type="text/javascript">
    window.print();
</script>
</html>