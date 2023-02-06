$(document).ready(function(){
    //check admin password is correct or not
    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/check-admin-password',
            data:{current_password:current_password},
            success:function(resp){
                if(resp=="false"){
                    $("#check_password").html("<font color='red'> Current password is not correct!</font>");
                }else if(resp=="true"){
                    $("#check_password").html("<font color='green'> Current password matched</font>");
                }
            },error:function(){
                alert(Error);
            }
        });
    })

    //update admin status
    $(document).on("click", ".updateAdminStatus", function(){
        alert("test");
    });
});