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
            <h3 class="text-center">Account Head</h3>
          </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BS">
                                +ADD NEW
                            </button> 
                        </div>
                       
                        @if(count($items))
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Account Name</th>
                                            <th>Account Type</th>                                            
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        <tr>
                                        <td>{{$item->ac_name}}</td>
                                        <td>{{$item->account_type}}</td>
                                        <td>
                                            <a href="{{route('account_group.edit',$item->id)}}" class="btn btn-md btn-success"><i class="fas fa-user-edit"></i></a> 
                                             <a href="{{route('account_group.show',$item->id)}}" class="btn btn-md btn-info"><i class="fas fa-eye"></i></a>
                                             {!! Form::open(['method' => 'DELETE','route' => ['account_group.destroy', $item->id],'style'=>'display:inline']) !!}
                                             {!! Form::submit('Delete', ['class' => 'btn btn-danger fas fa-trash']) !!}
                                              {!! Form::close() !!}
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
            </div>
            <div class="row">
              
            </div>
        </div>
    </section>
     <!--Account Group Sheet Modal -->
     <div class="modal fade" id="BS"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Account Group </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="{{route('account_group.store')}}" method="post">
                        @csrf
                        
                          <div class="card-body pb-0">
                            <div class="form-group">
                              <label>Account Name(*)</label>
                              <div class="input-group">
                                <input type="text" name="ac_name" class="form-control @error('name') is-invalid @enderror">
                                
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                                <label>Select Type(*)</label>
                                <div class="input-group">
                                  <select name="account_type" class="form-control select2" style="width:600px!important;">
                                    <option value="Assets">Assets</option>
                                    <option value="Liabilities">Liabilities</option>
                                    <option value="Revenue">Revenue</option>
                                    <option value="Expense">Expense</option>
                                    <option value="Capital">Capital</option>
                                    <option value="Stock">Stock</option>
                                    <option value="Cost of Goods Sold">Cost of Goods Sold</option>
                                </select>
                                </div>
                              </div>
                          </div>
                          <div class="card-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-check"></i> Save</button>
                          </div>
                        </form>
                    </div>
                </div>
          
          </div>
        </div>
      </div>
    </div>

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

