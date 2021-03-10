@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <!-- row start -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Permissions</h3>
    <a class="btn btn-success pull-right" href="{{route('permission.create')}}"> <i class="fa fa-plus"></i> Create Permission</a>
    <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
    <table class="table table-striped table-bordered" id="datatable-buttons">
      <thead>
        <tr>
            <th>Name</th>
            <th>Guard Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
  </thead>
      <tbody>
        @forelse($permissions as $permission)
            <tr>
                <td>{{$permission->name}}</td>
                <td>{{$permission->gaurd_name}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('permission.edit',$permission->id)}}">Edit</a> 
                </td>
                <td>
                  <form action="{{route('permission.destroy',$permission->id)}}"  method="POST">
                       {{csrf_field()}}
                       {{method_field('DELETE')}}
                       <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                     </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>No roles</td>
            </tr>
            @endforelse
      </tbody>
    </table>
  </div>
</div>


                    <div class="clearfix"></div>
                  </div>
                  
                </div>
              <!-- row end -->
              <div class="clearfix"></div>

          </div>
        </div>
      </div>
    </div>
        <!-- /page content -->

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
