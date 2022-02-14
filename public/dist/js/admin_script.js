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

    //alert for delete category
    // $(".deleteButton").click(function(){
    //     var name = $(this).attr('name');
    //     if(confirm("Are you sure to delete this "+ name + " ??")){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // })

    //using sweetalert for deleting
    $(".deleteButton").click(function(){
        var record = $(this).attr('record');
        var recordId = $(this).attr('recordId');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
              window.location.href = "delete"+record+"/"+recordId;
            }
           
        })
    })

    //another sweetalert for success edti
    $("#sweetAlert").click(function(){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
            });
            //window.location.href = "admin/category";
    })
    
    //dynamicaly add field
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top:7px;"><input type="text" name="size[]" placeholder="product size" value=""/><input style="margin:5px;" type="text" name="sku[]" placeholder="product sku" value=""/><input type="text" name="price[]" placeholder="product price" value=""/><input style="margin:5px;" type="text" name="stock[]" placeholder="product stock" value=""/><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
       
});