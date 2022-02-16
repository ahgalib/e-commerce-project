@extends('layouts.admin_layouts.admin-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product Images</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

     <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add Product Images</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name:</label>
                            {{$data->product_name}}
                            </div>
                            <div class="form-group">
                                <label>Product color:</label>
                                {{$data->product_color}}
                            </div>
                            <div class="form-group">
                                <label>Product code:</label>
                                {{$data->product_code}}
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div>
                                <img src="/storage/{{$data->main_image}}" alt="" style="width:220px;height:180px;">
                            </div>
                        </div><!-- /.col -->
                        <form action="/admin/saveProductimages/{{$data->id}}" method="post" enctype="multipart/form-data">
                        @if(Session::get('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                        @endif
                            @csrf
                            <div class="field_wrapper" style="margin-top:20px;">
                               
                                <div class="form-group">
                                    <label for="exampleInputFile">Product Image(you can choose multiple images)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" multiple="" class="custom-file-input" name="image[]" id="product_video">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        
                                    </div>
                                    <span style="color:red;">@error('product_video'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <button class="btn btn-success mt-3" id="sweetAlert">ADD Image</button>
                        </form>
                    </div> <!-- /.row -->
                </div><!-- /.card-body -->
            </div><!-- /.card -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Attribute For That Product</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Product Image</th> 
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['ProductImage'] as $products)
                                        <tr>
                                        <td><img src="/storage/{{$products->image}}" alt="" style="width:200px;height:180px;"></td>
                                        <td><a href="javascript:void(0)"class="deleteButton"  record="productImages" recordId="{{$products->id}}"><button class="btn btn-danger">Delete</button></a></td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col end -->
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->
 

@endsection



  