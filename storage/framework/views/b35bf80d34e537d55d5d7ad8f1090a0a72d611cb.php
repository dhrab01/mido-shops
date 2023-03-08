
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.add_edit_product'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/select2/select2.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('admin.components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Products <?php $__env->endSlot(); ?>
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
        <form <?php if(empty($products['id'])): ?> action="<?php echo e(url('admin/add_edit_product')); ?>" <?php else: ?> action="<?php echo e(url('admin/add_edit_product/'.$products['id'])); ?>" <?php endif; ?> method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات المنتج</h4>
                    <!-- <p class="card-title-desc">Fill all information below</p> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="category_id" class="control-label">الاصنف</label>
                                <select name="category_id" id="category_id" class="form-control select2">
                                    <option>Select</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <optgroup label="<?php echo e($section['name']); ?>"></optgroup>
                                    <?php $__currentLoopData = $section['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(!empty($products['category_id']==$category['id'])): ?> selected <?php endif; ?> value="<?php echo e($category['id']); ?>">&nbsp;&nbsp;&nbsp;--&nbsp;<?php echo e($category['category_name']); ?></option>
                                    <?php $__currentLoopData = $category['sub_category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(!empty($products['category_id']==$category['id'])): ?> selected <?php endif; ?> value="<?php echo e($subcategory['id']); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?php echo e($subcategory['category_name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_name">اسم المنتج</label>
                                <input id="product_name" name="product_name" type="text" class="form-control" placeholder="product Name" <?php if(!empty($products['product_name'])): ?> value="<?php echo e($products['product_name']); ?>" <?php else: ?> value="<?php echo e(old('product_name')); ?>" <?php endif; ?>>
                            </div>

                            <div class="mb-3">
                                <label for="product_code"> رمز المنتج</label>
                                <input id="product_code" name="product_code" type="text" class="form-control" placeholder="product Code" <?php if(!empty($products['product_code'])): ?> value="<?php echo e($products['product_code']); ?>" <?php else: ?> value="<?php echo e(old('product_code')); ?>" <?php endif; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="product_color">لون المنتج</label>
                                <input id="product_color" name="product_color" type="text" class="form-control" placeholder="product Color" <?php if(!empty($products['product_color'])): ?> value="<?php echo e($products['product_color']); ?>" <?php else: ?> value="<?php echo e(old('product_color')); ?>" <?php endif; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="product_price">سعر المنتج</label>
                                <input id="product_price" name="product_price" type="text" class="form-control" placeholder="product Price" <?php if(!empty($products['product_price'])): ?> value="<?php echo e($products['product_price']); ?>" <?php else: ?> value="<?php echo e(old('product_price')); ?>" <?php endif; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="product_unit">عدد الوحدات</label>
                                <input id="product_unit" name="product_unit" type="text" class="form-control" placeholder="product Units" <?php if(!empty($products['product_unit'])): ?> value="<?php echo e($products['product_unit']); ?>" <?php else: ?> value="<?php echo e(old('product_unit')); ?>" <?php endif; ?>>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="brand_id" class="control-label">الماركة</label>
                                <select name="brand_id" id="brand_id" class="form-control select2">
                                    <option>Select</option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(!empty($products['brand_id']==$brand['id'])): ?> selected <?php endif; ?> value="<?php echo e($brand['id']); ?>"><?php echo e($brand['brand_name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_discount">نسبة التخفيض (%)</label>
                                <input id="product_discount" name="product_discount" type="text" class="form-control" placeholder="Dicount" <?php if(!empty($products['product_discount'])): ?> value="<?php echo e($products['product_discount']); ?>" <?php else: ?> value="<?php echo e(old('product_discount')); ?>" <?php endif; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="product_weight">الوزن</label>
                                <input id="product_weight" name="product_weight" type="text" class="form-control" placeholder="product Weight" <?php if(!empty($products['product_weight'])): ?> value="<?php echo e($products['product_weight']); ?>" <?php else: ?> value="<?php echo e(old('product_weight')); ?>" <?php endif; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="decription">الوصف</label>
                                <textarea class="form-control" id="decription" name="decription" rows="10" placeholder="Product Description">
                                <?php if(!empty($products['discription'])): ?> <?php echo e($products['discription']); ?> <?php endif; ?>
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">صورة المنتج(size:1000x1000)</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group mb-2">
                                <input class="form-control" id="product-image" name="product-image" type="file" />
                            </div>
                        </div>
                        <div class="col-4">
                            <?php if(!empty($products['product_image'])): ?>
                            <div class="card">
                                <img class="card-img-top img-fluid" src="<?php echo e(URL::asset('images/front/products/small/'. $products['product_image'])); ?>" alt="product-image">
                                <div class="card-body">
                                    <a href="javascript:void(0)" class="conformDelete btn btn-danger waves-effect waves-light w-sm" module="product-image" moduleid="<?php echo e($products['id']); ?>"><i class="mdi mdi-trash-can d-block font-size-12"></i>حذف الصورة </a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">رابط الفيديو الخاص بالمنتج</h4>
                    <span class="text-info"> (اختياري)</span>
                </div>
                <div class="card-body">

                    <div class="form-group mb-2">
                        <input type="text" name="product_video" placeholder="('EX') : https://www.youtube.com/embed/5R06LRdUCSE" class="form-control" <?php if(!empty($products['product_video'])): ?> value="<?php echo e($products['product_video']); ?>" <?php else: ?> value="<?php echo e(old('product_video')); ?>" <?php endif; ?>>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات الميتا</h4>
                    <!-- <p class="card-title-desc">Fill all information below</p> -->
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">العنوان</label>
                                <input id="metatitle" name="metatitle" type="text" class="form-control" placeholder="Metatitle" <?php if(!empty($products['meta_title'])): ?> value="<?php echo e($products['meta_title']); ?>" <?php else: ?> value="<?php echo e(old('meta_title')); ?>" <?php endif; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">الكلمات المفتاحية</label>
                                <input id="metakeywords" name="metakeywords" type="text" class="form-control" placeholder="Meta Keywords" <?php if(!empty($products['meta_keywords'])): ?> value="<?php echo e($products['meta_keywords']); ?>" <?php else: ?> value="<?php echo e(old('meta_keywords')); ?>" <?php endif; ?>>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">الوصف</label>
                                <textarea class="form-control" id="metadescription" name="metadescription" rows="5" placeholder="Meta Description">
                                <?php if(!empty($products['meta_discription'])): ?><?php echo e($products['meta_discription']); ?> <?php endif; ?>
                                </textarea>
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

<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/backend/js/custom.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/select2/select2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/alert.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/ecommerce-select2.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/backend/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views\admin\products\add_edit_product.blade.php ENDPATH**/ ?>