@extends('layouts.admin_layouts.admin-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Section</h1>
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
                            <h3 class="card-title">DataTable with default features</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body">
                            <table id="section" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                         <!-- <th>Parent Id</th> -->
                                        <th>Section Name</th> 
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Category Discount</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=> $categories)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                             <!-- <td>{{$categories->parent_id}}</td> -->
                                            <td>{{$categories->section->name}}</td>
                                            <td>{{$categories->category_name}}</td>
                                            <td><img src="/storage/{{$categories->category_image}}" style="width:70px;height:50px;"alt=""></td>
                                            <td>{{$categories->category_discount}}</td>
                                            <td>{{$categories->description}}</td>
                                            <td>{{$categories->status}}</td>
                                            <td><a href="editcategories/{{$categories->id}}"><button class="btn btn-warning"> Edit</button></a></td>
                                            <td><a href="javascript:void(0)"class="deleteButton"  record="categories" recordId="{{$categories->id}}"><button class="btn btn-danger">Delete</button></a></td>
                                            <!-- href="deletecategories/{{$categories->id}}" link for delete so that we can use sweet alert -->
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



  