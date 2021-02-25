@extends('layouts.master')
@section('extra-css')
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('admin/')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<!-- Main Content -->

    <section class="section">
        <div class="section-body">

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Balance Sheet Item</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BS">
                                +ADD NEW
                            </button> 
                        </div>
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                

                                 @foreach($bs_items as $item)
                                 @if($item->childs->count()>0)
                                    <div class="">
                                        <ul class="">
                                            @php
                                                $total=DB::table('ledgers')->where('chart_account_id',$item->id)->sum('amount');
                                            @endphp
                                            <li><a href="#"><h5><b>{{$item->name}}</h5></b></a>
                                                <span class="text-right">{{ $total>0? $total:' ' }}</span>
                                            </li>
                                            @foreach($item->childs as $subMenu)
                                            @php
                                                $Drtotal=DB::table('ledgers')->where('account_type','Dr')->where('chart_account_id',$subMenu->id)->sum('amount');
                                                $Crtotal=DB::table('ledgers')->where('account_type','Cr')->where('chart_account_id',$subMenu->id)->sum('amount');
                                            @endphp
                                            <ul>
                                            <li><a href="{{route('chart_account.show',$subMenu->id)}}">--{{$subMenu->name}}</a>
                                                <span class="text-right">@include('backend.chart_account.bal',['chartAccount' => $subMenu->id])</span></li>
                                            </ul>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                 @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Income Statement Item</h4>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#IS">
                                +ADD NEW
                            </button> 
                        </div>
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                @foreach($is_items as $category)
                                <ul>
                                    <li><h5><b>{{$category->name}}</h5></b></li>
                                    @if(count($category->childs))
                                        @include('backend.chart_account.sub_account',['subcategories' => $category->childs])
                                    @endif
                                </ul>
                                 @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              
            </div>
        </div>
    </section>
     <!--Balance Sheet Modal -->
     <div class="modal fade" id="BS"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Balance Sheet Create</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="{{route('chart_account.store')}}" method="post">
                        @csrf
                        
                          <div class="card-body pb-0">
                            <div class="form-group">
                              <label>Account Name(*)</label>
                              <div class="input-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                <input type="hidden" name="account" value="BS" >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                                <label>Select Group(*)</label>
                                <div class="input-group">
                                  <select name="parent_id" class="form-control select2" style="width:600px!important;">
                                    <option value="0">Primary</option>
                                    @foreach($bs_items as $category)
                                    <ul>
                                      <li><option value="{{$category->id}}"><b>{{$category->name}}</b>
                                        </option></li>
                                        @if(count($category->childs))
                                            @include('backend.chart_account.sub_option',['subcategories' => $category->childs])
                                        @endif
                                    </ul>
                                 @endforeach
                                </select>
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
         <!--Income Statement Modal -->
         <div class="modal fade" id="IS"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Income Statement</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{route('chart_account.store')}}" method="post">
                            @csrf
                            
                              <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Account Name(*)</label>
                                    <div class="input-group">
                                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                      <input type="hidden" name="account" value="IS" >
                                      @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                    </div>
                                  </div>
                                <div class="form-group">
                                    <label>Select Group</label>
                                    <div class="input-group">
                                      
                                      <select name="parent_id" class="form-control select2" style="width:600px!important;">
                                        <option value="0">Primary</option>
                                        @foreach($is_items as $category)
                                        <ul>
                                          <li><option value="{{$category->id}}"><b>{{$category->name}}</b>
                                            </option></li>
                                            @if(count($category->childs))
                                                @include('backend.chart_account.sub_option',['subcategories' => $category->childs])
                                            @endif
                                        </ul>
                                     @endforeach
                                      </select>
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

