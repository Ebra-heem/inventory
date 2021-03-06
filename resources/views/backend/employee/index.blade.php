@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <a href="{{route('employee.create')}}" class="btn btn-success">+ Add Employee</a>
                        </div>
                        @if(count($employees))
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#NO</th>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employees as $employee)
                                        <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$employee->employee_id}}</td>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td><img src="{{ asset('images/'.$employee->image) }}" alt="{{$employee->name}}" width="75px" height="60px"/></td>
                                        <td>{{$employee->address}}</td>
                                        <td>{{$employee->status==1?'Active':'Inactive'}}</td>
                                        <td>
                                            <a href="{{route('employee.show',$employee->id)}}" class="btn btn-md btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-md btn-success"><i class="fas fa-user-edit"></i></a> 
                                             {!! Form::open(['method' => 'DELETE','route' => ['employee.destroy', $employee->id],'style'=>'display:inline']) !!}
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

