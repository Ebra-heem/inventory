@extends('layouts.master')

@section('extra-css')



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
 $products = DB::table('products')
            ->orderby('code','asc')
            ->get();
 foreach($products as $row)
 {
    
  $output .= '<option value="'.$row->id.'">'.$row->code.'  '.$row->name.'</option>';
 }
 return $output;
}

?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('purchase.index') }}">Purchase</a></li>
      <li class="breadcrumb-item active" aria-current="page">Purchase Invoice Cerate</li>
    </ol>
</nav>
<div class="card card-primary">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div>
                    <h2 class="text-center">Purchase Invoice</h2>
                </div>
            </div>

        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            @endif
    <form action="{{route('purchase.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="item_table">
                        <thead>
                            <tr class="item-row">
                                <td><select name="supplier_id" class="customer item @error('supplier_id') is-invalid @enderror" required>
                                    <option value=" ">Select a Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>  
                                    @endforeach
                                    @error('supplier_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                   
                                </select></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        +ADD
                                      </button>
                                </td>
                                <td>
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
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>Sub Total</strong></td>
                            <td><span id="subtotal">0.00</span></td>
                        </tr>
                        <tr>
                            <td><strong>Total Quantity: </strong><span id="totalQty" style="color: red; font-weight: bold">0</span> Units</td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>Paid Amount</strong></td>
                            <td><input class="form-control" name="discount" id="discount" value="0" type="text"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong></strong></td>
                            <td><input class="form-control" name="shipping" id="shipping" value="0" type="hidden"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>Due Total</strong></td>
                            
                            <td><span id="grandTotal">0</span></td>
                        </tr>
                        <tr>
                            <td><a id="addRow1" href="javascript:;" title="Add a row" class="btn btn-danger add">Add a row</a></td>
                            <td></td>
                            <td></td>
                            <td><button type="submit" class="btn btn-success">Save Invoice</button></td>
                        </tr>
                        <!-- Here should be the item row -->
                        <tr class="item-row">
                            
                            <td class="item-name">
                        <div class="delete-btn"><select name="product_id[]" class="item" ><?php echo fill_unit_select_box();?>
                        
                        </select><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
    
                                <td><input class="form-control price @error('price') is-invalid @enderror" name="price[]" placeholder="Price" type="text">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                                <td><input class="form-control qty" name="qty[]" placeholder="Quantity" type="text"></td>
                                <td><span class="total">0.00</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{route('supplier.store')}}" method="post">
                    @csrf
                      <div class="card-header">
                        <h4>Supplier Create</h4>
                      </div>
                      <div class="card-body pb-0">
                        <div class="form-group">
                          <label>Supplier Name</label>
                          <div class="input-group">
                            
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Supplier Phone</label>
                          <div class="input-group">
                            
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Address</label>
                          <div class="input-group">
                           <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="10"></textarea>
                           @error('address')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                            @enderror  
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="input-group">
                             <select name="status" class="form-control">
                                 <option value="1">Active</option>
                                 <option value="0">Inactive</option>
                             </select>
                            </div>
                          </div>
                      </div>
                      <div class="card-footer pt-">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Save</button>
                      </div>
                    </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('extra-js')
<script src="{{asset('admin/assets/js/autocal/jautocalc.js')}}"></script>


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
html += '<td class="item-name"><div class="delete-btn"><select name="product_id[]" class="item" ><?php echo fill_unit_select_box();?></select><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>';

html += '<td><input class="form-control price" name="price[]" placeholder="Price" type="text"></td>';
html += '<td><input class="form-control qty" name="qty[]" placeholder="Quantity" type="text"></td>';
html += '<td><span class="total">0.00</span></td></tr>';
$('#item_table').append(html);
setTimeout(function(){
    $('.item').select2();
}, 100);
});

$(document).ready(function() {
    
    $('.customer').select2();
    $('.item').select2();
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