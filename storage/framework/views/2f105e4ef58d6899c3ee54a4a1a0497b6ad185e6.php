<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Profile'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- <div class="row">
    <div class="col-xl-12">
        <div class="profile-user"></div>
    </div>
</div> -->

<div class="row">
    <div class="profile-content mt-3">
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
                        <a class="btn btn-primary" href="<?php echo e(url('admin/vendor-dashboard')); ?>"><i class="me-1"></i> لوحة التحكم</a>

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
<?php if($slug=="personal"): ?>
<div class="row">
    <div class="col-12  stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تحديث البيانات الشخصية</Details>
                </h4>

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
                <form class="forms-sample" method="post" action="<?php echo e(url('admin/update-vendor-details/personal')); ?>" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                <div class="row">
                    
                    <div class="form-group mb-3">
                        <label for="vendor_name">الاسم</label>
                        <input type="text" class="form-control" id="vendor_name" name="vendor_name" placeholder="ادخل الاسم" value="<?php echo e(Auth::guard('admin')->user()->name); ?>">
                    </div>
                    
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="vendor_email">البريد الالكتروني</label>
                        <input type="email" class="form-control" name="vendor_email" id="vendor_email" placeholder="البريد الالكتروني" value="<?php echo e(Auth::guard('admin')->user()->email); ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="phone_numper">رقم الهاتف</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="رقم الهاتف" value="<?php echo e(Auth::guard('admin')->user()->mobile); ?>" maxlength="9" minlength="9">
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="vendor_address">العنوان</label>
                        <input type="text" class="form-control" id="vendor_address" name="vendor_address" placeholder="ادخل العنوان" value="<?php echo e($vedorDetails['address']); ?>">
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="vendor_city">المحافضة</label>
                        <input type="text" class="form-control" id="vendor_city" name="vendor_city" placeholder="ادخل المحافضة" value="<?php echo e($vedorDetails['city']); ?>">
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="vendor_state">المديرية</label>
                        <input type="text" class="form-control" id="vendor_state" name="vendor_state" placeholder="ادخل المديرية" value="<?php echo e($vedorDetails['state']); ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <select class="form-control" id="vendor_country" name="vendor_country">
                            <option value="">اختار الدولة</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country['country_name']); ?>" <?php if( $country['country_name']==$vedorDetails['country']): ?> selected <?php endif; ?> ><?php echo e($country['country_name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="vendor_pincode">pin code</label>
                        <input type="text" class="form-control" id="vendor_pincode" name="vendor_pincode" placeholder="ادخل الرمز" value="<?php echo e($vedorDetails['pincode']); ?>">
                    </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="vendor_image">الصورة الشخصية</label>
                        <input type="file" name="vendor_image" id="vendor_image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="رفع صورة">
                            <input type="hidden" name="current_image" value="<?php echo e(Auth::guard('admin')->user()->image); ?>">

                        </div>
                    </div>
                    </div>
                    <div class="btn-group mt-2">
                        <button type="submit" class="btn btn-outline-primary text-expanded mr-5 ">حفظ</button>
                        <button class="btn btn-outline-danger">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- end col -->
    <?php elseif($slug=="business"): ?>
    <div class="row">
    <div class="col-12  stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تحديث بيانات المتجر</Details>
                </h4>

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
                <form class="forms-sample" method="post" action="<?php echo e(url('admin/update-vendor-details/business')); ?>" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                <div class="row">
                    
                    <div class="form-group mb-3">
                        <label for="shop_name">اسم المتجر</label>
                        <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="ادخل الاسم" value="<?php echo e($vedorDetails->shop_name); ?>">
                    </div>
                    
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="shop_email"> البريد الالكتروني الخاص بالمتجر</label>
                        <input type="email" class="form-control" name="shop_email" id="shop_email" placeholder="البريد الالكتروني" value="<?php echo e($vedorDetails->shop_email); ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="phone_numper">رقم الهاتف الخاص بالمتجر</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="رقم الهاتف" value="<?php echo e($vedorDetails->shop_mobile); ?>" maxlength="9" minlength="9">
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="shop_address">عنوان المتجر</label>
                        <input type="text" class="form-control" id="shop_address" name="shop_address" placeholder="ادخل العنوان" value="<?php echo e($vedorDetails->shop_address); ?>">
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="shop_city">المحافضة</label>
                        <input type="text" class="form-control" id="shop_city" name="shop_city" placeholder="ادخل المحافضة" value="<?php echo e($vedorDetails->shop_city); ?>">
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label for="shop_state">المديرية</label>
                        <input type="text" class="form-control" id="shop_state" name="shop_state" placeholder="ادخل المديرية" value="<?php echo e($vedorDetails->shop_state); ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <select class="form-control" id="shop_country" name="shop_country">
                            <option value="">اختار الدولة</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country['country_name']); ?>" <?php if( $country['country_name']==$vedorDetails->shop_country): ?> selected <?php endif; ?> ><?php echo e($country['country_name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="shop_pincode">pin code</label>
                        <input type="text" class="form-control" id="shop_pincode" name="shop_pincode" placeholder="ادخل الرمز" value="<?php echo e($vedorDetails->shop_pincode); ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="business_license_number">رقم السجل التجاري</label>
                        <input type="text" class="form-control" id="business_license_number" name="business_license_number" placeholder="ادخل الرمز" value="<?php echo e($vedorDetails->business_license_number); ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="gst_number">(GST) رقم حساب الفوترة الالكترونية</label>
                        <input type="text" class="form-control" id="gst_number" name="gst_number" placeholder="ادخل الرمز" value="<?php echo e($vedorDetails->gst_number); ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="pan_number">(PAN) رقم الحساب البنكي الاساسي</label>
                        <input type="text" class="form-control" id="pan_number" name="pan_number" placeholder="ادخل الرمز" value="<?php echo e($vedorDetails->pan_number); ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="shop_address_proof">اثبات الهوية</label>
                        <select class="form-control" name="shop_address_proof" id="shop_address_proof">
                            <option value="passport" <?php if($vedorDetails->address_proof=="passport"): ?> selected <?php endif; ?>>جواز سفر</option>
                            <option value="id-card" <?php if($vedorDetails->address_proof=="id-card"): ?> selected <?php endif; ?>>بطاقة شخصية</option>
                            <option value="driving-license" <?php if($vedorDetails->address_proof=="driving-license"): ?> selected <?php endif; ?>>رخصة قيادة</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address_proof_image">صورة الهوية</label>
                        <input type="file" name="address_proof_image" id="address_proof_image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="رفع صورة">
                            <input type="hidden" name="current_image" value="<?php echo e($vedorDetails->address_proof_image); ?>">

                        </div>
                    </div>
                    </div>
                    <div class="btn-group mt-2">
                        <button type="submit" class="btn btn-outline-primary text-expanded ">حفظ</button>
                        <button class="btn btn-outline-danger">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php elseif($slug=="bank"): ?>
  <div class="row">
    <div class="col-12  stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تحديث بيانات البنك</Details>
                </h4>

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
                <form class="forms-sample" method="post" action="<?php echo e(url('admin/update-vendor-details/bank')); ?>" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                
                    
                    <div class="form-group mb-3">
                        <label for="account_holder_name">اسم مالك الحساب</label>
                        <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" placeholder="مطلوب " value="<?php echo e($vedorDetails->account_holder_name); ?>">
                    </div>
                    
                    
                    <div class="form-group mb-3">
                        <label for="bank_name"> اسم البنك</label>
                        <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder=" مطلوب" value="<?php echo e($vedorDetails->bank_name); ?>">
                    </div>
                    
                    
                    <div class="form-group mb-3">
                        <label for="account_number">رقم الحساب</label>
                        <input type="text" class="form-control" id="account_number" name="account_number" placeholder=" مطلوب" value="<?php echo e($vedorDetails->account_number); ?>" maxlength="15" minlength="15">
                    </div>
                    
                    
                    <div class="form-group mb-3">
                        <label for="bank_ifsc_code"> رقم الثانوي</label>
                        <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code" placeholder=" مطلوب" value="<?php echo e($vedorDetails->bank_ifsc_code); ?>">
                    </div>
                   
                    
                    
                
                    <div class="btn-group mt-2">
                        <button type="submit" class="btn btn-outline-primary text-expanded ">حفظ</button>
                        <button class="btn btn-outline-danger">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php endif; ?>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduate\myproject\e-com-site\Admin\resources\views/admin/vendors/settings/update-vendor-details.blade.php ENDPATH**/ ?>