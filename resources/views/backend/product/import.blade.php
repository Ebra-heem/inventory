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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          Products Sample File &nbsp;
                          <a class="btn btn-danger" href="{{ asset('import/products.xlsx') }}" download>
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        
                        <div class="card-body">
                          <div class="col-md-6">
                            <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <br>
                              <br>
                                <div class="form-group">
                                  <div class="text-left">
                                    <label  for="customFile">Excel  file Upload</label>
                                    <input type="file" name="file" class="form-control" id="customFile">
                                </div>
                                </div>
                    
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                          </div>
                        </div>
                       
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

