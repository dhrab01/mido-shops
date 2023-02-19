


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

    //update  status
    $(document).on("click", ".updateStatus", function(){
        var status = $(this).attr("status");
        var module_id = $(this).attr("module_id");
        var module = $(this).attr("module");
        //alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-'+module+'-status',
            data:{status:status,module_id:module_id},
            success:function(resp){
                //alert(resp);
                if(resp['status']==0){
                    $("#module-"+module_id).attr('checked','');
                }else if(resp['status']==1){
                    $("#module-"+module_id).attr('checked','checked');
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    //update  featured
    $(document).on("click", ".updateIsFeatured", function(){
         var status = $(this).attr("status");
        var product_id = $(this).attr("product_id");
        //alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-product-featured',
            data:{status:status,product_id:product_id},
            success:function(resp){
                //alert(resp);
                if(resp['status']=="No"){
                    $("#product-"+product_id).attr('checked','');
                }else if(resp['status']=="Yes"){
                    $("#product-"+product_id).attr('checked','checked');
                }
            },error:function(){
                alert("Error");
            }
        });
    });
    //  //update section status
    // $(document).on("click", ".updateSectionStatus", function(){
    //     var status = $(this).attr("status");
    //     var section_id = $(this).attr("section_id");
    //     //alert(admin_id);
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type:'post',
    //         url:'/admin/update-section-status',
    //         data:{status:status,section_id:section_id},
    //         success:function(resp){
    //             //alert(resp);
    //             if(resp['status']==0){
    //                 $("#section-"+section_id).attr('checked','');
    //             }else if(resp['status']==1){
    //                 $("#section-"+section_id).attr('checked','checked');
    //             }
    //         },error:function(){
    //             alert("Error");
    //         }
    //     });
    // });

    // //update category status
    // $(document).on("click", ".updateCategoryStatus", function(){
    //     var status = $(this).attr("status");
    //     var category_id = $(this).attr("category_id");
    //     //alert(admin_id);
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type:'post',
    //         url:'/admin/update-category-status',
    //         data:{status:status,category_id:category_id},
    //         success:function(resp){
    //             //alert(resp);
    //             if(resp['status']==0){
    //                 $("#category-"+category_id).attr('checked','');
    //             }else if(resp['status']==1){
    //                 $("#category-"+category_id).attr('checked','checked');
    //             }
    //         },error:function(){
    //             alert("Error");
    //         }
    //     });
    // });

    //  //update brand status
    //  $(document).on("click", ".updateBrandStatus", function(){
    //     var status = $(this).attr("status");
    //     var brand_id = $(this).attr("brand_id");
    //     //alert(admin_id);
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type:'post',
    //         url:'/admin/update-brand-status',
    //         data:{status:status,brand_id:brand_id},
    //         success:function(resp){
    //             //alert(resp);
    //             if(resp['status']==0){
    //                 $("#brand-"+brand_id).attr('checked','');
    //             }else if(resp['status']==1){
    //                 $("#brand-"+brand_id).attr('checked','checked');
    //             }
    //         },error:function(){
    //             alert("Error");
    //         }
    //     });
    // });

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

    //brands
    $(document).on("click", ".edit-brand", function(){
        var brand_id = $(this).val()
        //alert(brand_id);
        $('#editBrand').modal('show');
         $.ajax({
            type: "GET",
            url: "/admin/edit_brand/"+brand_id,
            success:function(response){
               // console.log(response);
                $('#brand_name').val(response.brand.brand_name);
                $('#brand_id').val(brand_id);
                $('#brand_image').val(response.brand.brand_image);
            }
         });
    });

    //show detailes
     $(document).on("click", ".show-link", function(){
        var admin_id = $(this).val()
        //alert(admin_id);
        $('#myModal').modal('show');
         $.ajax({
            type: "GET",
            url: "/admin/show_detail/"+admin_id,
            success:function(response){
                //console.log(response);
                if (response.details.vendor_personal==null) {
                 $('#type').html("<h5 class='card-title'>"+response.details.type+"</h5>");
                 $('#admin_name').val(response.details.name);
                 $('#admin_email').val(response.details.email);
                 $('#phone_number').val(response.details.mobile);
                 $('#admin_address').hide();
                 $('#admin_city').hide();
                 $('#admin_state').hide();
                 $('#admin_country').hide();
                 $('.lbl').hide();
                 $('.btb').hide();
                 $('#admin_image').attr("src", "/images/photos/"+response.details.image);
                 $('#admin_id').val(admin_id);
                } else{
                 $('#type').html("<h5 class='font-size-16 mb-1'>"+response.details.type+"</h5>");
                 $('#admin_name').val(response.details.name);
                 $('#admin_email').val(response.details.email);
                 $('#phone_number').val(response.details.mobile);
                 $('#admin_address').val(response.details.vendor_personal.address);
                 $('#admin_city').val(response.details.vendor_personal.city);
                 $('#admin_state').val(response.details.vendor_personal.state);
                 $('#admin_country').val(response.details.vendor_personal.country);
                 $('#admin_image').attr("src", "/images/photos/"+response.details.image);
                 $('#admin_id').val(admin_id);

                }
                 
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