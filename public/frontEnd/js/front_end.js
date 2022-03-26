$(document).ready(function(){
    // $("#sort").on('change',function(){
    //     this.form.submit();
    // });
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

})

