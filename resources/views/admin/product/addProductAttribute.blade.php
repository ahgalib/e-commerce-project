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
                                    <label>Product Name:</label>
                               {{$data->product_name}}
                                </div>
                                <div class="form-group">
                                    <label>Product price:</label>
                                    {{$data->product_price}}
                                </div>
                                <div class="form-group">
                                    <label>Product size:</label>
                                    {{$data->product_code}}
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <img src="/storage/{{$data->main_image}}" alt="" style="width:220px;height:180px;">
                                </div>
                            </div><!-- /.col -->

                            <div class="field_wrapper" style="margin-top:20px;">
                                <div>
                                    <h2>Add Product Attribte</h2>
                                    <input type="text" name="field_name[]" value="" placeholder="product size"/>
                                    <input type="text" name="sku[]" value="" placeholder="product sku"/>
                                    <input type="text" name="price[]" value="" placeholder="product price"/>
                                    <input type="text" name="stock[]" value="" placeholder="product stock"/>
                                    <a href="javascript:void(0);" class="add_button" title="Add field">add field</a>
                                </div>
                                
                            </div>
                          
                            
                            <!-- /.col -->
                        </div> <!-- /.row -->
                    </div><!-- /.card-body -->
                   
                </div><!-- /.card -->
            </form>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->
 

  @endsection



  