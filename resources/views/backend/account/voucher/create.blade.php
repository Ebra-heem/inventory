@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main Content -->
@php
function fill_unit_select_box()
{ 
 $output = '';
//$result=DB::table('chart_of_accounts')->get();
$result=App\ChartOfAccount::with('group')->get();

 foreach($result as $row)
 {
  $output .= '<option value="'.$row->id.'">'.$row->account_name.'-'.$row->group->account_type.'</option>';
 }
 return $output;
}

@endphp
    <section class="section">
        <div class="section-body">
            <form action="{{ route('voucher.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Voucher</h4>
                            </div>
                            <div class="row card-body">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date(*)</label>
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
                                        <label>Voucher Type(*)</label>
                                        <div class="input-group">
                                            <select name="voucher_type" class="form-control select2 voucher_type" style="width:300px!important;">
                                                <option value="payment">payment</option>
                                                <option value="receipt">receipt</option>
                                                <option value="journal">journal</option>
                                                <option value="contra">contra</option>
                                                <option value="av">adjustment </option>
                                                <option value="ob">opening balance</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Payment Type(*)</label>
                                        <div class="input-group">
                                            <select name="payment_type" class="form-control select2 payment_type" style="width:300px!important;">
                                                <option value="cash">Cash </option>
                                                <option value="bank">Bank</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Narrarion</label>
                                        <div class="input-group">
                                            <input type="text" name="narration" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Voucher No(*)</label>
                                        <div class="input-group">
                                            <input type="text" name="voucher_number" class="form-control voucher_number">
                                            <input type="hidden" value="{{ isset($last_id->id)?$last_id->id:'00' }}" class="form-control voucher_id">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4" id="bank">
                                    <div class="form-group">
                                        <label>Bank(*)</label>
                                        <div class="input-group">
                                            <select name="bank_id" class="form-control select2 " style="width:300px!important;">
                                                @foreach ($banks as $item)
                                                <option value="{{ $item->id }}">{{ $item->bank_name }}-{{ $item->ac_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row card-body">
                                <div class="col-md-10">
                                <button class="btn btn-md btn-primary add-voucher-btn">Add Ledger</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-lg btn-success ">+Save</button>
                                </div>
                                    <div class="table-responsive">
                                        <table class="table" style="width:100%;" id="item_table">
                                            <thead>
                                                <tr>
                                                    <th>Account Type</th>
                                                    <th>Debit</th>                                            
                                                    <th>Credit</th>                                            
                                                    <th>Remarks</th>                                          
                                                    <th>Action</th>                                          
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <select name="chart_account_id[]" class="form-control select2" style="width:300px!important;">
                                                                
                                                                @foreach ($items as $item)
                                                                <option value="{{ $item->id }}">{{ $item->account_name }}-{{ $item->group->account_type}}</option>  
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label>Debit</label>
                                                            <div class="input-group">
                                                                <input type="text" value="0" name="debit[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label>Credit</label>
                                                            <div class="input-group">
                                                                <input type="text"  value="0" name="credit[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label>Remarks</label>
                                                            <div class="input-group">
                                                                <input type="text" name="remarks[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </section>


@endsection
@section('extra-js')
<script>
    $(document).ready(function () {
    $('#bank').css("display","none")
    //voucher type change code 
    var d = new Date();
    let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
    let mo = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(d);
    let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
    let id=$('.voucher_id').val()
    let format=ye+'-'+mo+'-'+da+'-'+id
    
    $('.voucher_number').val('PV-'+format)
    $('.voucher_type').change(function(){
    var vt=$(this).val();
    if(vt=='receipt'){
        $('.voucher_number').val('RV-'+format)
    }else if(vt=='journal'){
        $('.voucher_number').val('JV-'+format)
    }else if(vt=='contra'){
        $('.voucher_number').val('CV-'+format)
    }else if(vt=='ob'){
        $('.voucher_number').val('OB-'+format)
    }else if(vt=='av'){
        $('.voucher_number').val('AV-'+format)
    }else{
        $('.voucher_number').val('PV-'+format)
    }
    });

    //payment type code here
    $('.payment_type').change(function(){
    var pt=$(this).val();
    if(pt=='bank'){
        $('#bank').css("display","block")
    }else{
        $('#bank').css("display","none")
    }
    });

    $(document).on('click', '.add-voucher-btn', function(e){
        e.preventDefault()
        var html = '';
        html += '<tr>';
        html += '<td><div class="input-group"><select name="chart_account_id[]" class="form-control select2" style="width:300px!important;"><?php echo fill_unit_select_box(); ?></select></div></td>';
        html += '<td><div class="form-group"><label>Debit</label><div class="input-group"><input type="text"  value="0" name="debit[]" class="form-control"></div></div></td>';
        html += '<td><div class="form-group"><label>Credit</label><div class="input-group"><input type="text"  value="0" name="credit[]" class="form-control"></div></div></td>';
        html += '<td><div class="form-group"><label>Remarks</label><div class="input-group"><input type="text" name="remarks[]" class="form-control"></div></div></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus">X</span></button></td></tr>';
        $('#item_table').append(html);
        setTimeout(function(){
            $('.select2').select2();
        }, 100);
    });

    $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
    });
    $('.select2').select2();
})
</script>
{{-- <script src="{{asset('admin/')}}/assets/js/voucher.js"></script> --}}
@endsection
