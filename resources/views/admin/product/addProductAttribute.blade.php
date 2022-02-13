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
                    <h1>Add Product Attribute</h1>
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
            <form name="addProductForm" id="addProductForm" action="/admin/SaveAddProducts" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add Product Attribute</h3>
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
                                    <label>Product Name</label>
                                    <input type="text" readOnly class="form-control" name="product_name" id="product_name" value="{{$data->product_name}}">
                                    <span style="color:red;">@error('product_name'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Product price</label>
                                    <input type="text" class="form-control" name="product_price" id="product_price" value="{{ old('product_price') }}">
                                    <span style="color:red;">@error('product_price'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Product size</label>
                                    <input type="text" class="form-control" name="product_size" id="product_size" value="{{ old('product_size') }}">
                                    <span style="color:red;">@error('product_size'){{$message}}@enderror</span>
                                </div>
                            </div><!-- /.col -->
                        
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Product stock</label>
                                    <input type="text" class="form-control" name="product_stock" id="product_stock" value="{{ old('product_stock') }}">
                                    <span style="color:red;">@error('product_stock'){{$message}}@enderror</span>
                                </div>
                                
                                <div class="form-group">
                                    <label>Product sku</label>
                                    <input type="text" class="form-control" name="product_sku" id="product_sku" value="{{ old('product_sku') }}">
                                    <span style="color:red;">@error('product_sku'){{$message}}@enderror</span>
                                </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="status"></label>
                                    <input type="hidden" class="form-control" name="status" id="status" value="1">
                                    <span style="color:red;">@error('status'){{$message}}@enderror</span>
                                </div>
                            </div>
                            
                            <!-- /.col -->
                        </div> <!-- /.row -->
                    </div><!-- /.card-body -->
                    <div class="card-footer">
                        <button class="btn btn-primary" id="sweetAlert">Add Product</button>
                    </div>
                </div><!-- /.card -->
            </form>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->
 

  @endsection



  