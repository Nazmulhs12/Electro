@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product page</h1>
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

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Product Name</th>
                            <th>{{$product->pro_name}}</th>
                        </tr>
                        <tr>
                            <th>Product Category</th>
                            <th>{{$product->categories->cat_name}}</th>
                        </tr>
                        <tr>
                            <th>Product Brand</th>
                            <th>{{$product->brands->brand_name}}</th>
                        </tr>
                        <tr>
                            <th>Product Short Description</th>
                            <th>{{$product->pro_Short_desc}}</th>
                        </tr>
                        <tr>
                            <th>Product Long Description</th>
                            <th>{!! $product->pro_long_desc !!}</th>
                        </tr>
                        <tr>
                             <th>Product  Price</th>
                             <th>{!! $product->pro_price !!}</th>
                        </tr>
                        <tr>
                            <th>Product Discount Price</th>
                            <th>{{$product->pro_discount}}</th>
                        </tr>
                        <tr>
                            <th>Product Quantity</th>
                            <th>{{$product->pro_qty}}</th>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <th><img src="{{asset($product->pro_image)}}" width="200"></th>
                        </tr>
                        <tr>
                            <th>Product Gallery Image</th>
                            <td> @foreach($product->productGallery as $gallery)

                                <img src="{{asset($gallery->pro_gallery)}}" width="100">

                                 @endforeach
                            </td>
                        </tr>
                        {{--{{dd($product->productGallery->pro_gallery)}}--}}
                    </table>

                </div>
                <!-- /.card-body -->
    </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
