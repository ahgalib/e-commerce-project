<?php use App\Models\Cart; ?>
<?php use App\Models\Product; ?>

<meta name="csrf-token" content="{{ csrf_token() }}" />

<table class="table table-bordered">
        <thead>
        <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Quantity/Update</th>
            <th>Unit Price</th>
            <th>Discount</th>
           
            <th>sub Total</th>
        </tr>
        </thead>
        <tbody>
			<?php $total_price = 0; ?>
        @foreach($cartItems as $cartInfo)
		<?php $attrProPrice = Product::getProductAttributePrice($cartInfo['product_id'],$cartInfo['size']);  ?>
          <tr>
              <td> <img width="60" src="storage/{{$cartInfo['product']['main_image']}}" alt=""/></td>
              <td>{{$cartInfo['product']['description']}}<br/>Color : {{$cartInfo['product']['product_color']}}</td>
              <td>
                <div class="input-append">
                 
                    <input class="span1 inQunt" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" value="{{$cartInfo['qunatity']}}">
                    <button class="btn btnUpdateItem qtyMinus" type="button" cartId="{{$cartInfo['id']}}"><i class="icon-minus"></i></button>
                    <button class="btn btnUpdateItem qtyPlus" type="button" cartId="{{$cartInfo['id']}}"><i class="icon-plus"></i></button>
                    <button class="btn btn-danger deleteCartProduct" cartId="{{$cartInfo['id']}}" type="button"><i class="icon-remove icon-white"></i></button>				
                </div>
              </td>
              <td>{{$attrProPrice['product_price']}}</td>
              <td>{{$attrProPrice['discount'] * $cartInfo['qunatity']}}</td>
             
              <td> {{$attrProPrice['final_price'] * $cartInfo['qunatity'] }}
			  
			  </td>
          </tr>
		  <?php $total_price = $total_price + ($attrProPrice['final_price'] * $cartInfo['qunatity']);?>
        @endforeach
        
        <tr>
            <td colspan="6" style="text-align:right">Total Price:	</td>
            <td>Tk {{ $total_price}}</td>
        </tr>
            <tr>
            <td colspan="6" style="text-align:right">Total Discount:	</td>
            <td> Rs.0.00</td>
        </tr>
            <tr>
            <td colspan="6" style="text-align:right">Total Tax:	</td>
            <td> Rs.0.00</td>
        </tr>
            <tr>
            <td colspan="6" style="text-align:right"><strong> Grand TOTAL </strong></td>
            <td class="label label-important" style="display:block"> <strong> Tk {{ $total_price}} </strong></td>
        </tr>
        </tbody>
    </table>