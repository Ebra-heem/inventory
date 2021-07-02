@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
        <div class="section-body">
            <div class="alert alert-primary" role="alert">
                <h3 class="text-center">Income Statement</h3>
            </div>
            <form action="{{route('general-ledger.index')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>From Date</label>
                        <div class="input-group">
                          
                          <input id="datepicker"  data-date-format="dd/mm/yyyy" name="from_date" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
                         
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>To Date</label>
                        <div class="input-group">
                          
                          <input id="datepicker2"  data-date-format="dd/mm/yyyy" name="to_date" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-info" style="margin-top:28px;"><i class="fas fa-filter"></i>Filter</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                       
                        @if(count($ledgers))
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>SL#No</th>
                                                                                       
                                            <th>Chart Account </th>                                            
                                            <th>Debit</th>                                            
                                            <th>Credit </th>                                                                                
                                            <th>Account Type</th>                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_d=0;
                                            $total_c=0;
                                        @endphp
                                        @foreach($ledgers as $item)
                                        <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->account_name}}</td>
                                        @php
                                            $td=0;
                                            $tc=0;
                                        @endphp
                                            @foreach ($item->ledger as $it)
                                                @php
                                                    $td+=$it->debit;
                                                    $tc+=$it->credit;
                                                @endphp
                                            @endforeach
                                        <td>{{$total_d+=$td}}</td>
                                        <td>{{$total_c+=$tc}}</td>
                                        <td>{{$item->group->account_name}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <h3>Total Income: {{ $total_c }}</h3>
                            <h3>Total Cost: {{ $total_d }}</h3>
                            <h3>Total Profit/Loss: {{ $total_c-$total_d }}</h3>
                        </div>
                        @endif
                    </div>
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
 
@endsection

