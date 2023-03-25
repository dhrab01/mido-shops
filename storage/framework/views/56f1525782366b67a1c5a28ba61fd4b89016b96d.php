<?php

use App\Models\Product;
use App\Models\Category; ?>


<?php $__env->startSection('content'); ?>
<!-- START SECTION BANNER -->




<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">

        <div class="carousel-inner">
            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php echo e($key==0?'active':''); ?> background_bg" data-img-src="<?php echo e(URL::asset('images/front/banners/'.$banner['image']  )); ?>">
                <div class="banner_slide_content banner_content_inner">
                    <div class="col-lg-7 col-10">
                        <div class="m-3 banner_content overflow-hidden">
                            <h5 class="staggered-animation" data-animation="slideInRight" data-animation-delay="0.5s"><?php echo e($banner['alt']); ?> </h5>
                            <h2 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInRight" data-animation-delay="1s"><?php echo e($banner['title']); ?> </h2>
                            <h4 class="staggered-animation mb-4 product-price" data-animation="slideInRight" data-animation-delay="1.2s"><span class="price">$45.00</span><del>$55.25</del></h4>
                            <a class="btn btn-fill-out  btn-radius staggered-animation text-uppercase" href="<?php echo e($banner['link']); ?>" data-animation="slideInRight" data-animation-delay="1.5s">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <ol class="carousel-indicators indicators_style3">
            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="<?php echo e($key); ?>" class="<?php echo e($key==0?'active':''); ?>"></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ol>
    </div>
</div>





<!-- END SECTION BANNER -->

<!-- START SECTION CLIENT LOGO -->
<div class="section pt-4 small_pb">
    <div class="custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading_tab_header">
                    <div class="heading_s2">
                        <h4>الماركات</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}, "1199":{"items": "6"}}'>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="assets/images/cl_logo1.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="assets/images/cl_logo2.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="assets/images/cl_logo3.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="assets/images/cl_logo4.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="assets/images/cl_logo5.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="assets/images/cl_logo6.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="assets/images/cl_logo7.png" alt="cl_logo" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CLIENT LOGO -->

