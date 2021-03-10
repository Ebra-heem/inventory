@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
        <div class="section-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
            </ol>
        </nav>
            <div class="row">
              <!--<div class="col-md-3 card">-->
              <!--  <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">-->
              <!--    @csrf-->
              <!--    <br>-->
              <!--    <br>-->
              <!--      <div class="form-group">-->
              <!--        <div class="text-left">-->
              <!--          <label  for="customFile">Excel  file Upload</label>-->
              <!--          <input type="file" name="file" class="form-control" id="customFile">-->
                        
              <!--      </div>-->
              <!--      </div>-->
                
              <!--      <div class="form-group">-->
              <!--        <button type="submit" class="btn btn-primary">Upload</button>-->
              <!--      </div>-->
              <!--  </form>-->
              <!--</div>-->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              +ADD Category
                          </button>  
                        </div>
                        @if(count($categories))
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Database Id</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $product)
                                        <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        
                                        <td>
                                            <a href="{{route('product.create',['category_id'=>$product->id])}}" class="btn btn-success">+ Add Product</a>
                                             <a href="{{route('product.list',$product->id)}}" class="btn btn-md btn-info"><i class="fas fa-eye"></i>Product List</a>
                                             {{-- <a href="{{route('product.edit',$product->id)}}" class="btn btn-md btn-success"><i class="fas fa-user-edit"></i>Edit</a> 
                                             {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->id],'style'=>'display:inline']) !!}
                                             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                              {!! Form::close() !!} --}}
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


     <!-- Modal -->
<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Category Create</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    
                      <div class="card-body pb-0">
                        <div class="form-group">
                          <label>Category Name</label>
                          <div class="input-group">
                            
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-check"></i> Save</button>
                      </div>
                    </form>
                </div>
            </div>
      
      </div>
    </div>
  </div>
</div>
@endsection
@section('extra-js')
 
  <script src="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="{{asset('admin/')}}/assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="{{asset('admin/')}}/assets/js/page/datatables.js"></script>
 
@endsection

