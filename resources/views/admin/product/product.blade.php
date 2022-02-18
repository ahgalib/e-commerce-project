@extends('layouts.admin_layouts.admin-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Admin setting</li>
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
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if(Session::get('editSuccess'))
                    <div class="alert alert-success">
                        {{Session::get('editSuccess')}}
                    </div>
                @endif
                @if(Session::get('addSuccess'))
                    <div class="alert alert-success">
                        {{Session::get('addSuccess')}}
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Product Shows Here</h3>
                        </div> 
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Product Name</th> 
                                        <th>Category Name</th>
                                        <th>Section Name</th> 
                                        <th>Brand Name</th>
                                        <th>Product Color</th>
                                        <th>Product Price</th>
                                        <th>Product Image</th>
                                        <th>Product Attribute</th>
                                        <th>Add multiImages </th>
                                        <th colspan="2">Action</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=> $products)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$products->product_name}}</td>
                                            <td>{{$products->category->category_name}}</td>
                                            <td>{{$products->section->name}}</td>
                                           
                                            <td>{{$products->Brand->name}}</td>
                                           
                                            <td>{{$products->product_color}}</td>
                                            <td>{{$products->product_price}}</td>
                                            <td><img src="/storage/{{$products->main_image}}" alt="" style="width:100px;height:80px;"></td>
                                          
                                            <td><a href="addProductAttributes/{{$products->id}}">product Attributes</a></td>
                                            <td><a href="addProductimages/{{$products->id}}">Product Image</a></td>
                                            <td><a href="editproduct/{{$products->id}}"><button class="btn btn-warning"> Edit</button></a></td>
                                            <td><a href="javascript:void(0)"class="deleteButton"  record="product" recordId="{{$products->id}}"><button class="btn btn-danger">Delete</button></a></td>
                                            
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col end -->
            </div> <!-- /.row end -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

  @endsection



  