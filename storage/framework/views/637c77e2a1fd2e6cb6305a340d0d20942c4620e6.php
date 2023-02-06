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
                            <h5 class="font-size-16 mb-1"><?php echo e(Auth::guard('admin')->user()->name); ?></h5>
                            <p class="text-muted font-size-13 mb-2 pb-2"><?php echo e(Auth::guard('admin')->user()->type); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="d-flex align-items-start justify-content-end gap-2 mb-2">
                    <div>
                        <a class="btn btn-primary" href="<?php echo e(url('admin/dashboard')); ?>" ><i class="me-1"></i> لوحة التحكم</a>
                        <a class="btn btn-secondary" href="<?php echo e(url('admin/update-admin-password')); ?>" ><i class="me-1"></i> تغيير كلمة المرور</a>

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
                <h4 class="card-title">البيانات الشخصية</Details></h4>
                <!-- <?php if(Session::has('error_message')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error: </strong> <?php echo e(Session::get('error_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?> -->
                <?php if(Session::has('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong> <?php echo e(Session::get('success_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
              <?php endif; ?>
                <form class="forms-sample"  method="post" action="<?php echo e(url('admin/update-admin-profile')); ?>" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="admin_name">الاسم</label>
                        <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="ادخل الاسم" value="<?php echo e(Auth::guard('admin')->user()->name); ?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="admin_email">البريد الالكتروني</label>
                        <input type="email" class="form-control" name="admin_email" id="admin_email" placeholder="البريد الالكتروني" value="<?php echo e(Auth::guard('admin')->user()->email); ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone_numper">رقم الهاتف</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="رقم الهاتف" value="<?php echo e(Auth::guard('admin')->user()->mobile); ?>" maxlength="9" minlength="9">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="admin_image">الصورة الشخصية</label>
                        <input type="file"  name="admin_image" id="admin_image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="رفع صورة">
                            <input type="hidden" name="current_image" value="<?php echo e(Auth::guard('admin')->user()->image); ?>">
                            
                        </div>
                    </div>
                    
                    <div class="btn-group mb-3">
                    <button type="submit"  class="btn btn-outline-primary text-expanded mr-5">حفظ</button>
                    <button class="btn btn-outline-danger">الغاء</button>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduate\myproject\e-com-site\Admin\resources\views/admin/apps-contacts-profile.blade.php ENDPATH**/ ?>