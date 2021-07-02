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
                             <h3>Employee Information</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Employee ID:</td>
                                    <td>{{ $employee->name }}</td>
                                </tr>
                                <tr>
                                    <td>Employee Name:</td>
                                    <td>{{ $employee->name }}</td>
                                </tr>
                                <tr>
                                    <td>Employee Phone:</td>
                                    <td>{{ $employee->phone }}</td>
                                </tr>
    
                                <tr>
                                    <td>Employee Email:</td>
                                    <td>{{ $employee->email }}</td>
                                </tr>
                                <tr>
                                    <td>Employee NID:</td>
                                    <td>{{ $employee->nid }}</td>
                                </tr>
                                <tr>
                                    <td>Employee Joining Date:</td>
                                    <td>{{ $employee->join_date }}</td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td>{{ $employee->address }}</td>
                                </tr>
                                <tr>
                                    <td>Employee Image:</td>
                                    <td><img src="{{ asset('images/'.$employee->image) }}" width="150px" height="150px" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></td>
                                </tr>
                            </table>
                        </div>
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

