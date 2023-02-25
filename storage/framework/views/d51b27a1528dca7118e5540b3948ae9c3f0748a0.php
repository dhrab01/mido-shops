
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.sections'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/backend/libs/choices.js/choices.js.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/@simonwep/@simonwep.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/backend/libs/flatpickr/flatpickr.min.css')); ?>" rel="stylesheet">

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
               </div>
               <!-- end col-->
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
                        <th>الرمز</th>
                        <th>صورة المنتج</th>
                        <th>رابط الفيديو</th>
                        <th>لون المنتج</th>
                        <th>القسم</th>
                        <th>الصنف</th>
                        <th>اصيف بواسطة</th>
                        <th>تحديد كمميز</th>
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
                           <?php echo e($product['product_code']); ?>

                        </td>
                        <td>
                           <?php if(!empty($product['product_image'])): ?>
                           <div class="flex-shrink-0">
                              <div class="avatar-md me-3">
                                 <a href="javascript:void(0)" class="waves-effect waves-light" >
                                 <img src="<?php echo e(URL::asset('images/front/products/small/'. $product['product_image'])); ?>" alt="product-image" class="img-fluid  d-block img-thumbnail">
                                 </a>
                                 
                              </div>
                           </div>
                            <?php else: ?>
                                        <div class="flex-shrink-0">
                                        <div class="avatar-md me-3">
                                                <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="product-image" class="img-fluid  d-block img-thumbnail">
                                        </div>
                                    </div>
                           <?php endif; ?>
                        </td>
                        <td>
                           <?php if(!empty($product['product_video'])): ?>
                           <?php echo e($product['product_video']); ?>

                           <?php else: ?>
                           <span class="text-info">لا يوجد</span>
                           <?php endif; ?>
                        </td>
                        <td>
                           <?php echo e($product['product_color']); ?>

                        </td>
                        <td>
                           <?php echo e($product['section']['name']); ?>

                        </td>
                        <td>
                           <?php echo e($product['category']['category_name']); ?>

                        </td>
                        <td>
                           <?php if($product['admin_type']=="vendor"): ?>
                           <button type="button" class="btn btn-link link-info waves-effect waves-light show-link"  value="<?php echo e($product['admin']['id']); ?>"><?php echo e($product['admin']['name']); ?></button>
                           <?php else: ?>
                            <span class="link-info waves-effect waves-light "><?php echo e($product['admin_type']); ?></span>
                           <?php endif; ?>
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
<!-- sample modal content -->
<div id="myModal" class="modal fade bs-example-modal-xl show-detail" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            
               <div class="text-center">
                        <div class=" mt-sm-0">
                                 <img src="" alt="profile-image" id="admin_image" style="height: 7.5rem; width: 7.5rem;" class="  rounded-circle shadow-4-strong img-thumbnail">
                              
                              <div id="type">
                                  
                              </div>
                           
                        </div>
               </div>
               <!-- end card header -->
               
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">البيانات الشخصية</span>
                        </a>
                     </li>
                     <li class="nav-item btb">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">بيانات المتجر</span>
                        </a>
                     </li>
                     
                     
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content p-3 text-muted">
                     <div class="tab-pane active" id="home" role="tabpanel">
                       <div class="row">
                            <input type="hidden" id="admin_id" name="admin_id" value="">
                            <div class="form-group mb-3">
                             <label for="admin_name">الاسم</label>
                             <input type="text" class="form-control" id="admin_name" name="admin_name" value="" readonly>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="admin_email">البريد الالكتروني</label>
                            <input type="email" class="form-control" id="admin_email" name="admin_email" value="" readonly>
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="phone_numper">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone_number" value="" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="admin_address" class="lbl">العنوان</label>
                            <input type="text" class="form-control" value="" id="admin_address" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="admin_city" class="lbl">المحافضة</label>
                            <input type="text" class="form-control" value="" id="admin_city" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="admin_state" class="lbl">المديرية</label>
                            <input type="text" class="form-control" value="" id="admin_state" readonly>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label class="lbl">الدولة</label>
                            <input type="text" class="form-control" value="" id="admin_country" readonly>
                        </div>
                    </div>
                       </div>
                     </div>
                     <div class="tab-pane" id="profile" role="tabpanel">
                       <div class="row">
                           <input type="hidden" id="shop_id" name="shop_id" value="">
                            <div class="form-group mb-3">
                             <label for="shop_name">اسم المتجر</label>
                             <input type="text" class="form-control" id="shop_name" name="shop_name" value="" readonly>
                    </div>

                    
                     
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="shop_address" class="lbl">العنوان</label>
                            <input type="text" class="form-control" value="" id="shop_address" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="shop_city" class="lbl">المحافضة</label>
                            <input type="text" class="form-control" value="" id="shop_city" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="shop_state" class="lbl">المديرية</label>
                            <input type="text" class="form-control" value="" id="shop_state" readonly>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label class="lbl">الدولة</label>
                            <input type="text" class="form-control" value="" id="shop_country" readonly>
                        </div>
                    </div>
                       </div>
                     </div>
                    
                  </div>
               
            
            <!-- end card -->
         </div>
         <div class="modal-footer">
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>zz
<script src="<?php echo e(URL::asset('assets/backend/js/custom.js')); ?>"></script>

<script src="<?php echo e(URL::asset('assets/backend/js/pages/alert.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net/datatables.net.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/backend/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views/admin/products/products.blade.php ENDPATH**/ ?>