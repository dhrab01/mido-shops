
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.sections'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/choices.js/choices.js.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/@simonwep/@simonwep.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/flatpickr/flatpickr.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

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
                        <h4 class="card-title">ادارة المنتجات</h4>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <a href="<?php echo e(url('admin/add_edit_product')); ?>" class="btn  btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>اضافة جديد</a>
                        </div>
                    </div><!-- end col-->
                </div>
            </div>
            <div class="card-body">
                <?php if(Session::has('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    <strong>Success: </strong> <?php echo e(Session::get('success_message')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

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
                    <table id="product" class="data-table table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>اسم المنتج</th>
                                <th>صورة المنتج</th>
                                <th>لون المنتج</th>
                                <th>الرمز</th>
                                <th>مميز</th>
                                <th>الحالة</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                                <td>
                                    <?php echo e($product['id']); ?>

                                </td>
                                <td>
                                    <?php echo e($product['product_name']); ?>

                                </td>
                                <td>
                                    <?php if(!empty($product['product_image'])): ?>
                                    <div class="flex-shrink-0">
                                        <div class="avatar-md me-3">
                                            <a href="javascript:void(0)" class="waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                <img src="<?php echo e(URL::asset('images/front/products/'. $product['product_image'])); ?>" alt="product-image" class="img-fluid  d-block img-thumbnail">
                                            </a>

                                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><?php echo e($product['product_name']); ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?php echo e(url('images/front/products/'.$product['product-image'])); ?>" class="img-fluid" alt="Category image">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="javascript:void(0)" class="conformDelete btn btn-danger waves-effect waves-light" module="product-image" moduleid="<?php echo e($product['id']); ?>">حذف الصورة</a>
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">الغاء</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                        </div>
                                    </div>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($product['product_color']); ?>

                                </td>
                                <td>
                                    <?php echo e($product['product_code']); ?>

                                </td>
                                <td>
                                     <?php if($product['is_featured']=="Yes"): ?>
                                    <input type="checkbox" class="updateIsFeatured" id="product-<?php echo e($product['id']); ?>"  product_id="<?php echo e($product['id']); ?>" status="Yes" switch="success" checked />
                                    <label for="product-<?php echo e($product['id']); ?>" data-on-label="Yes" data-off-label="Yes"></label>
                                    <?php else: ?>
                                    <input type="checkbox" class="updateIsFeatured" id="product-<?php echo e($product['id']); ?>"  product_id="<?php echo e($product['id']); ?>" status="No" switch="success" />
                                    <label for="product-<?php echo e($product['id']); ?>" data-on-label="Yes" data-off-label="No"></label>
                                    <?php endif; ?>
                                </td>
                                    
                                <td>
                                    <?php if($product['status']==1): ?>
                                    <input type="checkbox" class="updateStatus" id="module-<?php echo e($product['id']); ?>" module="product" module_id="<?php echo e($product['id']); ?>" status="Active" switch="success" checked />
                                    <label for="module-<?php echo e($product['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php else: ?>
                                    <input type="checkbox" class="updateStatus" id="module-<?php echo e($product['id']); ?>" module="product" module_id="<?php echo e($product['id']); ?>" status="Inactive" switch="success" />
                                    <label for="module-<?php echo e($product['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="<?php echo e(url('admin/add_edit_product/'.$product['id'])); ?>" class="dropdown-item btn  btn-success btn-rounded edit-btn" value="<?php echo e($product['id']); ?>"><i class="edit-btn mdi mdi-pencil font-size-16 text-success me-1"></i> تعديل</a></li>
                                            <li><a title="الصنف" href="javascript:void(0)" class="conformDelete dropdown-item btn  btn-success btn-rounded" module="product" moduleid="<?php echo e($product['id']); ?>"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
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
<script src="<?php echo e(URL::asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/alert.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net/datatables.net.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/app.min.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views/admin/products/products.blade.php ENDPATH**/ ?>