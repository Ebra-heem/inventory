@extends('layouts.master')

@section('content')
<div class="card card-primary">
<form action="{{route('customer.update',$customer->id)}}" method="post">
    @csrf
    {{ method_field('PUT') }}
      <div class="card-header">
        <h4>Customer Edit</h4>
      </div>
      <div class="card-body pb-0">
        <div class="form-group">
          <label>Customer Name</label>
          <div class="input-group">
            
          <input type="text" name="name" value="{{$customer->name}}" class="form-control @error('name') is-invalid @enderror" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Customer Phone</label>
          <div class="input-group">
            
          <input type="text" name="phone" value="{{$customer->phone}}" class="form-control @error('phone') is-invalid @enderror" >
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Customer Email</label>
          <div class="input-group">
            
          <input type="email" name="email" value="{{$customer->email}}" class="form-control @error('email') is-invalid @enderror" >
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Address</label>
          <div class="input-group">
           <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="10">{{$customer->address}}</textarea>
           @error('address')
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