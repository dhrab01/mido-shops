<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Profile'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="profile-user"></div>
    </div>
</div>

<div class="row">
    <div class="profile-content">
        <div class="row align-items-end">
            <div class="col-sm">
                <div class="d-flex align-items-end mt-3 mt-sm-0">
                    <div class="flex-shrink-0">
                        <div class="avatar-xxl me-3">
                            <img src="<?php echo e(URL::asset('images/photos/'. Auth::guard('admin')->user()->image)); ?>" alt="profile-image" class="img-fluid rounded-circle d-block img-thumbnail">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div>
                            <h5 class="font-size-16 mb-1"><?php echo e($adminDetails['name']); ?></h5>
                            <p class="text-muted font-size-13 mb-2 pb-2"><?php echo e($adminDetails['type']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="d-flex align-items-start justify-content-end gap-2 mb-2">
                    <div>
                        <a class="btn btn-primary" href="<?php echo e(url('admin/update-admin-profile')); ?>" ><i class="me-1"></i> Back to Profile</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card bg-transparent shadow-none">
            <div class="card-body">

            </div>
        </div>
    </div>
</div>

<div class="row">

    <!-- end col -->

    <div class="col-12  stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تحديث كلمة المرور</h4>
                <?php if(Session::has('error_message')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error: </strong> <?php echo e(Session::get('error_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <?php if(Session::has('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong> <?php echo e(Session::get('success_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <p class="card-description">
                <?php echo e($adminDetails['email']); ?>

                </p>
                <form class="forms-sample" action="<?php echo e(url('admin/update-admin-password')); ?>" method="post" name="updateAdminPasswordForm" id="updateAdminPasswordForm"><?php echo csrf_field(); ?>
                   
                    <div class="form-group mt-2">
                        <label for="current_password">كلمة المرور الحالية</label>
                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password" required="" >
                        <span id="check_password"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="new_password">كلمة المرور الجديدة</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="conform_password">اعد ادخال كلمة المرور للتاكيد</label>
                        <input type="password" class="form-control" name="conform_password" id="conform_password" placeholder="Conform Password" required="" >
                    </div>
                    <div class="btn-group mt-2 ">
                    <button type="submit" class="btn btn-primary mr-2">حفظ</button>
                    <button class="btn btn-light">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- end col -->
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/backend/js/app.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/profile.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/custom.js')); ?>"></script>
<!-- <script>
    $('#update-profile').on('submit', function(event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        let formData = new FormData(this);
        $('#emailError').text('');
        $('#nameError').text('');
        $('#avatarError').text('');
        $.ajax({
            url: "<?php echo e(url('update-profile')); ?>" + "/" + Id,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#emailError').text('');
                $('#nameError').text('');
                $('#avatarError').text('');
                if (response.isSuccess == false) {
                    alert(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function(response) {
                $('#emailError').text(response.responseJSON.errors.email);
                $('#nameError').text(response.responseJSON.errors.name);
                $('#avatarError').text(response.responseJSON.errors.avatar);
            }
        });
    });
</script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduate\myproject\e-com-site\Admin\resources\views/admin/update-password.blade.php ENDPATH**/ ?>