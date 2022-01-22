$(document).ready(function(){
    $('#current_password').keyup(function(){
        var curr_pass = $('#current_password').val();
        //alert(curr_pass);
        $.ajax({
            type:'post',
            url:'/admin/check_current_password',
            data:{current_password:current_password},
            success:function(response){
                alert(response);
                if(response=="false"){
                    $("#chkpsw").html("<font color=red>Pasword is incorrect</font>");
                }else if(response=="true"){
                    $("#chkpsw").html("<font color=green>Pasword is correct</font>");
                }
            },error:function(){
                alert("Error");
            }
        });
    });
});
