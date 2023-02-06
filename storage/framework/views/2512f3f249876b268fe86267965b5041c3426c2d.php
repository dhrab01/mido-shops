<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.admins'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/choices.js/choices.js.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/@simonwep/@simonwep.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/flatpickr/flatpickr.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('admin.components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Admins <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <div class="search-box me-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> اضافة جديد</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
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
                                    <div class="flex-shrink-0">
                                        <div class="avatar-md me-3">
                                            <img src="<?php echo e(URL::asset('images/photos/'. $admin['image'])); ?>" alt="profile-image" class="img-fluid rounded-circle d-block img-thumbnail">
                                        </div>
                                    </div>
                                    
                                </td>
                                <td>
                                    <?php if($admin['status']==1): ?>
                                    <input type="checkbox" class="updateAdminStatus" id="admin-<?php echo e($admin['id']); ?>" admin_id="<?php echo e($admin['id']); ?>" status="Active" switch="success" checked />
                                    <label for="admin-<?php echo e($admin['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php else: ?>
                                    <input type="checkbox" class="updateAdminStatus" id="admin-<?php echo e($admin['id']); ?>" admin_id="<?php echo e($admin['id']); ?>" status="Inactive" switch="success"  />
                                    <label for="admin-<?php echo e($admin['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php endif; ?>
                                    
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <?php if($admin['type']=="vendor"): ?>
                                            <li><a href="<?php echo e(url('admin/view-vendor-details/'.$admin['id'])); ?>" class="dropdown-item"><i class="mdi mdi-account-details font-size-16 text-success me-1"></i> عرض معلومات الحساب</a></li>
                                            <li><a href="#" class="dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
                                            <?php else: ?>
                                            <li><a href="#" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> تعديل</a></li>
                                            <li><a href="#" class="dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
                                            <?php endif; ?>
                                            
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <ul class="pagination pagination-rounded justify-content-end mb-2">
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="javascript: void(0);" aria-label="Next">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>zz
<script src="<?php echo e(URL::asset('assets/backend/js/custom.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/backend/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduate\myproject\e-com-site\Admin\resources\views/admin/admin-managment/admins.blade.php ENDPATH**/ ?>