@extends('layouts.master')


@section('content')

<section class="section">
  <div class="section-body card">
      <div class="alert alert-primary" role="alert">
          <h3 class="text-center">Roles</h3>
      </div>
      <div class="row card-header">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                <h2>Create New Role</h2>
                </div>
                <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
              </div>
          </div>
        </div>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
        @endif
        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="row card-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Name:</strong>
                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
           <div class="col-md-12">
            <strong>Give Permissions:</strong>
           </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                  <strong>Permission:</strong>
                  <br/>
                  @foreach($permission as $value)
                  <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                  {{ $value->name }}</label>
                  <br/>
                  @endforeach
                </div>
            </div> --}}
            <div class="col-md-3">
              <div class="form-group text-left">
                        <h6>Read </h6>
                        @foreach($permission as $value)
                        <?php $val = explode('-',$value->name);
                        ?>
                        
                        @if($val[1]=='read'||$val[1]=='list')
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                          {{ $value->name }}</label><br/>
                    @endif
                   @endforeach
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group text-left">
                        <h6>Create </h6>
                        @foreach($permission as $value)
                        <?php $val = explode('-',$value->name);
                        ?>
                        
                        @if($val[1]=='create')
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                          {{ $value->name }}</label><br/>
                    @endif
                   @endforeach
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group text-left">
                        <h6>Edit </h6>
                        @foreach($permission as $value)
                        <?php $val = explode('-',$value->name);
                        ?>
                        
                        @if($val[1]=='edit')
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                          {{ $value->name }}</label><br/>
                    @endif
                   @endforeach
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group text-left">
                        <h6>Delete </h6>
                        @foreach($permission as $value)
                        <?php $val = explode('-',$value->name);
                        ?>
                        
                        @if($val[1]=='delete')
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                          {{ $value->name }}</label><br/>
                    @endif
                   @endforeach
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
        <p class="text-center text-primary"><small>Tutorial by rscoder.com</small></p>
  </div>
</section>
@endsection