@extends('layouts.master')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h1 class="text-center">Invoice Update</h1>
    </div>
    <div class="card-body">
      <form action="{{route('invoice.update',$invoice->id)}}" method="POST">
        @csrf
        @method('put')
      <div class="row">
        <div class="col-4">
          Total Bill Amount: {{$invoice->total}}/- <br>
          Previous Paid Amount: {{$invoice->paid}}/- <br>
          Previous Due Amount: {{$invoice->due}}/- <br>
          Last Payment Date: {{$invoice->updated_at}} <br>
      </div>
    
      <div class="col-4">
        <label for="paid">Paid</label>
        <input type="number" class="form-control" name="paid" id="paid">
      </div>
      <div class="col-1">
        <label for="paid"></label>
        <input type="submit" class="btn btn-info form-control" value="SAVE">
      </div>
      
      </div>
    </form>
    </div>
</div>
@endsection