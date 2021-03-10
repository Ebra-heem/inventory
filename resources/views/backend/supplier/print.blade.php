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
    <title>Supplier Info</title>
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
                          <h3 class="text-center">Supplier Information</h3>
                       
                      </div>
                    </div>
                    
                    <div class="row  pl-5">
                        <div class="col-md-6">
                            <div class="card border-light mb-3">
                                <div class="card-header">Supplier Information</div>
                                <div class="card-body">
                                  <h5 class="card-title">{{ $supplier->name }}</h5>
                                  <p class="card-text ">
                                      Phone: {{ $supplier->phone }}<br>
                                    Address: {{ $supplier->address }}<br>
                                    Created At: {{ $supplier->created_at }}<br>
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-light mb-3">
                                <div class="card-header">Transaction Information</div>
                                <div class="card-body">
                                  <p>Total Payable Amount: <span class="badge badge-info">{{ $total }}</span></p>
                                  <p>Total Paid Amount: <span class="badge badge-success">{{ $paid }}</span></p>
                                  <p>Total Due Amount: <span class="badge badge-danger">{{ $due }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card border-light mb-3">
                                <div class="card-header">Supplier Ledger</div>
                            @if(count($purchases)>0)
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Particulars</th>
                                                
                                                <th>Debit(Dr)</th>
                                                <th>Credit(Cr)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($purchases as $product)
                                            <tr>
                                            <td>{{$product->date}}</td>
                                            <td>{{$product->particular}}</td>
                                            @if ($product->account_type=='Dr')
                                                <td> {{$product->amount}} </td>
                                            @else
                                            <td></td>
                                            <td>{{$product->amount}}</td> 
                                            @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                           </div>
                        </div>
                        <div class="col-md-2"></div>

                    
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