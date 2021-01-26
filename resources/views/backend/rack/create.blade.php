@extends('layouts.master')


@section('content')
<div class="card card-primary">
<form action="{{route('rack.store')}}" method="post">
    @csrf
      <div class="card-header">
        <h4>Rack Create</h4>
      </div>
      <div class="card-body pb-0">
        <div class="form-group">
          <label>Rack No</label>
          <div class="input-group">
            
            <input type="text" name="rack_no" class="form-control @error('rack_no') is-invalid @enderror"
             placeholder="Rack No">
            @error('rack_no')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>

        <div class="form-group">
            <label>Wirehouse</label>
            <div class="input-group">
             <select name="wirehouse_id" class="form-control">
               @foreach ($wirehouses as $item)
               <option value="{{ $item->id }}">{{ $item->name }}</option>
               @endforeach
             
                
             </select>
            </div>
          </div>
      </div>
      <div class="card-footer pt-">
        <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Save</button>
      </div>
    </form>
  </div>
@endsection