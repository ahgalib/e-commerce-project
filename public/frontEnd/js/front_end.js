$(document).ready(function(){
    // $("#sort").on('change',function(){
    //     this.form.submit();
    // });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#sort").on('change',function(){
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var pattern = getFilter('pattern');
        var fit = getFilter('fit');
        var occassion = getFilter('occassion');
        var sort = $(this).val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            type:'get',
            data:{fabric:fabric,sleeve:sleeve,sort:sort,pattern:pattern,fit:fit,occassion:occassion,url:url},
            success:function(data){
                $('.filter_product').html(data);
            }

        })
    });

    $(".fabric").on('click',function(){
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var pattern = getFilter('pattern');
        var fit = getFilter('fit');
        var occassion = getFilter('occassion');
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            type:'get',
            data:{fabric:fabric,sleeve:sleeve,sort:sort,pattern:pattern,fit:fit,occassion:occassion,url:url},
            success:function(data){
                $('.filter_product').html(data);
            }

        })
    })

    $(".sleeve").on('click',function(){
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var pattern = getFilter('pattern');
        var fit = getFilter('fit');
        var occassion = getFilter('occassion');
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            type:'get',
            data:{fabric:fabric,sleeve:sleeve,sort:sort,pattern:pattern,fit:fit,occassion:occassion,url:url},
            success:function(data){
                $('.filter_product').html(data);
            }

        })
    })

    $(".pattern").on('click',function(){
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var pattern = getFilter('pattern');
        var fit = getFilter('fit');
        var occassion = getFilter('occassion');
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            type:'get',
            data:{fabric:fabric,sleeve:sleeve,sort:sort,pattern:pattern,fit:fit,occassion:occassion,url:url},
            success:function(data){
                $('.filter_product').html(data);
            }

        })
    })

    $(".fit").on('click',function(){
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var pattern = getFilter('pattern');
        var fit = getFilter('fit');
        var occassion = getFilter('occassion');
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            type:'get',
            data:{fabric:fabric,sleeve:sleeve,sort:sort,pattern:pattern,fit:fit,occassion:occassion,url:url},
            success:function(data){
                $('.filter_product').html(data);
            }

        })
    })

    $(".occassion").on('click',function(){
        var fabric = getFilter('fabric');
        var sleeve = getFilter('sleeve');
        var pattern = getFilter('pattern');
        var fit = getFilter('fit');
        var occassion = getFilter('occassion');
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            type:'get',
            data:{fabric:fabric,sleeve:sleeve,sort:sort,pattern:pattern,fit:fit,occassion:occassion,url:url},
            success:function(data){
                $('.filter_product').html(data);
            }

        })
    })

    function getFilter(class_name){
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    } 

    $(".showProductSize").on('change',function(){
        var size = $(this).val();
        var product_id = $(this).attr("product-id");
        $.ajax({
            url:'/ajaxProductDetails',
            type:'get',
            data:{size:size,product_id:product_id},
            success:function(resp){
                $(".getAttrPrice").html("TK "+ resp)
            },error:function(){
                alert("there are some issue");
            }
        });
    })

    $(document).on('click','.btnUpdateItem',function(){
        if($(this).hasClass('qtyMinus')){
           // alert("good")
           var qty = $(this).prev().val();
           //alert(qty)
           if(qty <= 1){
            alert("Item quantity must be 1")
           }else{
            var newQty = parseInt(qty) -1
            //alert(newQty)
           }
        }
        if($(this).hasClass('qtyPlus')){
            var qty = $(this).prev().prev().val();
            //alert(qty)
            var newQty = parseInt(qty) + 1
            //alert(newQty)
            
        }
        var cartId = $(this).attr('cartId')
       // alert(cartId)

        $.ajax({
            type:'POST',
            url:'/ajaxCartUpdateProduct',
            _token: "{{ csrf_token() }}",
            //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{"id":cartId,"quantity":newQty},
            success:function(resp){
                $("#carditem").html(resp.view)
            },error:function(){
                alert("there are some error");
            }
        })
       
       
    });

    $(document).on("click",".deleteCartProduct",function(){
        let cartId = $(this).attr("cartId");
        $.ajax({
            url:'/deleteCartProduct',
            _token: "{{ csrf_token() }}",
            type:'post',
            data:{cartId:cartId},
            success:function(resp){
                $("#carditem").html(resp.view)
            },error:function(){
                alert("error")
            }
        })
    });

   

})

