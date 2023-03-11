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
                             <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>District</th>
                                        <th>Phone</th>
                                        <th>email</th>   
                                        <th>Coupon Code</th>
                                        <th>Cupon Discount</th>
                                        <TH>Grand Total</TH>
                                        <th>Ordered Date</th>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Quantity</th> 
                                        </tr>

                                    </tr>
                                </thead>
                                <tbody>	
                                @foreach($orderInfo as $product)
                                    <tr>
                                        <td>{{$product['name']}}</td>
                                        <td>{{$product['address']}}</td>
                                        <td>{{$product['district']}}</td>
                                        <td>{{$product['phone']}}</td> 
                                        <td>{{$product['email']}}</td>
                                       
                                        <td>{{$product['coupon_code']}}</td>
                                        <td>{{$product['coupon_amount']}}</td>
                                        <td>{{$product['grand_total']}}</td>
                                        <td>{{date('d-m- y' ,strtotime($product['created_at']))}}</td>
                                        @foreach($product['order_product'] as $productDetails)
                                        <tr>
                                        <td>{{$productDetails['product_name']}}</td>
                                        <td>{{$productDetails['product_color']}}</td>
                                        <td>{{$productDetails['product_size']}}</td>
                                        <td>{{$productDetails['product_price']}}</td>
                                        <td>{{$productDetails['product_qty']}}</td>
                                        </tr>
                                        @endforeach 
                                       
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



  