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
                    <h1>Edit Product</h1>
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
            <form name="addProductForm" id="addProductForm" action="/admin/saveeditproduct/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
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
                                    <label for="category_name">Select Category</label>
                                    <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                                        <option>Choose One Category</option>
                                        @foreach($categories as $section)
                                            <optgroup label="{{$section['name']}}"></optgroup>
                                            @foreach($section['categories'] as $category)
                                                <option value="{{$category['id']}}">&nbsp;&nbsp;&nbsp;---&nbsp;&nbsp;{{$category['category_name']}}</option>
                                                @foreach($category['subcategories'] as $subcategory)
                                                    <option value="{{$subcategory['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;{{$subcategory['category_name']}}</option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <span style="color:red;">@error('category_id'){{$message}}@enderror</span> 
                                   
                                </div>
                           
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $data['product_name'] }}">
                                    <span style="color:red;">@error('product_name'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Product price</label>
                                    <input type="text" class="form-control" name="product_price" id="product_price" value="{{  $data['product_price'] }}">
                                    <span style="color:red;">@error('product_price'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Product discount</label>
                                    <input type="text" class="form-control" name="product_discount" id="product_discount" value="{{ $data['product_discount'] }}">
                                    <span style="color:red;">@error('product_discount'){{$message}}@enderror</span>
                                </div>
                            </div><!-- /.col -->
                        
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text" class="form-control" name="product_code" id="product_code" value="{{  $data['product_code'] }}">
                                    <span style="color:red;">@error('product_code'){{$message}}@enderror</span>
                                </div>
                                
                                <div class="form-group">
                                    <label>Product color</label>
                                    <input type="text" class="form-control" name="product_color" id="product_color" value="{{  $data['product_color'] }}">
                                    <span style="color:red;">@error('product_color'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Product weight</label>
                                    <input type="text" class="form-control" name="product_weight" id="product_weight" value="{{  $data['product_weight'] }}">
                                    <span style="color:red;">@error('product_weight'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Product Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image" id="main_image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <span style="color:red;">@error('main_image'){{$message}}@enderror</span>
                                </div>
                                <!-- /.form-group -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Product Video</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="product_video" id="product_video">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <span style="color:red;">@error('product_video'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Wash Care</label>
                                    <input type="text" class="form-control" name="wash_care" id="wash_care" value="{{  $data['wash_care'] }}">
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Select Fabric</label>
                                    <select name="fabric" id="fabric" class="form-control select2" style="width: 100%;">
                                        <option>Choose One Fabric</option>
                                        @foreach($fabricArray as $fabric)
                                            
                                            <option value="{{$fabric}}"@if($data->fabric == $fabric) selected  @endif>{{$fabric}}</option>
                                           
                                        @endforeach
                                        
                                    </select>
                                    <span style="color:red;">@error('fabric'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Select Sleeve</label>
                                    <select name="sleeve" id="sleeve" class="form-control select2" style="width: 100%;">
                                        <option>Choose One sleeve</option>
                                        @foreach($sleeverArray as $sleeve)
                                            <option value="{{$sleeve}}" @if($data->sleeve == $sleeve) selected  @endif>{{$sleeve}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <span style="color:red;">@error('sleeve'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Select Pattern</label>
                                    <select name="pattern" id="pattern" class="form-control select2" style="width: 100%;">
                                        <option>Choose One Pattern</option>
                                        @foreach($patternArray as $pattern)
                                            <option value="{{$pattern}}" @if($data->pattern == $pattern) selected  @endif>{{$pattern}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <span style="color:red;">@error('pattern'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Select Fit</label>
                                    <select name="fit" id="fit" class="form-control select2" style="width: 100%;">
                                        <option>Choose One fit</option>
                                        @foreach($fitArray as $fit)
                                            <option value="{{$fit}}" @if($data->fit == $fit) selected  @endif>{{$fit}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <span style="color:red;">@error('fit'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Select Occassion</label>
                                    <select name="occassion" id="occassion" class="form-control select2" style="width: 100%;">
                                        <option>Choose One Occassion</option>
                                        @foreach($occassionArray as $occassion)
                                            <option value="{{$occassion}}" @if($data->occassion == $occassion) selected  @endif>{{$occassion}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <span style="color:red;">@error('occassion'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea class="form-control" rows="3" name="description" id="description" placeholder="Enter ...">{{ $data['description'] }}</textarea>
                                    <span style="color:red;">@error('description'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <textarea class="form-control" rows="3" name="meta_title" id="meta_title" placeholder="Enter ...">{{ $data['meta_title'] }}</textarea>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Meta Description</label>
                                    <textarea class="form-control" rows="3" name="meta_description" id="meta_description" placeholder="Enter ...">{{ $data['meta_description'] }}</textarea>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Meta keywords</label>
                                    <textarea class="form-control" rows="3" name="meta_keywords" id="meta_keywords" placeholder="Enter ...">{{ $data['meta_keywords'] }}</textarea>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="status"></label>
                                    <input type="hidden" class="form-control" name="status" id="status" value="1">
                                    <span style="color:red;">@error('status'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label for="status">Featured</label>
                                    <input type="checkbox"  name="is_featured" id="is_featured" value="YES">
                                    <span style="color:red;">@error('is_featured'){{$message}}@enderror</span>
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



  