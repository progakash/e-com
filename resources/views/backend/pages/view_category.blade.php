@extends('backend.layouts.app')

@section('title', 'Admin | Category')

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
              <li class="breadcrumb-item active">Category</li>
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
            <!-- jquery validation -->
            <span class="text-success">
              @if(session()->has('status'))
              {{ session('status') }}
              @endif
            </span>

            <div class="card card-primary">

                <div class="card-header">
                  <h3 class="card-title">Category <small>add new category</small></h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                  </div>


                </div><!-- /.card-header -->

              <!-- form start -->
              <!-- {{ $errors }} -->
          <div class="card-body"> 
              <form id="quickForm" action="{{ route('catepost') }}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="cat_name">Name</label>
                    <input type="text" name="cat_name" class="form-control" id="cat_name" value="{{ old('cat_name') }}" placeholder="Enter category name">
                    <span class="text-danger">@error('cat_name') {{ $message }} @enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="cat_name_bangla">Name(Bangla)</label>
                    <input type="text" name="cat_name_bangla" class="form-control" id="cat_name_bangla" value="{{ old('cat_name_bangla') }}" placeholder="Enter category bangla name">
                    <span class="text-danger">@error('cat_name_bangla') {{ $message }} @enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="cat_image">Image</label>
                    <input type="file" name="cat_image" class="form-control" id="cat_image">
                    <!-- <span class="text-danger">@error('cat_image') {{ $message }} @enderror</span> -->
                  </div>
            </div><!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div><!-- /.card-footer -->
              </form>
          </div><!-- /.card -->

        </div><!-- /.col-md-12 -->

        <div class="col-md-12">
      
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Category List</h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL No</th>
                    <th>Category Name</th>
                    <th>Category Name(bangla)</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach ($data as $item)
                    
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ allUpper($item->en_name) }} <!--allUpper() using form helper function--></td>
                    <td>{{ CustomHelper::uppercase($item->bn_name) }} <!--CustomHelper::uppercase using form class based helper function--></td>
                    <td>
                      @if($item->cat_img_name != '')
                        <img src="{{ asset('images/'.$item->cat_img_name) }}" width="40" height="30" alt="no image">
                      @else
                      <img src="{{ asset('images/default.png') }}" height="30" alt="no image">
                      @endif
                    </td>
                    <td class="project-state"><span class="badge badge-success">Active</span></td>
                    <td>
                    <a class="btn btn-info btn-sm" href="{{ route('editcat',$item->id) }}"><i class="fas fa-pencil-alt"></i></a>

                    @can('isAdmin') 
                    <!-- <a class="btn btn-danger btn-sm" href="{{ route('deletecate', $item->id) }}"><i class="fas fa-trash"></i></a> -->
                    @endcan
                  </td>
                  </tr>

                  @endforeach
                  
                  </tbody>
                </table>
              </div><!-- /.card-body -->


            </div> <!-- /.card -->


          </div> <!-- /.col-12 -->
       



          
        </div><!-- /.row --> 
      </div><!-- /.container-fluid -->
    </section> <!-- /.content -->
  </div><!-- /.content-wrapper -->
@endsection