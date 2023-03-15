
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.add_edit_product'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('admin.components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Attributes <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-6 ">
        <?php if(Session::has('success_message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            <strong>Success: </strong> <?php echo e(Session::get('success_message')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <?php if(Session::has('error_message')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error: </strong> <?php echo e(Session::get('error_message')); ?>

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
        <form  action="<?php echo e(url('admin/add_edit_attributes/'.$product['id'])); ?>" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                    <h4 class="card-title">بيانات المنتج</h4>
                    <!-- <p class="card-title-desc">Fill all information below</p> -->
                    </div>
                    <div class="col-sm-6">
                    <div class="text-sm-end">
                        <a href="javascript:void(0);" class="add_button btn btn-primary" title="Add field"><i class=" mdi mdi-plus-box  me-1"></i>اضافة  صفة</a>
                    </div>
                    </div>
                 </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="product_name">اسم المنتج</label>
                                <input class="form-control" type="text" value="<?php echo e($product['product_name']); ?>" readonly>
                                
                            </div>
                            
                            <div class="mb-3">
                                <label for="product_code"> رمز المنتج</label>
                                <input class="form-control" type="text" value="<?php echo e($product['product_code']); ?>" readonly>
                                 
                            </div>
                            <div class="mb-3">
                                <label for="product_color">لون المنتج</label>
                                 <input class="form-control" type="text" value="<?php echo e($product['product_color']); ?>" readonly>
                                 
                            </div>
                            <div class="mb-3">
                                <label for="product_price">سعر المنتج</label>
                                 <input class="form-control" type="text" value="<?php echo e($product['product_price']); ?>" readonly>
                               
                            </div>

                            
                        </div>

                        <div class="col-sm-4">
                            
                           <?php if(!empty($product['product_image'])): ?>
                                 <img class="d-block img-thumbnail img-fluid" style="height: 100%;" src="<?php echo e(URL::asset('images/front/products/small/'. $product['product_image'])); ?>" alt="product-image">
                            <?php else: ?>
                             <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="product-image" class="img-fluid  d-block img-thumbnail" style="height: 100%;">
                           <?php endif; ?>   
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="field_wrapper">
                               <div>
                                 <input type="text" name="size[]" placeholder="Size" class="me-2 mb-2" />
                                 
                                 <input type="text" name="sku[]" placeholder="SKU" class="me-2 mb-2" />
                                
                                 <input type="text" name="price[]" placeholder="Price" class="me-2 mb-2" />
                                 
                                 <input type="text" name="stock[]" placeholder="Stock" class="me-2 mb-2" />
                               </div>
                               
                           </div>
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
<!-- attributes table -->
<div class="row mt-12">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                 <h4 class="card-title">مواصفات المنتج</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo e(url('admin/edit_attributes/'.$product['id'])); ?>" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                <div class="table-responsive">
                    <table id="attribute" class="data-table table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Size</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $product['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" name="attributeId[]"  value="<?php echo e($attribute['id']); ?>" style="display:none;" />
                            <tr>
                                <td>
                                    <?php echo e($attribute['id']); ?>

                                </td>
                                <td>
                                    <?php echo e($attribute['size']); ?>

                                </td>
                                <td>
                                    <?php echo e($attribute['sku']); ?>

                                </td>
                                 <td>
                                    
                                     <input type="number" name="price[]" style="width:70px;" class="me-2 mb-2" value="<?php echo e($attribute['price']); ?>" />

                                </td>
                                 <td>
                                    
                                    <input type="number" name="stock[]" style="width:70px;" class="me-2 mb-2" value="<?php echo e($attribute['stock']); ?>" />
                                </td>
                                <td>
                                    <?php if($attribute['status']==1): ?>
                                    <input type="checkbox" class="updateStatus" id="module-<?php echo e($attribute['id']); ?>" module="attribute" module_id="<?php echo e($attribute['id']); ?>" status="Active" switch="success" checked />
                                    <label for="module-<?php echo e($attribute['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php else: ?>
                                    <input type="checkbox" class="updateStatus" id="module-<?php echo e($attribute['id']); ?>" module="attribute" module_id="<?php echo e($attribute['id']); ?>" status="Inactive" switch="success" />
                                    <label for="module-<?php echo e($attribute['id']); ?>" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    <?php endif; ?>

                                </td>
                                <td width: 100px>
                                    <div>
                                        <a title="حذف" href="javascript:void(0)" class="conformDelete  btn btn-soft-danger waves-effect waves-light" module="attribute" moduleid="<?php echo e($attribute['id']); ?>"><i class="bx bx-trash font-size-16 align-middle"></i></a></li>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="ms-3">
                <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                </div>
             </form>
            </div>
         </div>
    </div>
</div>

<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/backend/js/custom.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/alert.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net/datatables.net.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/backend/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduate\myproject\e-com-site\Admin\resources\views/admin/attributes/add_edit_attributes.blade.php ENDPATH**/ ?>