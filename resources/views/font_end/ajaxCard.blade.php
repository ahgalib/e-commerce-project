<?php use App\Models\Cart; ?>

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
		<?php $attrProPrice = Cart::ArrtibuteProductPrice($cartInfo['product_id'],$cartInfo['size']);  ?>
          <tr>
              <td> <img width="60" src="storage/{{$cartInfo['product']['main_image']}}" alt=""/></td>
              <td>{{$cartInfo['product']['description']}}<br/>Color : {{$cartInfo['product']['product_color']}}</td>
              <td>
                <div class="input-append">
                 
                    <input class="span1 inQunt" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" value="{{$cartInfo['qunatity']}}">
                    <button class="btn btnUpdateItem qtyMinus" type="button" cartId="{{$cartInfo['id']}}"><i class="icon-minus"></i></button>
                    <button class="btn btnUpdateItem qtyPlus" type="button" cartId="{{$cartInfo['id']}}"><i class="icon-plus"></i></button>
                    <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>				
                </div>
              </td>
              <td>{{$attrProPrice}}</td>
              <td>Rs.0.00</td>
             
              <td> {{$attrProPrice * $cartInfo['qunatity'] }}
			  
			  </td>
          </tr>
		  <?php $total_price = $total_price + ($attrProPrice * $cartInfo['qunatity']);?>
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
            <td colspan="6" style="text-align:right"><strong>TOTAL (Rs.3000 - Rs.0 + Rs.0) =</strong></td>
            <td class="label label-important" style="display:block"> <strong> Rs.3000.00 </strong></td>
        </tr>
        </tbody>
    </table>