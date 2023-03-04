<!DOCTYPE html>

<html lang="ar" dir="rtl" class="default-style">
<head>
  <title>Home - Shop - Appwork</title>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <!-- Use Ubuntu font instead of Roboto -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

  <!-- Icon fonts -->
  <link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/vendor/fonts/ionicons.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/vendor/fonts/linearicons.css')); ?>">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href=" <?php echo e(URL::asset('assets/frontend/vendor/css/rtl/bootstrap.css')); ?>" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/vendor/css/rtl/appwork.css')); ?>" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/vendor/css/rtl/theme-corporate.css')); ?>" class="theme-settings-theme-css">
  <link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/vendor/css/rtl/colors.css')); ?>" class="theme-settings-colors-css">
  <link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/vendor/css/rtl/uikit.css')); ?>">

  <script src="<?php echo e(URL::asset('assets/frontend/vendor/js/material-ripple.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/frontend/vendor/js/layout-helpers.js')); ?>"></script>

  <!-- Theme settings -->
  <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
  <script src="<?php echo e(URL::asset('assets/frontend/frontend/vendor/js/theme-settings.js')); ?>"></script>
  <script>
    window.themeSettings = new ThemeSettings({
      cssPath: 'assets/frontend/vendor/css/rtl/',
      themesPath: 'assets/frontend/vendor/css/rtl/'
    });
  </script>

  <!-- Core scripts -->
  <script src="<?php echo e(URL::asset('assets/frontend/vendor/js/pace.js')); ?>"></script>

  <!-- Page -->
  <link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/css/shop.css')); ?>">

  <!-- Libs -->
  <link rel="stylesheet" href="<?php echo e(URL::asset('assets/frontend/vendor/libs/swiper/swiper.css')); ?>">
</head>
<body>
  <!-- Pace.js loader -->
  <div class="page-loader"><div class="bg-primary"></div></div>

  <?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php echo $__env->yieldContent('content'); ?>

 <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Core scripts -->
  <script src="<?php echo e(URL::asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/frontend/vendor/libs/popper/popper.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/frontend/vendor/js/bootstrap.js')); ?>"></script>

  <!-- Libs -->
  <script src="<?php echo e(URL::asset('assets/frontend/vendor/js/mega-dropdown.js')); ?>"></script></body>
  <script src="<?php echo e(URL::asset('assets/frontend/vendor/libs/swiper/swiper.js')); ?>"></script>

  <!-- Page -->
  <script src="<?php echo e(URL::asset('assets/frontend/js/shop.js')); ?>"></script>
</html>
<?php /**PATH E:\graduate\myproject\e-com-site\Admin\resources\views/frontend/layouts/layout.blade.php ENDPATH**/ ?>