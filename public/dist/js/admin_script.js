$(document).ready(function(){
    $("#current_password").keyup(function(){
        var curpass = $("#current_password").val();
        //alert(curpass);
        $.ajax({
            type:'post',
            url:'admin/check_current_password',
            data:{current_password:current_password},
            success:function(resp){
                alert(resp);
            },error:function(){
                alert("error");
            }
        });
    });
});