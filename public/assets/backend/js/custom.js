


$(document).ready(function(){
    //$(".data-table").DataTable();
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
        var status = $(this).attr("status");
        var admin_id = $(this).attr("admin_id");
        //alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-admin-status',
            data:{status:status,admin_id:admin_id},
            success:function(resp){
                //alert(resp);
                if(resp['status']==0){
                    $("#admin-"+admin_id).attr('checked','');
                }else if(resp['status']==1){
                    $("#admin-"+admin_id).attr('checked','checked');
                }
            },error:function(){
                alert("Error");
            }
        });
    });
     //update section status
    $(document).on("click", ".updateSectionStatus", function(){
        var status = $(this).attr("status");
        var section_id = $(this).attr("section_id");
        //alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-section-status',
            data:{status:status,section_id:section_id},
            success:function(resp){
                //alert(resp);
                if(resp['status']==0){
                    $("#section-"+section_id).attr('checked','');
                }else if(resp['status']==1){
                    $("#section-"+section_id).attr('checked','checked');
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    //update category status
    $(document).on("click", ".updateCategoryStatus", function(){
        var status = $(this).attr("status");
        var category_id = $(this).attr("category_id");
        //alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-category-status',
            data:{status:status,category_id:category_id},
            success:function(resp){
                //alert(resp);
                if(resp['status']==0){
                    $("#category-"+category_id).attr('checked','');
                }else if(resp['status']==1){
                    $("#category-"+category_id).attr('checked','checked');
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    $(document).on("click", ".edit-btn", function(){
        var section_id = $(this).val()
        //alert(section_id);
        $('#editModal').modal('show');
         $.ajax({
            type: "GET",
            url: "/admin/edit_section/"+section_id,
            success:function(response){
                //console.log(response.section.name);
                $('#section_name').val(response.section.name);
                $('#section_id').val(section_id);
            }
         });
    });

    //conferm deletion
    // $(".conformDelete").click(function(){
    //     var title = $(this).attr("title");
    //     if(confirm("هل انت متاكد تريد مسح هذا "+title+"?")){
    //         return true;
    //     }else {
    //         return false;
    //     }
    // });

    //confirm deletion with sweet alarm
     //conferm deletion
     $(".conformDelete").click(function(){
        var module = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');
        Swal.fire({
            title: 'هل انت متاكد؟',
            text: 'لن تتمكن من استعادة البيانات !',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم قم بالحذف'
        }).then((result)=> {
            if(result.isConfirmed){
                Swal.fire(
                    'تم الحذف !',
                    'بنجاح'
                )
                window.location = "/admin/delete-"+module+"/"+moduleid;
            }
        })
    });

    //append categories level
    $("#section_id").change(function(){
        var section_id = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'get',
            url: '/admin/append-categories-level',
            data:{section_id:section_id},
            success:function(resp){
                $("#appendCatLevel").html(resp);
            },error:function(){
                alert("Error");
            }
        });
    })
});