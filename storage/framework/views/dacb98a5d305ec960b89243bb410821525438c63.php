<!DOCTYPE html>

<html lang="ar">
<head>
  <!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Shopwise is Powerful multi vendor eCommerce Website.  built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods in Yemen.">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  Souq, clean, minimal, modern, online store, retail, shopping, ecommerce store">

<!-- SITE TITLE -->
<title>Shopwide - eCommerce </title>

 
  <!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(URL::asset('assets/frontend/images/favicon.png')); ?>">
  
 <link rel="stylesheet" href=" <?php echo e(URL::asset('assets/frontend/vendor/css/rtl/bootstrap.css')); ?>" class="theme-settings-bootstrap-css">
  <!-- Animation CSS -->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/animate.css')); ?>">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/bootstrap/css/bootstrap.min.css')); ?>">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/all.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/ionicons.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/themify-icons.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/linearicons.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/flaticon.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/simple-line-icons.css')); ?>">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/owlcarousel/css/owl.carousel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/owlcarousel/css/owl.theme.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/owlcarousel/css/owl.theme.default.min.css')); ?>">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/magnific-popup.css')); ?>">
<!-- Slick CSS -->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/slick.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/slick-theme.css')); ?>">
<!-- Style CSS -->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/responsive.css')); ?>">
<!-- RTL CSS -->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/rtl-style.css')); ?>">
<link href="<?php echo e(URL::asset('assets/backend/css/app.rtl.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

</head>
<body dir="rtl">
  <!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER -->

  <?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php echo $__env->yieldContent('content'); ?>

 <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <!-- Latest jQuery --> 
<script src="<?php echo e(URL::asset('assets/frontend/js/jquery-3.6.0.min.js')); ?>"></script> 
<!-- popper min js -->
<script src="<?php echo e(URL::asset('assets/frontend/js/popper.min.js')); ?>"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="<?php echo e(URL::asset('assets/frontend/bootstrap/js/bootstrap.min.js')); ?>"></script> 
<!-- owl-carousel min js  --> 
<script src="<?php echo e(URL::asset('assets/frontend/owlcarousel/js/owl.carousel.min.js')); ?>"></script> 
<!-- magnific-popup min js  --> 
<script src="<?php echo e(URL::asset('assets/frontend/js/magnific-popup.min.js')); ?>"></script> 
<!-- waypoints min js  --> 
<script src="<?php echo e(URL::asset('assets/frontend/js/waypoints.min.js')); ?>"></script> 
<!-- parallax js  --> 
<script src="<?php echo e(URL::asset('assets/frontend/js/parallax.js')); ?>"></script> 
<!-- countdown js  --> 
<script src="<?php echo e(URL::asset('assets/frontend/js/jquery.countdown.min.js')); ?>"></script> 
<!-- imagesloaded js --> 
<script src="<?php echo e(URL::asset('assets/frontend/js/imagesloaded.pkgd.min.js')); ?>"></script>
<!-- isotope min js --> 
<script src="<?php echo e(URL::asset('assets/frontend/js/isotope.min.js')); ?>"></script>
<!-- jquery.dd.min js -->
<script src="<?php echo e(URL::asset('assets/frontend/js/jquery.dd.min.js')); ?>"></script>
<!-- slick js -->
<script src="<?php echo e(URL::asset('assets/frontend/js/slick.min.js')); ?>"></script>
<!-- elevatezoom js -->
<script src="<?php echo e(URL::asset('assets/frontend/js/jquery.elevatezoom.js')); ?>"></script>
<!-- scripts js --> 
<script src="<?php echo e(URL::asset('assets/frontend/js/scripts.js')); ?>"></script>

</body>
</html>
<?php /**PATH E:\graduate\myproject\e-com-site\Admin\resources\views/frontend/layouts/layout.blade.php ENDPATH**/ ?>