@extends('layouts.master')

@section('content')
<div class="card card-primary">
<form action="{{route('buyer.update',$buyer->id)}}" method="post">
    @csrf
      <div class="card-header">
        <h4>Buyer Edit</h4>
      </div>
      <div class="card-body pb-0">
        <div class="form-group">
          <label>Buyer Name</label>
          <div class="input-group">
            
          <input type="text" name="name" value="{{$buyer->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Buyer Phone</label>
          <div class="input-group">
            
          <input type="text" name="phone" value="{{$buyer->phone}}" class="form-control @error('phone') is-invalid @enderror" placeholder="Name">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Address</label>
          <div class="input-group">
           <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="10">{{$buyer->address}}</textarea>
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