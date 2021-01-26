<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <p class="text-right"><a href="#" onclick="window.print()">Print</a></p>
            <h2 class="text-center alert alert-primary">M/S DADON AND BROTHERS </h2>
            <h4 class="text-center alert alert-success">Propitor: Dadon Molla, Mobile: 01730183921, 01970183921</h4>
            <p class="text-center">All kinds of agricultural product including dry pepper</p>
            <p class="text-center">Address: Mollarhat, Shakhipur, Shariatpur</p>
            @php
            $stock =\App\StockIn::where('id', '=',$invoice->stockin_id)->first();
            $product =\App\Product::where('id', '=',$stock->product_id)->first();
            $buyer =\App\Buyer::where('id', '=',$stock->buyer_id)->first();
            $vendor =\App\Vendor::where('id', '=',$invoice->vendor_id)->first();
        @endphp
            <table class="table">
                <tr>
                    @if ($invoice->vendor_id==0)
                    <td><b>Vendor Name:</b> {{$buyer->name}}</td>
                    @else  
                    <td><b>Company Name:</b> {{$vendor->company_name}}</td>
                    @endif
                    

                    <td><b>Import Date:</b> {{$stock->date}}</td>
                </tr>
                <tr>
                <td><b>Product Name:</b> {{$product->name}}</td>
                @if ($invoice->vendor_id==0)
                    <td><b>Address:</b> {{$buyer->address}}</td>
                @else
                     <td><b>Address:</b> {{$vendor->address}}</td>
                @endif
                </tr>
                <tr>
                    <td><b>Invoice No:#00</b>{{ $invoice->id}}</td>
                    <td><b>Delivary Date: </b>{{ $invoice->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Paid:</b> {{ $invoice->paid}} Taka</td>
                    <td><b>Due:</b> {{ $invoice->due}} Taka</td>
                </tr>
            </table>
            
            <table class="table">
                <tr>
                    <th>Qty (Bags)</th>
                    <th>Weight (kg)</th>
                    <th>Price </th>
                    <th>Taka</th>
                </tr>
                <tr>
                    <td>{{$invoice->qty}}</td>
                    <td>{{$invoice->weight}}</td>
                    <td>{{$invoice->price}} </td>
                    <td><b>{{$invoice->weight*$invoice->price}}</b></td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Commision :</td>
                    <td><b>{{$invoice->commission}}</b></td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Labour :</td>
                    <td><b>{{$invoice->labour_cost}}</b></td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Bags :</td>
                    <td><b>{{$invoice->bag_cost}}</b></td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Vehicle :</td>
                    <td><b>{{$invoice->vehicle_cost}}</b></td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Rental :</td>
                    <td><b>{{$invoice->rental_cost}}</b></td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Others Cost :</td>
                    <td><b>{{$invoice->other_cost}}</b></td>
                </tr>
                <tr>
                    <td>Last Payment Date:{{$invoice->updated_at}}</td>
                    <td colspan="2" align="right">Total Amount (Taka) :</td>
                    <td><b>{{$invoice->total}}</b></td>
                </tr>
            </table>
           
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>