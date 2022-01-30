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
                                        <th>Parent Id</th>
                                        <th>Section Id</th>
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Category Discount</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $categories)
                                        <tr>
                                            <td>{{$categories->id}}</td>
                                            <td>{{$categories->parent_id}}</td>
                                            <td>{{$categories->section_id}}</td>
                                            <td>{{$categories->category_name}}</td>
                                            <td><img src="/storage/{{$categories->category_image}}" style="width:70px;height:50px;"alt=""></td>
                                            <td>{{$categories->category_discount}}</td>
                                            <td>{{$categories->description}}</td>
                                            <td>{{$categories->status}}</td>
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



  