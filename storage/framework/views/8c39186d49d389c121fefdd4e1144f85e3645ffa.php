
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Product_Images'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('admin.components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Products <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Product Detail <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Product Images</h4>
            </div>
            <div class="card-body">
                  
                <form action=" <?php echo e(url('admin/add-images/'.$product['id'])); ?>" method="post"   class="dropzone" name="file" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                   

                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>

                        <h4>Drop files here or click to upload.</h4>
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
                                <div class="col-md-2 col-sm-3 col-4">
                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                            <?php if(!empty($product['product_image'])): ?>
                                            <img src="<?php echo e(URL::asset('images/front/products/large/'.$product['product_image'])); ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                            <?php else: ?>
                                            <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                            <?php endif; ?>
                                            
                                        </a>
                                        <?php $__currentLoopData = $product['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="nav-link" id="product-.<?php echo e($image['id']+1); ?>.-tab" data-bs-toggle="pill" href="#product-1" role="tab" aria-controls="product-<?php echo e($image['id']); ?>" aria-selected="false">
                                            <img src="<?php echo e(URL::asset('images/front/products/images/'.$image['image'])); ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
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
                                        <?php $__currentLoopData = $product['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="tab-pane fade" id="product-.<?php echo e($images['id']); ?>" role="tabpanel" aria-labelledby="product-2-tab">
                                            <div>
                                                <img src="<?php echo e(URL::asset('images/front/products/images/'.$images['image'])); ?>" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                            <i class="bx bx-cart me-2"></i> Add to cart
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect  mt-2 waves-light">
                                            <i class="bx bx-shopping-bag me-2"></i>Buy now
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="mt-4 mt-xl-3">
                            <a href="javascript: void(0);" class="text-primary"><?php echo e($product['product_code']); ?></a>
                            <h4 class="mt-1 mb-3"><?php echo e($product['product_name']); ?></h4>

                           
                            <p class="text-muted mb-4">( 152 Customers Review )</p>

                            <h6 class="text-success text-uppercase">20 % Off</h6>
                            <h5 class="mb-4">Price : <span class="text-muted me-2"><del><?php echo e(($product['product_price']-20)/100); ?> USD</del></span> <b>$<?php echo e($product['product_price']); ?> USD</b></h5>
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
                                <h5 class="font-size-15">Color :</h5>
                                
                                <a href="javascript: void(0);" class="active">
                                    <div class="product-color-item border rounded">
                                        <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="" class="avatar-lg">
                                    </div>
                                    <p><?php echo e($product['product_color']); ?></p>
                                </a>
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views/admin/images/add_images.blade.php ENDPATH**/ ?>