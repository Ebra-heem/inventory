@extends('layouts.master')

@section('extra-css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="card card-primary">
<form action="{{route('income.store')}}" method="post">
    @csrf
      <div class="card-header">
        <h4>Income Create</h4>
      </div>
      <div class="card-body pb-0">
        <div class="form-group">
          <label>Date</label>
          <div class="input-group">
            
            <input id="datepicker"  data-date-format="dd/mm/yyyy" name="date" value="{{$today->format('d/m/Y')}}"  class="form-control @error('date') is-invalid @enderror">
            @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Name</label>
          <div class="input-group">
            
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Amount</label>
          <div class="input-group">
            
            <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="amount">
            @error('amount')
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
            <label>Payment Type</label>
            <div class="input-group">
             <select name="payment_type" class="form-control">
                 <option selected value="1">Cash</option>
                 <option value="0">Check</option>
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
@section('extra-js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
@endsection