<!-- END MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section small_pt pb-0">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <?php if(isset($display_2[0]['image'])): ?>
                    <div class="sale-banner">
                        <a class="hover_effect1" href="<?php echo e(url($display_2[0]['link'])); ?>">
                            <img src="<?php echo e(URL::asset('images/front/banners/'.$display_2[0]['image'])); ?>" alt="<?php echo e($display_2[0]['alt']); ?>">
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading_tab_header">
                                <div class="heading_s2">
                                    <h4>المنتجات الحصرية</h4>
                                </div>
                                <div class="tab-style2">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tabmenubar" aria-expanded="false">
                                        <span class="ion-android-menu"></span>
                                    </button>
                                    <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="arrival-tab" data-bs-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">وصل حديثا</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="sellers-tab" data-bs-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">الاكثر مبيعا</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="featured-tab" data-bs-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">المنتجات المميزة</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="special-tab" data-bs-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false">عرض خاص</a>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab_slider">
                                <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                                    <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                        <?php $__currentLoopData = $newprodects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php $products_image_path = 'images/front/products/small/' . $products['product_image']; ?>
                                        <div class="item">
                                            <div class="product_wrap">
                                                <span class="pr_flash bg-danger">New</span>
                                                <div class="product_img">
                                                    <a href="<?php echo e(url('product/'.$products['id'])); ?>">
                                                        <?php if(!empty($products['product_image']) && file_exists($products_image_path)): ?>
                                                        <img src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                                        <img class="product_hover_img" src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                                        <?php else: ?>
                                                        <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                                        <img class="product_hover_img" src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                                        <?php endif; ?>
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>اضافة الى السلة</a></li>
                                                            <li><a href="<?php echo e(url('product/'.$products['id'])); ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="<?php echo e(url('product/'.$products['id'])); ?>"><?php echo e($products['product_name']); ?></a></h6>
                                                    <?php $getDiscountPrice = Product::getDiscountPrice($products['id']);
                                                    $catDiscount = Category::select('category_discount')->where('id', $products['category_id'])->first(); ?>
                                                    <div class="product_price">
                                                        <?php if($getDiscountPrice>0): ?>
                                                        <span class="price">$<?php echo e($getDiscountPrice); ?></span>
                                                        <del>$<?php echo e($products['product_price']); ?></del>
                                                        <div class="on_sale">
                                                            <span><?php echo e($products['product_discount']>0 ? $products['product_discount'] : $catDiscount['category_discount']); ?>% Off</span>
                                                        </div>
                                                        <?php else: ?>
                                                        <span class="price">$<?php echo e($products['product_price']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:80%"></div>
                                                        </div>
                                                        <span class="rating_num">(21)</span>
                                                    </div>
                                                    <div class="pr_desc">
                                                        <p><?php echo e($products['discription']); ?>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                                    <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                        <?php $__currentLoopData = $best_sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php $products_image_path = 'images/front/products/small/' . $products['product_image']; ?>
                                        <div class="item">
                                            <div class="product_wrap">
                                                <span class="pr_flash  bg-success">Sale</span>
                                                <div class="product_img">
                                                    <a href="<?php echo e(url('product/'.$products['id'])); ?>">
                                                        <?php if(!empty($products['product_image']) && file_exists($products_image_path)): ?>
                                                        <img src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                                        <img class="product_hover_img" src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                                        <?php else: ?>
                                                        <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                                        <img class="product_hover_img" src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                                        <?php endif; ?>
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>اضافة الى السلة</a></li>
                                                            <li><a href="<?php echo e(url('product/'.$products['id'])); ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="<?php echo e(url('product/'.$products['id'])); ?>"><?php echo e($products['product_name']); ?></a></h6>
                                                    <?php $getDiscountPrice = Product::getDiscountPrice($products['id']);
                                                    $catDiscount = Category::select('category_discount')->where('id', $products['category_id'])->first(); ?>
                                                    <div class="product_price">
                                                        <?php if($getDiscountPrice>0): ?>
                                                        <span class="price">$<?php echo e($getDiscountPrice); ?></span>
                                                        <del>$<?php echo e($products['product_price']); ?></del>
                                                        <div class="on_sale">
                                                            <span><?php echo e($products['product_discount']>0 ? $products['product_discount'] : $catDiscount['category_discount']); ?>% Off</span>
                                                        </div>
                                                        <?php else: ?>
                                                        <span class="price">$<?php echo e($products['product_price']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:80%"></div>
                                                        </div>
                                                        <span class="rating_num">(21)</span>
                                                    </div>
                                                    <div class="pr_desc">
                                                        <p><?php echo e($products['discription']); ?>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                    <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>

                                        <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php $products_image_path = 'images/front/products/small/' . $products['product_image']; ?>
                                        <div class="item">
                                            <div class="product_wrap">
                                                <span class="pr_flash  bg-success">Hot</span>
                                                <div class="product_img">
                                                    <a href="<?php echo e(url('product/'.$products['id'])); ?>">
                                                        <?php if(!empty($products['product_image']) && file_exists($products_image_path)): ?>
                                                        <img src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                                        <img class="product_hover_img" src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                                        <?php else: ?>
                                                        <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                                        <img class="product_hover_img" src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                                        <?php endif; ?>
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>اضافة الى السلة</a></li>
                                                            <li><a href="<?php echo e(url('product/'.$products['id'])); ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="<?php echo e(url('product/'.$products['id'])); ?>"><?php echo e($products['product_name']); ?></a></h6>
                                                    <?php $getDiscountPrice = Product::getDiscountPrice($products['id']);
                                                    $catDiscount = Category::select('category_discount')->where('id', $products['category_id'])->first(); ?>
                                                    <div class="product_price">
                                                        <?php if($getDiscountPrice>0): ?>
                                                        <span class="price">$<?php echo e($getDiscountPrice); ?></span>
                                                        <del>$<?php echo e($products['product_price']); ?></del>
                                                        <div class="on_sale">
                                                            <span><?php echo e($products['product_discount']>0 ? $products['product_discount'] : $catDiscount['category_discount']); ?>% Off</span>
                                                        </div>
                                                        <?php else: ?>
                                                        <span class="price">$<?php echo e($products['product_price']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:80%"></div>
                                                        </div>
                                                        <span class="rating_num">(51)</span>
                                                    </div>
                                                    <div class="pr_desc">
                                                        <p><?php echo e($products['discription']); ?>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="special" role="tabpanel" aria-labelledby="special-tab">
                                    <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>

                                        <?php $__currentLoopData = $dicounted_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php $products_image_path = 'images/front/products/small/' . $products['product_image']; ?>
                                        <div class="item">
                                            <div class="product_wrap">
                                                <span class="pr_flash  bg-success">Sale</span>
                                                <div class="product_img">
                                                    <a href="<?php echo e(url('product/'.$products['id'])); ?>">
                                                        <?php if(!empty($products['product_image']) && file_exists($products_image_path)): ?>
                                                        <img src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                                        <img class="product_hover_img" src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                                        <?php else: ?>
                                                        <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                                        <img class="product_hover_img" src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                                        <?php endif; ?>
                                                    </a>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>اضافة الى السلة</a></li>
                                                            <li><a href="<?php echo e(url('product/'.$products['id'])); ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="<?php echo e(url('product/'.$products['id'])); ?>"><?php echo e($products['product_name']); ?></a></h6>
                                                    <?php $getDiscountPrice = Product::getDiscountPrice($products['id']);
                                                    $catDiscount = Category::select('category_discount')->where('id', $products['category_id'])->first(); ?>
                                                    <div class="product_price">
                                                        <?php if($getDiscountPrice>0): ?>
                                                        <span class="price">$<?php echo e($getDiscountPrice); ?></span>
                                                        <del>$<?php echo e($products['product_price']); ?></del>
                                                        <div class="on_sale">
                                                            <span><?php echo e($products['product_discount']>0 ? $products['product_discount'] : $catDiscount['category_discount']); ?>% Off</span>
                                                        </div>
                                                        <?php else: ?>
                                                        <span class="price">$<?php echo e($products['product_price']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:80%"></div>
                                                        </div>
                                                        <span class="rating_num">(21)</span>
                                                    </div>
                                                    <div class="pr_desc">
                                                        <p><?php echo e($products['discription']); ?>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION BANNER -->
    <div class="section pb_20 small_pt">
        <div class="custom-container">
            <div class="row">
                <?php for($i=0;$i<3;$i++): ?> <?php if(isset($display_3[0]['image'])): ?> <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="<?php echo e(url($display_3[0]['link'])); ?>">
                            <img src="<?php echo e(URL::asset('images/front/banners/'.$display_3[0]['image'])); ?>" alt="<?php echo e($display_3[0]['alt']); ?>">
                        </a>
                    </div>
            </div>
            <?php endif; ?>
            <?php endfor; ?>

        </div>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START SECTION SHOP -->
<div class="section pt-0 pb-0">
    <div class="custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading_tab_header">
                    <div class="heading_s2">
                        <h4>صفقة اليوم</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style3" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "1"}, "650":{"items": "2"}, "1199":{"items": "2"}}'>
                    <div class="item">
                        <div class="deal_wrap">
                            <div class="product_img">
                                <a href="shop-product-detail.html">
                                    <img src="<?php echo e(URL::asset('images/front/categories/4664.jpg')); ?>" alt="el_img1">
                                </a>
                            </div>
                            <div class="deal_content">
                                <div class="product_info">
                                    <h5 class="product_title"><a href="shop-product-detail.html">Red & Black Headphone</a></h5>
                                    <div class="product_price">
                                        <span class="price">$45.00</span>
                                        <del>$55.25</del>
                                    </div>
                                </div>
                                <div class="deal_progress">
                                    <span class="stock-sold">Already Sold: <strong>6</strong></span>
                                    <span class="stock-available">Available: <strong>8</strong></span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width:46%"> 46% </div>
                                    </div>
                                </div>
                                <div class="countdown_time countdown_style4 mb-4" data-time="2021/10/02 12:30:15"></div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="deal_wrap">
                            <div class="product_img">
                                <a href="shop-product-detail.html">
                                    <img src="<?php echo e(URL::asset('images/front/categories/638.jpg')); ?>" alt="el_img2">
                                </a>
                            </div>
                            <div class="deal_content">
                                <div class="product_info">
                                    <h5 class="product_title"><a href="shop-product-detail.html">Smart Watch External</a></h5>
                                    <div class="product_price">
                                        <span class="price">$55.00</span>
                                        <del>$95.00</del>
                                    </div>
                                </div>
                                <div class="deal_progress">
                                    <span class="stock-sold">Already Sold: <strong>4</strong></span>
                                    <span class="stock-available">Available: <strong>22</strong></span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100" style="width:26%"> 26% </div>
                                    </div>
                                </div>
                                <div class="countdown_time countdown_style4 mb-4" data-time="2021/09/02 12:30:15"></div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="deal_wrap">
                            <div class="product_img">
                                <a href="shop-product-detail.html">
                                    <img src="<?php echo e(URL::asset('images/front/categories/721.jpg')); ?>" alt="el_img3">
                                </a>
                            </div>
                            <div class="deal_content">
                                <div class="product_info">
                                    <h5 class="product_title"><a href="shop-product-detail.html">Nikon HD camera</a></h5>
                                    <div class="product_price">
                                        <span class="price">$68.00</span>
                                        <del>$99.25</del>
                                    </div>
                                </div>
                                <div class="deal_progress">
                                    <span class="stock-sold">Already Sold: <strong>16</strong></span>
                                    <span class="stock-available">Available: <strong>20</strong></span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width:28%"> 28% </div>
                                    </div>
                                </div>
                                <div class="countdown_time countdown_style4 mb-4" data-time="2021/11/02 12:30:15"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SHOP -->
<div class="section small_pt small_pb">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-3 d-none d-xl-block">

                <?php if(isset($display_2[1]['image'])): ?>
                <div class="sale-banner">
                    <a class="hover_effect1" href="<?php echo e(url($display_2[1]['link'])); ?>">
                        <img src="<?php echo e(URL::asset('images/front/banners/'.$display_2[1]['image'])); ?>" alt="<?php echo e($display_2[1]['alt']); ?>">
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>اشهر المنتجات</h4>
                            </div>
                            <div class="view_all">
                                <a href="#" class="text_default"><i class="linearicons-power"></i> <span>عرض الكل</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                            <?php $__currentLoopData = $trend_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php $products_image_path = 'images/front/products/small/' . $products['product_image']; ?>
                            <div class="item">
                                <div class="product_wrap">
                                    <span class="pr_flash  bg-success">Sale</span>
                                    <div class="product_img">
                                        <a href="<?php echo e(url('product/'.$products['id'])); ?>">
                                            <?php if(!empty($products['product_image']) && file_exists($products_image_path)): ?>
                                            <img src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                            <img class="product_hover_img" src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                            <?php else: ?>
                                            <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                            <img class="product_hover_img" src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                            <?php endif; ?>
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>اضافة الى السلة</a></li>
                                                <li><a href="<?php echo e(url('product/'.$products['id'])); ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?php echo e(url('product/'.$products['id'])); ?>"><?php echo e($products['product_name']); ?></a></h6>
                                        <?php $getDiscountPrice = Product::getDiscountPrice($products['id']);
                                        $catDiscount = Category::select('category_discount')->where('id', $products['category_id'])->first(); ?>
                                        <div class="product_price">
                                            <?php if($getDiscountPrice>0): ?>
                                            <span class="price">$<?php echo e($getDiscountPrice); ?></span>
                                            <del>$<?php echo e($products['product_price']); ?></del>
                                            <div class="on_sale">
                                                <span><?php echo e($products['product_discount']>0 ? $products['product_discount'] : $catDiscount['category_discount']); ?>% Off</span>
                                            </div>
                                            <?php else: ?>
                                            <span class="price">$<?php echo e($products['product_price']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:80%"></div>
                                            </div>
                                            <span class="rating_num">(21)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p><?php echo e($products['discription']); ?>.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->



<!-- START SECTION SHOP -->
<div class="section pt-0 pb_20">
    <div class="custom-container">
        <div class="row">
            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4><?php echo e($section['name']); ?></h4>
                            </div>
                            <div class="view_all">
                                <a href="#" class="text_default"><span>عرض الكل</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                            <?php $__currentLoopData = $section['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="item">
                                <?php $s_products = Product::where('section_id', $section['id'])->where('status', 1)->get()->toArray(); ?>
                                <?php $__currentLoopData = $s_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $products_image_path = 'images/front/products/small/' . $products['product_image']; ?>
                                <div class="product_wrap">
                                    <span class="pr_flash  bg-success">Sale</span>
                                    <div class="product_img">
                                        <a href="<?php echo e(url('product/'.$products['id'])); ?>">
                                            <?php if(!empty($products['product_image']) && file_exists($products_image_path)): ?>
                                            <img src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                            <img class="product_hover_img" src="<?php echo e(URL::asset($products_image_path)); ?>" alt="el_img.$i')}}">
                                            <?php else: ?>
                                            <img src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                            <img class="product_hover_img" src="<?php echo e(URL::asset('images/front/products/small/avatar-3.jpg')); ?>" alt="el_img.$i')}}">
                                            <?php endif; ?>
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>اضافة الى السلة</a></li>
                                                <li><a href="<?php echo e(url('product/'.$products['id'])); ?>" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?php echo e(url('product/'.$products['id'])); ?>"><?php echo e($products['product_name']); ?></a></h6>
                                        <?php $getDiscountPrice = Product::getDiscountPrice($products['id']);
                                        $catDiscount = Category::select('category_discount')->where('id', $products['category_id'])->first(); ?>
                                        <div class="product_price">
                                            <?php if($getDiscountPrice>0): ?>
                                            <span class="price">$<?php echo e($getDiscountPrice); ?></span>
                                            <del>$<?php echo e($products['product_price']); ?></del>
                                            <div class="on_sale">
                                                <span><?php echo e($products['product_discount']>0 ? $products['product_discount'] : $catDiscount['category_discount']); ?>% Off</span>
                                            </div>
                                            <?php else: ?>
                                            <span class="price">$<?php echo e($products['product_price']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:80%"></div>
                                            </div>
                                            <span class="rating_num">(21)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p><?php echo e($products['discription']); ?>.</p>
                                        </div>
                                    </div>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
    <div class="custom-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="newsletter_text text_white">
                    <h3>Join Our Newsletter Now</h3>
                    <p> Register now to get updates on promotions. </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form2 rounded_input">
                    <form>
                        <input type="text" required="" class="form-control" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark btn-radius" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduate\myproject\e-com-site\Admin\resources\views/frontend/home.blade.php ENDPATH**/ ?>