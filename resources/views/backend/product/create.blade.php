@extends('layouts.master')


@section('content')
<div class="card card-primary">
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
      @endif
<form action="{{route('product.store')}}" method="post">
    @csrf
      <div class="card-header">
        <h4>Product Create</h4>
      </div>
      <div class="card-body pb-0">
        <div class="form-group">
          <label>Product Code</label>
          <div class="input-group">
            
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" placeholder="e.g FLV-111-A">
            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Product Name</label>
          <div class="input-group">
            
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
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
            
            <input type="text" name="width" class="form-control @error('width') is-invalid @enderror" placeholder="Width">
            @error('width')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Product Unit</label>
          <div class="input-group">
            
            <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" placeholder="e.g yard/meter">
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
            
            <input type="text" name="origin" class="form-control @error('origin') is-invalid @enderror" placeholder="e.g China">
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