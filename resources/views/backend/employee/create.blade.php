@extends('layouts.master')
@section('content')

<section class="section">
  <div class="section-body">
      <div class="card card-primary">
          <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-header">
                  <h4>Employee Create</h4>
                </div>
                <div class="card-body pb-0">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Employee ID</label>
                          <div class="input-group">
                            <input type="text" name="employee_id" value="{{ old('employee_id') }}" class="form-control @error('employee_id') is-invalid @enderror">
                            @error('employee_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Employee Name</label>
                          <div class="input-group">
                            
                            <input type="text" name="name"  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Designation</label>
                          <div class="input-group">
                            <select class="form-control" name="designation_id">
                              @foreach ($designations as $item)
                              <option value="{{ $item->id }}">{{ $item->designation }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Employee Phone</label>
                          <div class="input-group">
                            
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" >
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <div class="input-group">
                            
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" >
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>NID</label>
                          <div class="input-group">
                            <input type="text" name="nid" value="{{ old('nid') }}" class="form-control @error('nid') is-invalid @enderror" >
                            @error('nid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Joining Date</label>
                          <div class="input-group">
                            
                            <input type="date" name="join_date" value="{{ old('join_date') }}" class="form-control @error('join_date') is-invalid @enderror" >
                            @error('join_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Salary</label>
                          <div class="input-group">
                            <input type="text" name="salary" value="{{ old('salary') }}" class="form-control @error('salary') is-invalid @enderror" >
                            @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Over Time Rate</label>
                          <div class="input-group">
                            <input type="text" name="overtime_rate" value="{{ old('overtime_rate') }}" class="form-control @error('overtime_rate') is-invalid @enderror" >
                            @error('overtime_rate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Address</label>
                          <div class="input-group">
                          <textarea name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" cols="30" rows="10"></textarea>
                          @error('address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                            @enderror  
                        </div>
                        </div>
                      </div>
                      <div class="col-md-6">
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

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Image</label>
                          <div class="input-group">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" >
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      
                  </div>
  

                  {{-- <div class="form-group">
                    <label>Leave Date</label>
                    <div class="input-group">
                      
                      <input type="date" name="leave_date" class="form-control @error('leave_date') is-invalid @enderror" >
                      @error('leave_date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div> --}}

                  
                  
                </div>
                <div class="card-footer pt-">
                  <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Save</button>
                </div>
              </form>
            </div>
  </div>
</section>
@endsection