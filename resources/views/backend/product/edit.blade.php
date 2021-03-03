@extends('layouts.master')


@section('content')
<div class="card card-primary">
<form action="{{route('product.update',$product->id)}}" method="post">
    @csrf
    {{ method_field('PUT') }}
      <div class="card-header">
        <h4>Product Update</h4>
      </div>
      <div class="card-body pb-0">
          <div class="row">
              <div class="col-md-4">
                   <div class="form-group">
                      <label>Product Code<small class="text-danger">*</small></label>
                      <div class="input-group">
                        
                        <input type="text" name="code" value="{{ $product->code }}" class="form-control @error('code') is-invalid @enderror" placeholder="e.g FLV-111-A">
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                      </div>
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                      <label>Product Name<small class="text-danger">*</small></label>
                      <div class="input-group">
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" >
                        <input type="hidden" name="category_id" value="{{ $product->category_id }}"  >
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                      </div>
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                      <label>Product Unit<small class="text-danger">*</small></label>
                      <div class="input-group">
                        
                        <div class="input-group">
                            <select name="unit" class="form-control"  required>
                                <option value="meter">meter</option>
                                <option value="yard">yard</option>
                            </select>
                        </div>
                        @error('unit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                      </div>
                    </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                    <label>Wirehouse(*)</label>
                        <div class="input-group">
                            <select name="wirehouse_id" class="form-control select2" style="width: 600px!important;" required>
                                <option value="1">Default Warehouse</option>
                            </select>
                        </div>
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                        <label>Total Qty(*)</label>
                        <div class="input-group">
                            <input type="text" name="wh_qty" value="{{ $product->width }}" class="form-control @error('wh_qty') is-invalid @enderror" required>
                                <input type="hidden" name="total_qty" >
                                  @error('wh_qty')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                        </div>
                    </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                        <label>Purchase Price(*)</label>
                        <div class="input-group">
                            <input type="text" name="purchase_price" value="{{ $product->origin }}" class="form-control @error('purchase_price') is-invalid @enderror" required>
                                  @error('purchase_price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                        </div>
                    </div>
              </div>
              <div class="col-md-4">
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
             
          </div>
        <!--<div class="form-group">-->
        <!--  <label>Product Code</label>-->
        <!--  <div class="input-group">-->
            
        <!--    <input type="text" name="code" value="{{ $product->code }}" class="form-control @error('code') is-invalid @enderror" >-->
        <!--    @error('code')-->
        <!--    <span class="invalid-feedback" role="alert">-->
        <!--        <strong>{{ $message }}</strong>-->
        <!--    </span>-->
        <!--     @enderror-->
        <!--  </div>-->
        <!--</div>-->
        <!--<div class="form-group">-->
        <!--  <label>Product Name</label>-->
        <!--  <div class="input-group">-->
            
        <!--    <input type="text" name="name" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" >-->
        <!--    @error('name')-->
        <!--    <span class="invalid-feedback" role="alert">-->
        <!--        <strong>{{ $message }}</strong>-->
        <!--    </span>-->
        <!--     @enderror-->
        <!--  </div>-->
        <!--</div>-->
        <!--<div class="form-group">-->
        <!--  <label>Product Width</label>-->
        <!--  <div class="input-group">-->
            
        <!--    <input type="text" name="width" value="{{ $product->width }}" class="form-control @error('width') is-invalid @enderror" >-->
        <!--    @error('width')-->
        <!--    <span class="invalid-feedback" role="alert">-->
        <!--        <strong>{{ $message }}</strong>-->
        <!--    </span>-->
        <!--     @enderror-->
        <!--  </div>-->
        <!--</div>-->
        <!--<div class="form-group">-->
        <!--  <label>Product Unit</label>-->
        <!--  <div class="input-group">-->
            
        <!--    <input type="text" name="unit" value="{{ $product->unit }}" class="form-control @error('unit') is-invalid @enderror" >-->
        <!--    @error('unit')-->
        <!--    <span class="invalid-feedback" role="alert">-->
        <!--        <strong>{{ $message }}</strong>-->
        <!--    </span>-->
        <!--     @enderror-->
        <!--  </div>-->
        <!--</div>-->
        <!--<div class="form-group">-->
        <!--  <label>Product Origin</label>-->
        <!--  <div class="input-group">-->
            
        <!--    <input type="text" name="origin" value="{{ $product->origin }}" class="form-control @error('origin') is-invalid @enderror" >-->
        <!--    @error('origin')-->
        <!--    <span class="invalid-feedback" role="alert">-->
        <!--        <strong>{{ $message }}</strong>-->
        <!--    </span>-->
        <!--     @enderror-->
        <!--  </div>-->
        <!--</div>-->
        <!--<div class="form-group">-->
        <!--  <label>Description</label>-->
        <!--  <div class="input-group">-->
        <!--   <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">-->
        <!--    {{ $product->description }}-->
        <!--  </textarea>-->
        <!--   @error('description')-->
        <!--   <span class="invalid-feedback" role="alert">-->
        <!--       <strong>{{ $message }}</strong>-->
        <!--   </span>-->
        <!--    @enderror  -->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="form-group">-->
        <!--    <label>Status</label>-->
        <!--    <div class="input-group">-->
        <!--     <select name="status" class="form-control">-->
        <!--         <option value="1">Active</option>-->
        <!--         <option value="0">Inactive</option>-->
        <!--     </select>-->
        <!--    </div>-->
        <!--  </div>-->
      </div>
      <div class="card-footer pt-">
        <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Update</button>
      </div>
    </form>
  </div>
@endsection