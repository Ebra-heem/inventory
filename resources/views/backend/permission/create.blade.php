@extends('layouts.master')

@section('title', 'Permisstion - create')

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
                    <h3>Create Permission</h3>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     

    <form action="{{route('permission.store')}}" method="post" role="form">
        {{csrf_field()}}
<div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="name">Name </label>
        <input type="text" class="form-control" name="name" placeholder="Ex:permission-read">
        <input type="hidden" class="form-control" name="guard_name" value="web">
      </div>
    </div>
  </div>



      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

                  </div>
                </div>
              <!-- row end -->
              <div class="clearfix"></div>

          </div>
        </div>
        <!-- /page content -->
@endsection
@section('extrascript')
<script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.inputmask.bundle.min.js')}}"></script>
<!-- validator -->
   <script>
     // initialize the validator function
     validator.message.date = 'not a real date';

     // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
     $('form')
       .on('blur', 'input[required], input.optional, select.required', validator.checkField)
       .on('change', 'select.required', validator.checkField)
       .on('keypress', 'input[required][pattern]', validator.keypress);


     $('form').submit(function(e) {
       e.preventDefault();
       var submit = true;

       // evaluate the form using generic validaing
       if (!validator.checkAll($(this))) {
         submit = false;
       }

       if (submit)
         this.submit();

       return false;
     });
   </script>
   <script>
$(document).ready(function() {

  $("#acyear_start").inputmask();
});
</script>
   <!-- /validator -->
@endsection
