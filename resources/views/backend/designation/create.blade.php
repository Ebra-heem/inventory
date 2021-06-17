@extends('layouts.master')


@section('content')
<div class="card card-primary">
<form action="{{route('designation.store')}}" method="post">
    @csrf
      <div class="card-header">
        <h4>Designation</h4>
      </div>
      <div class="card-body pb-0">
        <div class="form-group">
          <label>Designation</label>
          <div class="input-group">
            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror">
            @error('designation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Detail</label>
          <div class="input-group">
            <input type="text" name="detail" class="form-control @error('detail') is-invalid @enderror">
            @error('detail')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
      </div>
      <div class="card-footer pt-">
        <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Save</button>
      </div>
    </form>
  </div>
@endsection