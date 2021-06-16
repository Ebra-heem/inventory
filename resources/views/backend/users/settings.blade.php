@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
        <div class="section-body">
            <div class="row card">
                <div class="col-md-12 margin-tb">
                    <div class="card-body">
                        <form class="form-label-left" novalidate method="post" action="{{URL::route('user.settings')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="for" value="info">
                          <div class="row">
                            <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label" for="firstname">Name <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-info blue"></i></span>
                                <input id="name" type="text" class="form-control"  name="name" value="{{$user->name}}" placeholder="Name" required="required" type="text">
                            </div>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
    
                          </div>
                        </div>
                          
                        
                      </div>
                        <div class="row">
                          
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label" for="email">Email
                            </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope blue"></i></span>
                              <input type="text" id="email" name="email" disabled="disabled" placeholder="baiust@baiust.com" value="{{$user->email}}" class="form-control">
                            </div>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
    
                          </div>
                        </div>
                        
                      </div>
    
                          
                          <div class="item form-group">
                                  {{-- <button type="submit" class="btn btn-primary btn-attend"><i class="fa fa-refresh"></i>  Update Info </button> --}}
                            </div>
                        </form>
    
                        <hr>
    
                        <form class="form-label-left" novalidate method="post" action="{{URL::route('user.settings')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="for" value="password"> 
                          <div class="row">
                            <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label" for="oldpassword">Current Password <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key blue"></i></span>
                                <input id="name" class="form-control"  name="oldpassword" value="" required="required" type="password">
                            </div>
                            <span class="text-danger">{{ $errors->first('oldpassword') }}</span>
                          </div>
                        </div>
                          <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label" for="password">New Password<span class="required">*</span>
                            </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-key blue"></i></span>
                              <input id="name" class="form-control"  name="password" value="" type="password">
                            </div>
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label" for="confirmpassword">Confirm Password<span class="required">*</span>
                            </label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-key blue"></i></span>
                              <input type="password" class="form-control"  name="password_confirmation" value="" required="required">
                            </div>
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                                  <button type="submit" class="btn btn-primary btn-attend"><i class="fa fa-refresh"></i>  Update Password </button>
                            </div>
                    </form>
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

