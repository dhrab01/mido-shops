
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Product_Images'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('admin.components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> المنتجات <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> بيانات المنتج <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">صور المنتج</h4>
            </div>
            <div class="card-body">

                <form action=" <?php echo e(url('admin/add-images/'.$product['id'])); ?>" method="post" class="dropzone" name="file" enctype="multipart/form-data"><?php echo csrf_field(); ?>


                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>

                        <h4>يمكنك سحب الصور وافلاتها هنا , او اضغط لاختيار صورة.</h4>
                    </div>

                </form>
            </div>

        </div> <!-- end card-->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product-detai-imgs">
                            <div class="row">

                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                            <div>
                                                <?php if(!empty($product['product_image'])): ?>
                                                <img src="<?php echo e(URL::asset('images/front/products/large/'.$product['product_image'])); ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                <?php else: ?>
                                                <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mt-4 mt-xl-3 ms-6">
                                <a href="javascript: void(0);" class="text-primary"><?php echo e($product['product_code']); ?></a>
                                <h4 class="mt-1 mb-3"><?php echo e($product['product_name']); ?></h4>


                                <p class="text-muted mb-4">( 152 Customers Review )</p>

                                <h6 class="text-success text-uppercase">20 % Off</h6>
                                <h5 class="mb-4">السعر : <span class="text-muted me-2"><del><?php echo e(($product['product_price']-20)/100); ?> USD</del></span> <b>$<?php echo e($product['product_price']); ?> USD</b></h5>
                                <p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar pronunciation and more common words If several languages coalesce</p>
                                <!-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Wireless</p>
                                        <p class="text-muted"><i class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i> Wireless Range : 10m</p>
                                        <p class="text-muted"><i class="bx bx-battery font-size-16 align-middle text-primary me-1"></i> Battery life : 6hrs</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted"><i class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i> Bass</p>
                                        <p class="text-muted"><i class="bx bx-cog font-size-16 align-middle text-primary me-1"></i> Warranty : 1 Year</p>
                                    </div>
                                </div>
                            </div> -->

                                <div class="product-color">
                                    <h5 class="font-size-15">اللون :</h5>

                                    <a href="javascript: void(0);" class="active">
                                        <div class="product-color-item border rounded">
                                            <img src="<?php echo e(URL::asset('images/front/products/small/'.$product['product_image'])); ?>" alt="" class="avatar-lg">
                                        </div>
                                        <p><?php echo e($product['product_color']); ?></p>
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mt-12">
                        <div class="col-10">
                            <div class="card">

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class=" table align-middle table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $product['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               
                                                <tr>
                                                    <td>
                                                        <?php echo e($image['id']); ?>

                                                    </td>
                                                    <td>
                                                        <div class="avatar-lg">
                                                            <div>
                                                                <img src="<?php echo e(URL::asset('images/front/products/images/'.$image['image'])); ?>" alt="" class=" img-thumbnail d-block">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if($image['status']==1): ?>
                                                        <input type="checkbox" class="updateStatus" id="module-<?php echo e($image['id']); ?>" module="pro_image" module_id="<?php echo e($image['id']); ?>" status="Active" switch="success" checked />
                                                        <label for="module-<?php echo e($image['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                                        <?php else: ?>
                                                        <input type="checkbox" class="updateStatus" id="module-<?php echo e($image['id']); ?>" module="pro_image" module_id="<?php echo e($image['id']); ?>" status="Inactive" switch="success" />
                                                        <label for="module-<?php echo e($image['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                                        <?php endif; ?>

                                                    </td>
                                                    <td >
                                                        <div>
                                                            <a title="حذف" href="javascript:void(0)" class="conformDelete  btn btn-soft-danger waves-effect waves-light" module="pro_image" moduleid="<?php echo e($image['id']); ?>"><i class="bx bx-trash font-size-16 align-middle"></i></a></li>
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
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/backend/libs/dropzone/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/backend/js/app.min.js')); ?>"></script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduate\myproject\e-com-site\Admin\resources\views/admin/images/add_images.blade.php ENDPATH**/ ?>