
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Add_Edit_Banner'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/select2/select2.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('admin.components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> العروض <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
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
        <form <?php if(empty($banner['id'])): ?> action="<?php echo e(url('admin/add_edit_banner')); ?>" <?php else: ?> action="<?php echo e(url('admin/add_edit_banner/'.$banner['id'])); ?>" <?php endif; ?> method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">معلومات العرض</h4>
                    <!-- <p class="card-title-desc">Fill all information below</p> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="banner_title">العنوان</label>
                                <input id="banner_title" name="banner_title" type="text" class="form-control" placeholder="Banner Title"
                                <?php if(!empty($banner['title'])): ?> value="<?php echo e($banner['title']); ?>" <?php else: ?> value="<?php echo e(old('banner_title')); ?>" <?php endif; ?>>
                            </div>
                            
                           
                            <div class="mb-3">
                                <label for="banner_link">Link</label>
                                <input id="banner_link" name="banner_link" type="text" class="form-control" placeholder="Enter Banner link"
                                <?php if(!empty($banner['link'])): ?> value="<?php echo e($banner['link']); ?>" <?php else: ?> value="<?php echo e(old('banner_link')); ?>" <?php endif; ?>>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="banner_class" class="control-label">الثيم</label>
                                <select name="banner_class" id="banner_class" class="form-control select2">
                                    <option>Select</option>
                                    <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cl['name']); ?>" <?php if(!empty($banner['class']) && $banner['class']==$cl['class']): ?> selected <?php endif; ?>><?php echo e($cl['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="banner_alt">الوصف</label>
                                <textarea class="form-control" id="banner_alt" name="banner_alt" rows="10" placeholder=" Description">
                                <?php if(!empty($banner['alt'])): ?> <?php echo e($banner['alt']); ?> <?php endif; ?>
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">صورة العرض</h4>
                </div>
                <div class="card-body">

                    <div class="form-group mb-2">
                        <input class="form-control" id="banner_image" name="banner_image" type="file"  />
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">حفظ التغيرات</button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light">الغاء</button>
                </div>
            </div>
        </form>
    </div>


</div>

<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/backend/js/custom.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/select2/select2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/alert.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/ecommerce-select2.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/backend/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views\admin\banners\add_edit_banner.blade.php ENDPATH**/ ?>