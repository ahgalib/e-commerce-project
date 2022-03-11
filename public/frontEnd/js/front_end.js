$(document).ready(function(){
    // $("#sort").on('change',function(){
    //     this.form.submit();
    // });
    $("#sort").on('change',function(){
        var fabric = getFilter(this);
        var sort = $(this).val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            type:'get',
            data:{fabric:fabric,sort:sort,url:url},
            success:function(data){
                $('.filter_product').html(data);
            }

        })
    });

    $(".fabric").on('click',function(){
        var fabric = getFilter(this);
        var sort = $("#sort").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            type:'get',
            data:{fabric:fabric,sort:sort,url:url},
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