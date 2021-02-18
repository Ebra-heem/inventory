@extends('layouts.master')


@section('content')
<div class="card card-primary">
 
<form action="{{route('product.store')}}" method="post">
    @csrf
      <div class="card-header">
        <h4>Product Create<small class="text-danger">[* fields are mendatory]</small></h4>
      </div>
      <div class="card-body pb-0">
        <div class="form-group">
          <label>Product Code<small class="text-danger">*</small></label>
          <div class="input-group">
            
            <input type="text" name="code" value="{{ old('code') }}" class="form-control @error('code') is-invalid @enderror" placeholder="e.g FLV-111-A">
            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Product Name<small class="text-danger">*</small></label>
          <div class="input-group">
            
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Product Width</label>
          <div class="input-group">
            
            <input type="text" value="{{ old('width') }}" name="width" class="form-control @error('width') is-invalid @enderror" >
            @error('width')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Product Unit<small class="text-danger">*</small></label>
          <div class="input-group">
            
            <input type="text" name="unit" value="{{ old('unit') }}" class="form-control @error('unit') is-invalid @enderror" placeholder="e.g yard/meter">
            @error('unit')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Product Origin</label>
          <div class="input-group">
            
            <input type="text" name="origin" value="{{ old('origin') }}" class="form-control @error('origin') is-invalid @enderror" placeholder="e.g China">
            @error('origin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Description</label>
          <div class="input-group">
           <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"></textarea>
           @error('description')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
            @enderror  
        </div>
        </div>
        <div class="form-group">
            <label>Status</label>
            <div class="input-group">
             <select name="status" class="form-control">
                 <option value="1">Active</option>
                 <option value="0">Inactive</option>
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