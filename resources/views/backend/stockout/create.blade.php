@extends('layouts.master')

@section('extra-css')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<style>
    .item{
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    }
</style>
@endsection

@section('content')
<?php
function fill_unit_select_box()
{ 
 $output = '';
 $products = App\Product::all();
 foreach($products as $row)
 {
  $output .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
 }
 return $output;
}
?>
<?php
function fill_vendor_select_box()
{ 
 $output = '';
 $vendors = App\Vendor::all();
 foreach($vendors as $row)
 {
  $output .= '<option value="'.$row["id"].'">'.$row["company_name"].'</option>';
 }
 return $output;
}
?>
<div class="card card-primary">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div>
                    <h2 class="text-center">Product Delivery Invoice</h2>
                </div>
            </div>

        </div>
    <form action="{{route('stockout.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="item_table">
                        <thead>
                            <tr class="item-row">
                                <td>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group">
                                          
                                          <input id="datepicker"  data-date-format="dd/mm/yyyy" name="delivery_date" value="{{$today->format('d/m/Y')}}"  class="form-control @error('delivery_date') is-invalid @enderror">
                                          @error('delivery_date')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                           @enderror
                                        </div>
                                      </div>
                                </td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        {{-- <tr id="hiderow">
                            <td colspan="4">
                                <a id="addRow1" href="javascript:;" title="Add a row" class="btn btn-primary add">Add a row</a>
                            </td>
                        </tr> --}}
                        <!-- Here should be the item row -->
                        {{-- <tr class="item-row">
                            
                        <td class="item-name">
                    <div class="delete-btn"><select name="product_id[]" class="item" id="item"></select><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>

                            <td><input class="form-control price" name="price[]" placeholder="Price" type="text"></td>
                            <td><input class="form-control qty" name="qty[]" placeholder="Quantity" type="text"></td>
                            <td><span class="total">0.00</span></td>
                        </tr> --}}

                        <tr>
                            <td><strong>Total Quantity: </strong><span id="totalQty" style="color: red; font-weight: bold">0</span> Bags</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><a id="addRow1" href="javascript:;" title="Add a row" class="btn btn-danger add">Add a row</a></td>
                            <td></td>
                            <td></td>
                            <td><button type="submit" class="btn btn-success">Save Invoice</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection

@section('extra-js')
<script src="{{asset('admin/assets/js/autocal/jautocalc.js')}}"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('admin/assets/js/autocal/script.js')}}"></script>
<script>
    // $(document).ready(function(){

    //     console.log('ajax call');
    //     // $("#addRow").on('click',function(){

    //     // });
    // //     $.ajax({
    // //                     url:'/all-products',
    // //                     type: 'get',
    // //                     dataType: 'json',
    // //                     success: function(data) {
    // //                         $("#addRow").on('click',function(){
    // //                             $.each(data.products, function(key, value) {
    // //                             $('#item').append('<option  value="'+value.id+'">'+value.name+'['+value.name+']</option>');
    // //                         });
    // //                          });
    // //                        // alert(data);
    // //                         console.log(data);
    // //                         // $('#item').empty();
    // //                         // $('#item').append('<option  value="">Pic a Product</option>');
    // //                         // $.each(data.products, function(key, value) {
    // //                         //     $('#item').append('<option  value="'+value.id+'">'+value.name+'['+value.name+']</option>');
    // //                         // });
    // //                     }
    // // });
    // });

    $(document).on('click', '.add', function(){
      
var html = '';
html += '<tr class="item-row">';
html += '<td class="item-name"><div class="delete-btn"><select name="product_id[]" class="item" id="item"><?php echo fill_unit_select_box();?></select><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>';
html += '<td><select name="vendor_id[]" class="item" id="item"><?php echo fill_vendor_select_box();?></select></td>';
html += '<td><input class="form-control lot" name="lot[]" placeholder="Lot" type="text"></td>';
html += '<td><input class="form-control qty" name="bag[]" placeholder="Bag" type="text"></td>';
html += '<td></td></tr>';
$('#item_table').append(html);
});
</script>
<script>
    jQuery(document).ready(function(){
        jQuery().invoice({
            addRow : "#addRow",
            delete : ".delete",
            parentClass : ".item-row",

            price : ".price",
            qty : ".qty",
            total : ".total",
            totalQty: "#totalQty",

            subtotal : "#subtotal",
            discount: "#discount",
            shipping : "#shipping",
            grandTotal : "#grandTotal"
        });
    });
</script>

@endsection