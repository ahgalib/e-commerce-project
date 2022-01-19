$(Document).ready(function(){
    $('#current_password').keyup(function(){
        var curr_pass = $('#current_password').val();
        //alert(curr_pass);
        $.ajax({
            type:'post',
            url:'/admin/check_current_password',
            data:{current_password:current_password},
            success:function(resp){
                alert(resp);
                if(resp=="false"){
                    $("#chkpsw").html("<font color=red>Pasword is incorrect</font>");
                }else if(resp=="true"){
                    $("#chkpsw").html("<font color=red>Pasword is incorrect</font>");
                }
            },error:function(){
                alert("Error");
            }
        });
    });
});
