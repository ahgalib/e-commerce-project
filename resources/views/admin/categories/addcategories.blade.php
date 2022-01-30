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
                    <h1>Add category</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form name="addCategoryForm" id="addCategoryForm" action="{{ url('admin/saveAddCategory') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add category</h3>
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
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name">
                                    <span style="color:red;">@error('category_name'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Select Category Level</label>
                                    <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                                        <option value="0">Choose One</option>
                                    </select>
                                    <span style="color:red;">@error('parent_id'){{$message}}@enderror</span>
                                </div>
                            </div><!-- /.col -->
                        
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Select Section</label>
                                    <select name="section_id" id="section_id" class="form-control select2" style="width: 100%;">
                                        <option>Choose One</option>
                                        @foreach($data as $section)
                                            <option value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red;">@error('section_id'){{$message}}@enderror</span>
                                </div>
                                <!-- /.form-group -->
                                <!-- .form-group -->
                                <div class="form-group">
                                    <label for="exampleInputFile">Category Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="category_image" id="category_image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <span style="color:red;">@error('category_image'){{$message}}@enderror</span>
                                </div>
                                <!-- /.form-group -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                <label for="category_name">Category Discount</label>
                                <input type="text" class="form-control" name="category_discount" id="category_discount">
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                <label for="category_name">Category Url</label>
                                <input type="text" class="form-control" name="url" id="url">
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea class="form-control" rows="3" name="description" id="description" placeholder="Enter ..."></textarea>
                                    <span style="color:red;">@error('description'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <textarea class="form-control" rows="3" name="meta_title" id="meta_title" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Meta Description</label>
                                    <textarea class="form-control" rows="3" name="meta_description" id="meta_description" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Meta keywords</label>
                                    <textarea class="form-control" rows="3" name="meta_keywords" id="meta_keywords" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Status</label>
                                    <input type="text" class="form-control" name="status" id="status">
                                    <span style="color:red;">@error('status'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div> <!-- /.row -->
                    </div><!-- /.card-body -->
                    <div class="card-footer">
                        <button class="btn btn-primary">Add Category</button>
                    </div>
                </div><!-- /.card -->
            </form>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->
 

  @endsection



  