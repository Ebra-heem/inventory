@extends('layouts.master')

@section('title', 'Users Action-Permission')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
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
            <th>Display Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
  </thead>
      <tbody>
        @forelse($permissions as $permission)
            <tr>
                <td>{{$permission->name}}</td>
                <td>{{$permission->display_name}}</td>
                <td>{{$permission->description}}</td>
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
@section('extrascript')
<!-- dataTables -->
<script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.flash.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/vfs_fonts.js')}}"></script>

   <script>

     $(document).ready(function() {

     //datatables code
     var handleDataTableButtons = function() {
       if ($("#datatable-buttons").length) {
         $("#datatable-buttons").DataTable({
           responsive: true,
           dom: "Bfrtip",
           buttons: [
             {
               extend: "copy",
               className: "btn-sm"
             },
             {
               extend: "csv",
               className: "btn-sm"
             },
             {
               extend: "excel",
               className: "btn-sm"
             },
             {
               extend: "pdfHtml5",
               className: "btn-sm"
             },
             {
               extend: "print",
               className: "btn-sm"
             },
           ],
           responsive: true
         });
       }
     };

     TableManageButtons = function() {
       "use strict";
       return {
         init: function() {
           handleDataTableButtons();
         }
       };
     }();

    TableManageButtons.init();

   });
   </script>
   <!-- /validator -->
@endsection
