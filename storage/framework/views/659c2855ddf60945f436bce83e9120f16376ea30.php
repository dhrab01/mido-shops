<?php
use App\Models\Product; 
?>


<?php $__env->startSection('content'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1><?php echo e($url); ?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="#">الاصناف</a></li>
                    <li class="breadcrumb-item active"><?php echo e($url); ?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
    	<div class="row">
			<div class="col-lg-9">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="order">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product_header_right">
                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="">Showing</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row shop_container">
                    <?php $__currentLoopData = $catProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disProduct = Product::getDiscountPrice($prodect['id']); ?>
                    <?php $products_image_path = 'images/front/products/small/' . $prodect['product_image']; ?>
                    <div class="col-md-4 col-6">
                        <div class="product">
                            <div class="product_img">
                            <?php if(!empty($prodect['product_image']) && file_exists($products_image_path)): ?>
                                <a href="shop-product-detail.html">
                                    <img src="<?php echo e(URL::asset($products_image_path)); ?>" alt="product_img1">
                                </a>
                                <?php else: ?>
                                <a href="shop-product-detail.html">
                                <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                </a>
                                <?php endif; ?>

                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="shop-product-detail.html"><?php echo e($prodect['product_name']); ?></a></h6>
                                <div class="product_price">
                                    <?php if($disProduct > 0): ?>
                                    <span class="price">$ <?php echo e($disProduct); ?></span>
                                    <del>$ <?php echo e($prodect['product_price']); ?></del>
                                    <div class="on_sale">
                                        <span>% <?php echo e($prodect['product_discount']); ?> خصم</span>
                                    </div>
                                    <?php else: ?>
                                    <span class="price">$ <?php echo e($prodect['product_price']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_desc">
                                    <p><?php echo e($prodect['discription']); ?></p>
                                </div>
                                <div class="pr_switch_wrap">
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div>
                                <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                   
                </div>
        		
        	</div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<?php echo $__env->make('frontend.products.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->



</div>
<!-- END MAIN CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views/frontend/products/listing.blade.php ENDPATH**/ ?>