
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Add_Gategory'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/select2/select2.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('admin.components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Categories <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Add Category <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category Information</h4>
                <p class="card-title-desc">Fill all information below</p>
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
                <form <?php if(empty($category['id'])): ?> action="<?php echo e(url('admin/add_edit_category')); ?>" <?php else: ?> action="<?php echo e(url('admin/add_edit_category/'.$category['id'])); ?>" <?php endif; ?> method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="category_name">اسم الصنف </label>
                                <input id="category_name" name="category_name" type="text" class="form-control"  placeholder="Category Name">
                            </div>
                            <div class="mb-3">
                                <label for="parent_id" class="control-label">نوع الصنف</label>
                                <select name="parent_id" id="parent_id" class="form-control select2">
                                    <option value="0">رئيسي</option>
                                   
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category_dicount">نسبة التخفيض</label>
                                <input id="category_dicount" name="category_dicount" type="text" class="form-control" placeholder="Category dicount">
                            </div>
                            <div class="mb-3">
                                <label for="category_url">URL</label>
                                <input id="category_url" name="category_url" type="text" class="form-control" placeholder="Enter category link">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="section_id" class="control-label">القسم</label>
                                <select name="section_id" id="section_id" class="form-control select2">
                                    <option>Select</option>
                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section['id']); ?>"><?php echo e($section['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="decription">الوصف</label>
                                <textarea class="form-control" id="decription" name="decription" rows="10" placeholder="Product Description"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                         <div class="card">
                           <div class="card-header">
                             <h4 class="card-title mb-0">Product Images</h4>
                           </div>
                         <div class="card-body">
               
                            <div class="fallback">
                             <input name="file" type="file" multiple />
                            </div>

                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="card">
            <div class="card-header">
                <h4 class="card-title">Meta Data</h4>
                <p class="card-title-desc">Fill all information below</p>
            </div>
            <div class="card-body">

                
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">Meta title</label>
                                <input id="metatitle" name="productname" type="text" class="form-control" placeholder="Metatitle">
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">Meta Keywords</label>
                                <input id="metakeywords" name="manufacturername" type="text" class="form-control" placeholder="Meta Keywords">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">Meta Description</label>
                                <textarea class="form-control" id="metadescription" rows="5" placeholder="Meta Description"></textarea>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
                    </div>
                </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
       
    </div>   
            
                   
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/backend/libs/select2/select2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/dropzone/dropzone.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/alert.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/ecommerce-select2.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/backend/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views/admin/categories/add_edit_category.blade.php ENDPATH**/ ?>