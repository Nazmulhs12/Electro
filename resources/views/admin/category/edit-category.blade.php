@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Brand</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="offset-2 col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Brand</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('update-category')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" value="{{$category->cat_name}}" name="cat_name"  placeholder="Enter Category Name">
                            <input type="hidden" class="form-control" value="{{$category->id}}" name="id" >
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <input type="text" class="form-control" value="{{$category->cat_desc}}" name="cat_desc" placeholder="Enter Category Description">
                        </div>
                        <div class="form-group">
                            <label>Publication Status</label>
                            <select class="form-control" name="status">
                                <option>---Select Status---</option>
                                <option value="1" {{$category->status == 1 ? 'Selected': ''}}>Published</option>
                                <option value="0" {{$category->status == 0 ? 'Selected': ''}}>Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
