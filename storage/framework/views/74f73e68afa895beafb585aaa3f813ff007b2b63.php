 
 
<?php $__env->startSection('content'); ?>
 <!-- Hero slider -->
 <div class="swiper-container" id="shop-hero-slider">
   
     <div class="swiper-wrapper">
     <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <!-- Animate first slide on page load -->
         
         <a <?php if(!empty($banner['link'])): ?> href="<?php echo e(url($banner['link'])); ?>" <?php else: ?> href="javascript:void();">
            <div class="swiper-slide shop-hero-slider-animating ui-bg-cover" style="background-image: url('<?php echo e(asset('images/front/banners/'.$banner['image'])); ?>')">
             <div class="container px-3">
                 <div class="shop-hero-container">
                     <?php echo e($banner['class']); ?>

                     </div>
                 </div>
             </div>
             </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
     
     
         
         
     </div>
     <div class="swiper-button-next custom-icon">
         <i class="lnr lnr-chevron-right text-body"></i>
     </div>
     <div class="swiper-button-prev custom-icon">
         <i class="lnr lnr-chevron-left text-body"></i>
     </div>
 </div>
 <!-- Hero slider -->

 <!-- Popular categories -->
 <div class="container px-3">
     <h6 class="text-center text-muted font-weight-normal text-expanded my-5">POPULAR CATEGORIES</h6>

     <div class="shop-popular-categories form-row">
         <div class="col-sm-6 col-md-4 col-lg-3">
             <a href="#" class="img-thumbnail img-thumbnail-shadow ui-rect-75 ui-bg-cover ui-bg-overlay-container" style="background-image: url('images/front/uikit/presentation-suit.jpg');">
                 <div class="ui-bg-overlay bg-white opacity-50"></div>
                 <div class="justify-content-stretch d-flex align-items-end ui-rect-content">
                     <div class="d-block w-100 bg-white text-center text-body py-2 px-3">Suits</div>
                 </div>
             </a>
         </div>
         <div class="col-sm-6 col-md-4 col-lg-3">
             <a href="#" class="img-thumbnail img-thumbnail-shadow ui-rect-75 ui-bg-cover ui-bg-overlay-container" style="background-image: url('images/front/uikit/presentation-shirt.jpg');">
                 <div class="ui-bg-overlay bg-white opacity-50"></div>
                 <div class="justify-content-stretch d-flex align-items-end ui-rect-content">
                     <div class="d-block w-100 bg-white text-center text-body py-2 px-3">T-Shirts</div>
                 </div>
             </a>
         </div>
         <div class="col-sm-6 col-md-4 col-lg-3">
             <a href="#" class="img-thumbnail img-thumbnail-shadow ui-rect-75 ui-bg-cover ui-bg-overlay-container" style="background-image: url('images/front/uikit/presentation-jeans.jpg');">
                 <div class="ui-bg-overlay bg-white opacity-50"></div>
                 <div class="justify-content-stretch d-flex align-items-end ui-rect-content">
                     <div class="d-block w-100 bg-white text-center text-body py-2 px-3">Jeans</div>
                 </div>
             </a>
         </div>
         <div class="col-sm-6 col-md-4 col-lg-3">
             <a href="#" class="img-thumbnail img-thumbnail-shadow ui-rect-75 ui-bg-cover ui-bg-overlay-container" style="background-image: url('images/front/uikit/presentation-costume.jpg');">
                 <div class="ui-bg-overlay bg-white opacity-50"></div>
                 <div class="justify-content-stretch d-flex align-items-end ui-rect-content">
                     <div class="d-block w-100 bg-white text-center text-body py-2 px-3">Sweaters</div>
                 </div>
             </a>
         </div>
     </div>
 </div>
 <!-- Popular categories -->

 <!-- Featured products -->
 <hr class="mt-5 mb-0">
 <div class="container px-3">
     <h6 class="text-center text-muted font-weight-normal text-expanded my-5">FEATURED PRODUCTS</h6>

     <div class="row row-bordered no-gutters ui-bordered">
         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/iwatch.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">Apple iWatch (black)</a>
             </h6>
             <div class="text-muted small mb-3">
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             </div>
             <strong>$399.00</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-info text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/backpack.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">HERO ATHLETES BAG</a>
             </h6>
             <div class="text-muted small mb-3">
                 Curabitur aliquet magna nisi, ut volutpat mi ullamcorper sed.
             </div>
             <strong>$160.00</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-info text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/adidas.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">Adidas Sneakers Originals</a>
             </h6>
             <div class="text-muted small mb-3">
                 Praesent ac rhoncus lacus, quis ultricies diam. In gravida ligula.
             </div>
             <strong>$57.55</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-info text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/nike-1.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">Nike Men Black Liteforce III Sneakers</a>
             </h6>
             <div class="text-muted small mb-3">
                 Proin feugiat eros augue, a sagittis mauris tempor at. Etiam vel justo lectus.
             </div>
             <strong>$57.55</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-primary text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>
     </div>
 </div>
 <!-- / Featured products -->


 <!-- Presentation block -->
 <div class="ui-bg-cover ui-bg-overlay-container py-5 mt-5" style="background-image: url('images/front/bg/29.png');">
     <div class="ui-bg-overlay bg-dark opacity-50"></div>
     <div class="d-flex flex-column justify-content-center align-items-center">
         <div>
             <div class="text-white text-large font-weight-light text-expanded px-2">&mdash; NEW ARRIVALS &mdash;</div>
         </div>
         <div class="display-3 text-white font-weight-bolder mt-2">SAVE 30%</div>
         <button type="button" class="btn btn-outline-white btn-lg text-expanded mt-4">EXPLORE</button>
     </div>
 </div>
 <!-- / Presentation block -->

 <!-- Product list -->
 <div class="container px-3">
     <ul class="nav nav-tabs tabs-alt container justify-content-center border-0 px-3 my-5">
         <a class="nav-item nav-link font-weight-normal text-expanded active" href="#">BEST SELLERS</a>
         <a class="nav-item nav-link font-weight-normal text-expanded" href="#">NEW ARRIWALS</a>
         <a class="nav-item nav-link font-weight-normal text-expanded" href="#">BEST RATED</a>
     </ul>

     <div class="row row-bordered no-gutters">
         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/iwatch.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">Apple iWatch (black)</a>
             </h6>
             <div class="text-muted small mb-3">
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             </div>
             <strong>$399.00</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-primary text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/backpack.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">HERO ATHLETES BAG</a>
             </h6>
             <div class="text-muted small mb-3">
                 Curabitur aliquet magna nisi, ut volutpat mi ullamcorper sed.
             </div>
             <strong>$160.00</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-primary text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/adidas.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">Adidas Sneakers Originals</a>
             </h6>
             <div class="text-muted small mb-3">
                 Praesent ac rhoncus lacus, quis ultricies diam. In gravida ligula.
             </div>
             <strong>$57.55</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-primary text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/nike-1.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">Nike Men Black Liteforce III Sneakers</a>
             </h6>
             <div class="text-muted small mb-3">
                 Proin feugiat eros augue, a sagittis mauris tempor at. Etiam vel justo lectus.
             </div>
             <strong>$57.55</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-primary text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/headphones.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">Wireless headphones</a>
             </h6>
             <div class="text-muted small mb-3">
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             </div>
             <strong>$235.55</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-primary text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/sunglasses.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">WALKING 400 BLUE CAT3</a>
             </h6>
             <div class="text-muted small mb-3">
                 Curabitur aliquet magna nisi, ut volutpat mi ullamcorper sed.
             </div>
             <strong>$20.55</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-primary text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/ps4.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">PlayStation 4 1TB (Jet Black)</a>
             </h6>
             <div class="text-muted small mb-3">
                 Praesent ac rhoncus lacus, quis ultricies diam. In gravida ligula.
             </div>
             <strong>$480.00</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-primary text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

         <div class="col-sm-6 col-lg-3 text-center p-4">
             <a href="#" class="d-block">
                 <img src="images/front/uikit/chair-1.jpg" class="mb-2" alt style="max-width: 75%; max-height: 200px">
             </a>
             <h6>
                 <a href="#" class="text-body">POÄNG</a>
             </h6>
             <div class="text-muted small mb-3">
                 Proin feugiat eros augue, a sagittis mauris tempor at. Etiam vel justo lectus.
             </div>
             <strong>$159.00</strong>
             <div class="mt-4 mb-3">
                 <button type="button" class="btn btn-outline-primary text-expanded">BUY NOW</button> &nbsp;
             </div>
         </div>

     </div>
 </div>
 <!-- / Product list -->

 <!-- Blog posts -->
 <hr class="mt-5 mb-0">
 <div class="container px-3">
     <h6 class="text-center text-muted font-weight-normal text-expanded my-5">OUR BLOG POSTS</h6>

     <div class="row no-gutters row-bordered ui-bordered">

         <div class="col-lg-4 pt-0">
             <a href="#" class="d-block ui-rect ui-bg-cover" style="background-image: url('images/front/bg/6.jpg');"></a>
             <div class="p-4">
                 <div class="text-muted small mb-3">May 21, 2017</div>
                 <h5 class="mb-3">
                     <a href="#" class="text-body">Party Jokes Startling But Unnecessary</a>
                 </h5>
                 <div class="text-muted mb-4">
                     Curabitur pulvinar felis auctor lectus tincidunt iaculis. Vivamus aliquam elementum libero.
                 </div>
                 <div class="text-muted small">
                     <a href="#" class="text-muted">Allie Rodriguez</a>
                     &nbsp; &nbsp;·&nbsp; &nbsp;
                     <span class="ion ion-ios-eye"></span> 562 &nbsp; &nbsp; &nbsp;
                     <a href="#" class="text-muted">
                         <span class="ion ion-ios-text"></span> 12</a>
                 </div>
             </div>
         </div>

         <div class="col-lg-4 pt-0">
             <a href="#" class="d-block ui-rect ui-bg-cover" style="background-image: url('images/front/bg/7.jpg');"></a>
             <div class="p-4">
                 <div class="text-muted small mb-3">May 21, 2017</div>
                 <h5 class="mb-3">
                     <a href="#" class="text-body">The Luxury Of Traveling With Yacht Charter Companies</a>
                 </h5>
                 <div class="text-muted mb-4">
                     Curabitur pulvinar felis auctor lectus tincidunt iaculis. Vivamus aliquam elementum libero.
                 </div>
                 <div class="text-muted small">
                     <a href="#" class="text-muted">Allie Rodriguez</a>
                     &nbsp; &nbsp;·&nbsp; &nbsp;
                     <span class="ion ion-ios-eye"></span> 562 &nbsp; &nbsp; &nbsp;
                     <a href="#" class="text-muted">
                         <span class="ion ion-ios-text"></span> 12</a>
                 </div>
             </div>
         </div>

         <div class="col-lg-4 pt-0">
             <a href="#" class="d-block ui-rect ui-bg-cover" style="background-image: url('images/front/bg/8.jpg');"></a>
             <div class="p-4">
                 <div class="text-muted small mb-3">May 21, 2017</div>
                 <h5 class="mb-3">
                     <a href="#" class="text-body">Three Ways To Get Travel Discounts</a>
                 </h5>
                 <div class="text-muted mb-4">
                     Curabitur pulvinar felis auctor lectus tincidunt iaculis. Vivamus aliquam elementum libero.
                 </div>
                 <div class="text-muted small">
                     <a href="#" class="text-muted">Allie Rodriguez</a>
                     &nbsp; &nbsp;·&nbsp; &nbsp;
                     <span class="ion ion-ios-eye"></span> 562 &nbsp; &nbsp; &nbsp;
                     <a href="#" class="text-muted">
                         <span class="ion ion-ios-text"></span> 12</a>
                 </div>
             </div>
         </div>
     </div>

     <div class="text-center mt-4">
         <button type="button" class="btn btn-primary text-expanded">SHOW MORE</button>
     </div>
 </div>
 <!-- / Blog posts -->

 <!-- Subscribe -->
 <div class="bg-lighter py-5 mt-5">
     <div class="container px-3">
         <div class="row justify-content-center text-center">
             <div class="col-md-8 col-lg-6">
                 <div class="display-4 font-weight-semibold mb-3">Get Discount Info</div>
                 <div class="lead text-muted mb-4">Subscribe to the our mailing list to receive updates on new arrivals, special offers and other discount information.</div>
                 <div class="media flex-wrap justify-content-center">
                     <input type="text" class="form-control form-control-lg media-body" placeholder="Enter your email address">
                     <div class="d-sm-none d-block w-100 pt-3"></div>
                     <button type="button" class="btn btn-primary btn-lg d-block text-expanded ml-sm-2">SUBSCRIBE</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- / Subscribe -->
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('frontend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myproject1\mido-shops\resources\views\frontend\home.blade.php ENDPATH**/ ?>