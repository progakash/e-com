@extends('backend.layouts.app')

@section('title', 'Admin | SubCategory')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Category</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub-Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
         
          <div class="col-md-12">
          <span class="text-success">
              @if(session()->has('status'))
              {{ session('status') }}
              @endif
            </span>
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sub-Category <small>add new sub-category</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('subcatepost') }}" method="post">
              @csrf  
              <div class="card-body">
                <div class="form-group">
                  <label>Select Main Category</label>
                  <select name="mcategory" id="mcategory" class="form-control select2" style="width: 100%;">
                    <option value="">Select</option>
                    @foreach($mdata as $item)
                      @if (old('mcategory') == $item->id)
                          <option value="{{$item->id}}" selected>{{ $item->en_name }}</option>
                      @else
                          <option value="{{$item->id}}" >{{ $item->en_name }}</option>
                      @endif
                    @endforeach
                  </select>
                  <span class="text-danger">@error('mcategory') {{ $message }} @enderror</span>
                </div>

                  <div class="form-group">
                    <label for="sub_cat_name">Sub Category Name</label>
                    <input type="text" name="sub_cat_name" class="form-control" id="sub_cat_name" value="{{old('sub_cat_name')}}" placeholder="Enter sub category name">
                    <span class="text-danger">@error('sub_cat_name') {{ $message }} @enderror</span>
                  </div>
                  
                  <div class="form-group">
                    <label for="sub_cat_name_bangla">Sub Category Name(Bangla)</label>
                    <input type="text" name="sub_cat_name_bangla" class="form-control" id="sub_cat_name_bangla" value="{{old('sub_cat_name_bangla')}}" placeholder="Enter sub category bangla name">
                   </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          
            <div class="col-12">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub Category List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL No</th>
                    <th>Main Category Name</th>
                    <th>Sub Category Name</th>
                    <th>Sub Category Name(Bangla)</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($cat_sub_main_data as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->categorie->en_name }}</td>
                        <td>{{ $item->en_name }}</td>
                        <td>{{ $item->bn_name }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('editsubcat', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                            <!-- <a class="btn btn-danger btn-sm" href="{{ route('deletesubcate', $item->id) }}"><i class="fas fa-trash"></i></a> -->
                        </td>
                      </tr>
                    @endforeach
                  
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
       
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection 