@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Brand page</h1>
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
        @if(Session::get('message'))
            <div class="offset-2 col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

    @endif
    <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Brands</h3>
                    <a href="{{url('brand/create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Brand image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$brand->brand_name}}</td>
                                <td>{{$brand->brand_desc}}</td>
                                <td class="text-center"><img src="{{$brand->brand_image}}" width="100"></td>
                                <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    @if($brand->status == 1)
                                        <a href="{{route('unpublished-category', ['id'=> $brand->id])}}" class="btn btn-sm btn-info" onclick="return confirm('Are You Sure')">
                                            <i class="fa fa-arrow-up"></i>
                                        </a>
                                    @else
                                        <a href="{{route('published-category', ['id'=> $brand->id])}}" class="btn btn-sm btn-warning" onclick="return confirm('Are You Sure')">
                                            <i class="fa fa-arrow-down"></i>
                                        </a>
                                    @endif
                                    <a href="{{url('brand/'.$brand->id.'/edit')}}" class="btn btn-sm btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url('brand/'.$brand->id)}}" class="btn btn-sm btn-danger"onclick="event.preventDefault();
                                       document.getElementById('delete-form').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                        <form id="delete-form" action="{{url('brand/'.$brand->id)}}" method="POST" style="display: none;">
                                            @csrf
                                            @METHOD('delete')
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <<tr>
                            <th>Sl.</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Brand image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
