@extends('layouts.front_end_layouts.frontLayout') 
@section('content') 
<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="span9">


            <form action="/saveDeliveryAddress" method="post" >
            @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Create Delivery Address</h3>
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" id="product_price" value="{{ old('product_price') }}">
                            <span style="color:red;">@error('address'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Distirct</label>
                            <input type="text" class="form-control" name="district" id="product_discount" value="{{ old('product_discount') }}">
                            <span style="color:red;">@error('district'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" id="product_price" value="{{ old('product_price') }}">
                            <span style="color:red;">@error('phone'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Another Phone</label>
                            <input type="text" class="form-control" name="another_phone" id="product_discount" value="{{ old('product_discount') }}">
                            <span style="color:red;">@error('another_phone'){{$message}}@enderror</span>
                        </div>
                            
                         
                      
                    </div><!-- /.card-body -->
                    <div class="card-footer">
                        <button class="btn btn-primary">Add Product</button>
                    </div>
                </div><!-- /.card -->
            </form>
      
</div> <!-- /.content-wrapper -->
 

  @endsection



  