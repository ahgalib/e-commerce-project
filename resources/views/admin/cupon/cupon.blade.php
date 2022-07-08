@extends('layouts.admin_layouts.admin-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Cupon</h1>
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
                            <h3 class="card-title">All Cupon Code</h3>
                        </div> 
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Code</th> 
                                        <th>Cupon Type</th>
                                        <th>Amount</th> 
                                        <th>Expiry Date</th>                                      
                                        <th colspan="2">Action</th>
                                     </tr>
                                </thead>
                                <tbody>
                                   @foreach($cupon as $cuponInfo)
                                   <tr>
                                        <td>{{$cuponInfo->id}}</td>
                                        <td>{{$cuponInfo->cupon_code}}</td>
                                        <td>{{$cuponInfo->cupon_option}}</td>
                                        <td>{{$cuponInfo->amount}}</td>
                                        <td>{{$cuponInfo->expiry_date}}</td>
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



  