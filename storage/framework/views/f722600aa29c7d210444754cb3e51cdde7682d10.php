
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.admins'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/choices.js/choices.js.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/@simonwep/@simonwep.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/flatpickr/flatpickr.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('admin.components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Admins <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h4 class="card-title"> <?php echo e($title); ?></h4>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn  btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> اضافة  جديد</button>
                        </div>
                    </div><!-- end col-->
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <!-- <div class="col-sm-4">
                        <div class="search-box me-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div> -->
                    
                </div>

                <div class="table-responsive">
                    <table id="admins" class="data-table table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                <th>النوع </th>
                                <th>رقم الهاتف</th>
                                <th>البريد الالكتروني</th>
                                <th>الصورة الشخصية</th>
                                <th>الحالة</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($admin['id']); ?>

                                </td>
                                <td>
                                    <?php echo e($admin['name']); ?>

                                </td>
                                <td>
                                    <?php echo e($admin['type']); ?>

                                </td>

                                <td>
                                    <?php echo e($admin['mobile']); ?>

                                </td>
                                <td>
                                    <?php echo e($admin['email']); ?>

                                </td>
                                <td>
                                    <?php if(!empty($admin['image'])): ?>
                                    <div class="flex-shrink-0">
                                        <div class="avatar-md me-3">
                                            <img src="<?php echo e(URL::asset('images/photos/'. $admin['image'])); ?>" alt="profile-image" class="img-fluid rounded-circle d-block img-thumbnail">
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="flex-shrink-0">
                                        <div class="avatar-md me-3">
                                            <img src="<?php echo e(URL::asset('images/photos/avatar-3.jpg')); ?>" alt="profile-image" class="img-fluid rounded-circle d-block img-thumbnail">
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                </td>
                                <td>
                                    <?php if($admin['status']==1): ?>
                                    <input type="checkbox" class="updateStatus" id="module-<?php echo e($admin['id']); ?>" module="admin" module_id="<?php echo e($admin['id']); ?>" status="Active" switch="success" checked />
                                    <label for="module-<?php echo e($admin['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php else: ?>
                                    <input type="checkbox" class="updateStatus" id="module-<?php echo e($admin['id']); ?>"  module="admin" module_id="<?php echo e($admin['id']); ?>" status="Inactive" switch="success"  />
                                    <label for="module-<?php echo e($admin['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php endif; ?>
                                    
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu ">
                                            <?php if($admin['type']=="vendor"): ?>
                                            <li><a href="<?php echo e(url('admin/view-vendor-details/'.$admin['id'])); ?>" class="dropdown-item"><i class="mdi mdi-account-details font-size-16 text-success me-1"></i> عرض معلومات الحساب</a></li>
                                            
                                            <?php else: ?>
                                            <li><a href="<?php echo e(url('admin/update-admin-profile/profile')); ?>" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> تعديل</a></li>
                                            
                                            <?php endif; ?>
                                            
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>zz
<script src="<?php echo e(URL::asset('assets/backend/js/custom.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net/datatables.net.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/alert.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views\admin\admin-managment\admins.blade.php ENDPATH**/ ?>