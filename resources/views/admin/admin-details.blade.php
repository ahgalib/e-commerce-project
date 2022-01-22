@extends('layouts.admin_layouts.admin-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Details</h1>
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
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Admin Details</h3>
                        </div><!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ url('admin/updateAdminDetails') }}" enctype="multipart/form-data">
                            <!-- @if(Session::get('fail'))
                                <div class="alert alert-danger mt-3">
                                    {{Session::get('fail')}}
                                </div>
                            @elseif(Session::get('success'))
                                <div class="alert alert-success mt-3">
                                    {{Session::get('success')}}
                                </div>
                            @endif -->
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$data['name']}}">
                                    <span style="color:red;">@error('name'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{$data['email']}}">
                                    <span style="color:red;">@error('email'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    @if(Auth::guard('admin')->user()->type == 'admin')
                                    <select name="type" id="" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="subadmin">SubAdmin</option>
                                    </select>
                                    @else
                                        <input type="text" class="form-control" name="type" placeholder="Enter type" value="{{$data['type']}}">
                                        <span style="color:red;">@error('type'){{$message}}@enderror</span>
                                    @endif
                                </div>
                               
                                <div class="form-group">
                                    <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>
                                    <input  type="number" class="form-control" name="mobile" placeholder="Enter your mobile number" value="{{$data['mobile']}}">
                                    <span style="color:red;">@error('mobile'){{$message}}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image">
                                    <!-- <span style="color:red;">@error('current_password'){{$message}}@enderror</span> -->
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.row end -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

  @endsection



  