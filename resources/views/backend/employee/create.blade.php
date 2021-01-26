@extends('layouts.master')


@section('content')
<div class="card card-primary">
<form action="{{route('employee.store')}}" method="post">
    @csrf
      <div class="card-header">
        <h4>Employee Create</h4>
      </div>
      <div class="card-body pb-0">
        <div class="form-group">
          <label>Employee ID</label>
          <div class="input-group">
            
            <input type="text" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror">
            @error('employee_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Employee Name</label>
          <div class="input-group">
            
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Designation</label>
          <div class="input-group">
            
            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" >
            @error('designation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Employee Phone</label>
          <div class="input-group">
            
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" >
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>

        <div class="form-group">
          <label>Email</label>
          <div class="input-group">
            
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" >
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>

        <div class="form-group">
          <label>NID</label>
          <div class="input-group">
            
            <input type="text" name="nid" class="form-control @error('nid') is-invalid @enderror" >
            @error('nid')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>

        <div class="form-group">
          <label>Joining Date</label>
          <div class="input-group">
            
            <input type="date" name="join_date" class="form-control @error('join_date') is-invalid @enderror" >
            @error('join_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>

        <div class="form-group">
          <label>Leave Date</label>
          <div class="input-group">
            
            <input type="date" name="leave_date" class="form-control @error('leave_date') is-invalid @enderror" >
            @error('leave_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>

        <div class="form-group">
          <label>Address</label>
          <div class="input-group">
           <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="10"></textarea>
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