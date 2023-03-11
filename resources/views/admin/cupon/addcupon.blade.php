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
                    <h1>Add Brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Cupon</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add Brand</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                       <form action="/admin/saveaddCupon" method="post">
                        @csrf
                            @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Cupon Code</label>
                                <input type="text" class="form-control" name="cupon_code">
                                <span style="color:red;">@error('cupon_code'){{$message}}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control" name="amount">
                                <input type="hidden" name="status" value="1">
                                <span style="color:red;">@error('amount'){{$message}}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label>Cupon Code</label>
                                <input type="date" class="form-control" name="expiry_date">
                            </div>
                            <button class="btn btn-success mt-3" id="sweetAlert">Add Attribute</button>
                        </form>

                        <!-- /.col -->
                    </div> <!-- /.row -->
                </div><!-- /.card-body -->

            </div><!-- /.card -->

        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->


  @endsection



