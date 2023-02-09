
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.sections'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/choices.js/choices.js.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/@simonwep/@simonwep.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/flatpickr/flatpickr.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/backend/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/backend/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('admin.components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Sections <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> الكاتالوج <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h4 class="card-title">ادارة الاقسام</h4>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn  btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> اضافة قسم جديد</button>
                        </div>
                    </div><!-- end col-->
                </div>
            </div>
            <div class="card-body">
            <?php if(Session::has('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong> <?php echo e(Session::get('success_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
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
                    <table id="section" class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                <th>الحالة</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($section['id']); ?>

                                </td>
                                <td>
                                    <?php echo e($section['name']); ?>

                                </td>
                                <td>
                                    <?php if($section['status']==1): ?>
                                    <input type="checkbox" class="updateSectionStatus" id="section-<?php echo e($section['id']); ?>" section_id="<?php echo e($section['id']); ?>" status="Active" switch="success" checked />
                                    <label for="section-<?php echo e($section['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php else: ?>
                                    <input type="checkbox" class="updateSectionStatus" id="section-<?php echo e($section['id']); ?>" section_id="<?php echo e($section['id']); ?>" status="Inactive" switch="success" />
                                    <label for="section-<?php echo e($section['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> تعديل</a></li>
                                            <li><a title="القسم" href="<?php echo e(url('admin/delete-section/'.$section['id'])); ?>" class="conformDelete dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
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
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net-buttons/datatables.net-buttons.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net-responsive/datatables.net-responsive.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/backend/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views/admin/sections/sections.blade.php ENDPATH**/ ?>