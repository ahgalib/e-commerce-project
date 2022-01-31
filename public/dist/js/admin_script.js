$(document).ready(function(){
    // $("#current_password").keyup(function(){
    //     var curpass = $("#current_password").val();
    //     alert(curpass);
    //     $.ajax({
    //         url:'/admin/check-current-password',
    //         type:'post',
            
    //         data:{current_password:current_password},
    //         success:function(resp){
    //             alert(resp['current_password']);
    //         },error:function(){
    //             alert("error");
    //         }
    //     });
    // });

    $(".updataSectionStatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(status);
        // alert(section_id);
        $.ajax({
            url:'/admin/update_section_status',
            type:'post',
            data:{status:status,section_id:section_id},
            success:function(resp){
                // alert(resp['status']);
                // alert(resp['section_id']);
                if(resp['status']==0){
                    $("#section-"+section_id).html("<td><a class='updataSectionStatus'  href='javascript:void(0)'>Inactive</a></td>");
                }else if(resp['status']==1){
                    $("#section-"+section_id).html("<td><a class='updataSectionStatus'  href='javascript:void(0)'>Active</a></td>");
                }
            },error:function(){
                alert("error");
            }
        });
    });

    //append category level
    $("#section_id").change(function(){
        var section_id = $(this).val();
        //alert(section_id);
        $.ajax({
            url:'/admin/append-categories-level',
            type:'post',
            data:{section_id:section_id},
            success:function(resp){
                $("#appendCategory").html(resp);
            },error:function(){
                alert("error");
            }
        })
    })
       
});