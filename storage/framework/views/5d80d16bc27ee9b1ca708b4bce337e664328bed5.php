<?php

use App\Models\Section;

$sections = Section::sections();


// echo "<pre>";print_r($arr1);die;
?>

<!-- START HEADER -->
<header class="header_wrap">
  <div class="top-header light_skin bg_dark d-none d-md-block">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-8">
          <div class="header_topbar_info">
            <div class="header_offer">
              <span>شحن مجاني لما لا يزيد عن 250$</span>
            </div>
            <div class="download_wrap">
              <span class="me-3">حمل التطبيق</span>
              <ul class="icon_list text-center text-lg-start">
                <li><a href="#"><i class="fab fa-apple"></i></a></li>
                <li><a href="#"><i class="fab fa-android"></i></a></li>
                <li><a href="#"><i class="fab fa-windows"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="d-flex align-items-center justify-content-center justify-content-md-end">
            <div class="lng_dropdown">
              <select name="countries" class="custome_select">
                <option value='en' data-image="<?php echo e(URL::asset('assets/frontend/images/ye.png')); ?>" data-title="Arabic">Arabic</option>
                <option value='fn' data-image="<?php echo e(URL::asset('assets/frontend/images/fn.png')); ?>" data-title="English">English</option>
                <option value='us' data-image="<?php echo e(URL::asset('assets/frontend/images/us.png')); ?>" data-title="United States">United States</option>
              </select>
            </div>
            <div class="ms-3">
              <select name="countries" class="custome_select">
                <option value='USD' data-title="USD">USD</option>
                <option value='EUR' data-title="EUR">EUR</option>
                <option value='RY' data-title="RY">RY</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="middle-header dark_skin">
    <div class="container">
      <div class="nav_block">
        <a class="navbar-brand" href="index.html">
          <img class="logo_dark1" src="<?php echo e(URL::asset('assets/backend/images/logos/logo-dark.png')); ?>" alt="logo" />
          <!-- <img class="logo_dark" src="<?php echo e(URL::asset('assets/frontend/images/logo_dark.png')); ?>" alt="logo" /> -->
        </a>
        <div class="product_search_form rounded_input">
          <form>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="custom_select">
                  <select class="first_null">
                    <option value="">الكل</option>
                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($section['name']); ?>"><?php echo e($section['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                </div>
              </div>
              <input class="form-control" placeholder="بحث عن منتج..." required="" type="text">
              <button type="submit" class="search_btn2"><i class="fa fa-search"></i></button>
            </div>
          </form>
        </div>
        <ul class="navbar-nav attr-nav align-items-center">


          <li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li>
          <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-bs-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count">2</span><span class="amount"><span class="currency_symbol">$</span>159.00</span></a>
            <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
              <ul class="cart_list">
                <li>
                  <a href="#" class="item_remove"><i class="ion-close"></i></a>
                  <a href="#"><img src="assets/images/cart_thamb1.jpg" alt="cart_thumb1">Variable product 001</a>
                  <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                </li>
                <li>
                  <a href="#" class="item_remove"><i class="ion-close"></i></a>
                  <a href="#"><img src="assets/images/cart_thamb2.jpg" alt="cart_thumb2">Ornare sed consequat</a>
                  <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                </li>
              </ul>
              <div class="cart_footer">
                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                <p class="cart_buttons"><a href="#" class="btn btn-fill-line view-cart">View Cart</a><a href="#" class="btn btn-fill-out checkout">Checkout</a></p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bottom_header dark_skin main_menu_uppercase border-top ">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-6 col-3">
          <div class="categories_wrap">
            <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
              <i class="linearicons-menu"></i><span>جميع الاصناف </span>
            </button>
            <div id="navCatContent" class=" navbar collapse">
              <ul>
                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($section['categories'])>0): ?>
                
                <li class="dropdown dropdown-mega-menu">
                  <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-tv"></i> <span><?php echo e($section['name']); ?></span></a>
                  <div class="dropdown-menu">
                    <ul class="mega-menu d-lg-flex">

                      <li class="mega-menu-col col-lg-7">
                        <ul class="d-lg-flex">
                          <?php $__currentLoopData = $section['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="mega-menu-col col-lg-6">
                            <ul>
                              <li class="dropdown-header"><?php echo e($category['category_name']); ?></li>
                              <?php $__currentLoopData = $category['sub_category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo e($subcategory['category_name']); ?></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                          </li>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                      </li>
                      <li class="mega-menu-col col-lg-5">
                        <div class="header-banner2">
                          <img src="<?php echo e(URL::asset('assets/frontend/images/menu_banner7.jpg')); ?>" alt="menu_banner">
                          <div class="banne_info">
                            <h6>20% Off</h6>
                            <h4>Computers</h4>
                            <a href="#">Shop now</a>
                          </div>
                        </div>
                        <div class="header-banner2">
                          <img src="<?php echo e(URL::asset('assets/frontend/images/menu_banner8.jpg')); ?>" alt="menu_banner">
                          <div class="banne_info">
                            <h6>15% Off</h6>
                            <h4>Top Laptops</h4>
                            <a href="#">Shop now</a>
                          </div>
                        </div>
                      </li>

                    </ul>
                  </div>
                </li>
                
                <?php if(count($section)>2): ?>
                <li>
                  <ul class="more_slide_open">
                    <li class="dropdown dropdown-mega-menu">
                      <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-tv"></i> <span><?php echo e($section['name']); ?></span></a>
                      <div class="dropdown-menu">
                        <ul class="mega-menu d-lg-flex">

                          <li class="mega-menu-col col-lg-7">
                            <ul class="d-lg-flex">
                              <?php $__currentLoopData = $section['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li class="mega-menu-col col-lg-6">
                                <ul>
                                  <li class="dropdown-header"><?php echo e($category['category_name']); ?></li>
                                  <?php $__currentLoopData = $category['sub_category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo e($subcategory['category_name']); ?></a></li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                              </li>

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          </li>
                          <li class="mega-menu-col col-lg-5">
                            <div class="header-banner2">
                              <img src="<?php echo e(URL::asset('assets/frontend/images/menu_banner7.jpg')); ?>" alt="menu_banner">
                              <div class="banne_info">
                                <h6>20% Off</h6>
                                <h4>Computers</h4>
                                <a href="#">Shop now</a>
                              </div>
                            </div>
                            <div class="header-banner2">
                              <img src="<?php echo e(URL::asset('assets/frontend/images/menu_banner8.jpg')); ?>" alt="menu_banner">
                              <div class="banne_info">
                                <h6>15% Off</h6>
                                <h4>Top Laptops</h4>
                                <a href="#">Shop now</a>
                              </div>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <div class="more_categories">عرض المزيد</div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-6 col-9">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSidetoggle" aria-expanded="false">
              <span class="ion-android-menu"></span>
            </button>
            <div class="pr_search_icon">
              <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
            </div>
            <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
              <ul class="navbar-nav">
                <li><a class="dropdown-item nav-link nav_item" href="index.html">الرئيسية</a></li>

                <li class="dropdown">
                  <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">الصفحات</a>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a class="dropdown-item nav-link nav_item" href="about.html">من نحن</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="contact.html">تواصل معنا</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="faq.html">Faq</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="404.html">السياسات والشروط</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="login.html">Login</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="signup.html">Register</a></li>

                    </ul>
                  </div>
                </li>
                <li class="dropdown dropdown-mega-menu">
                  <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">المنتجات</a>
                  <div class="dropdown-menu">
                    <ul class="mega-menu d-lg-flex">
                      <?php for($i=1;$i<4;$i++): ?> <li class="mega-menu-col col-lg-3">
                        <ul>
                          <li class="dropdown-header">Woman's</li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">Vestibulum sed</a></li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Donec porttitor</a></li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Donec vitae facilisis</a></li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">Curabitur tempus</a></li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Vivamus in tortor</a></li>
                        </ul>
                </li>
                <?php endfor; ?>

              </ul>
              <div class="d-lg-flex menu_banners row g-3 px-3">
                <?php for($j=1;$j<3;$j++): ?> <div class="col-lg-6">
                  <div class="header-banner">
                    <div class="sale-banner">
                      <a class="hover_effect1" href="#">
                        <img src="<?php echo e(URL::asset('assets/frontend/images/shop_banner_img7.jpg')); ?>" alt="shop_banner_img7">
                      </a>
                    </div>
                  </div>
              </div>
              <?php endfor; ?>
            </div>
        </div>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">البائعين</a>
          <div class="dropdown-menu">
            <ul>
              <li><a class="dropdown-item nav-link nav_item" href="about.html">عرض البائعين</a></li>
              <li><a class="dropdown-item nav-link nav_item" href="contact.html">الاشتراك كبائع</a></li>


            </ul>
          </div>
        </li>
        <li class="dropdown dropdown-mega-menu">
          <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">المتاجر</a>
          <div class="dropdown-menu">
            <ul class="mega-menu d-lg-flex">
              <li class="mega-menu-col col-lg-9">
                <ul class="d-lg-flex">
                  <li class="mega-menu-col col-lg-4">
                    <ul>
                      <li class="dropdown-header">Shop Page Layout</li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">shop List view</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">shop List Left Sidebar</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-list-right-sidebar.html">shop List Right Sidebar</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Left Sidebar</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Right Sidebar</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Shop Load More</a></li>
                    </ul>
                  </li>
                  <li class="mega-menu-col col-lg-4">
                    <ul>
                      <li class="dropdown-header">Other Pages</li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-cart.html">Cart</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="checkout.html">Checkout</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="my-account.html">My Account</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Wishlist</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="compare.html">compare</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="order-completed.html">Order Completed</a></li>
                    </ul>
                  </li>
                  <li class="mega-menu-col col-lg-4">
                    <ul>
                      <li class="dropdown-header">Product Pages</li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Default</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Left Sidebar</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Right Sidebar</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Thumbnails Left</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="mega-menu-col col-lg-3">
                <div class="header_banner">
                  <div class="header_banner_content">
                    <div class="shop_banner">
                      <div class="banner_img overlay_bg_40">
                        <img src="<?php echo e(URL::asset('assets/frontend/images/shop_banner3.jpg')); ?>" alt="shop_banner" />
                      </div>
                      <div class="shop_bn_content">
                        <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                        <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                        <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li><a class="nav-link nav_item" href="contact.html"> تواصل معنا</a></li>
        </ul>
      </div>
      <div class="contact_phone contact_support">
        <ul class="navbar-nav attr-nav ">
          <li class="dropdown">
            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown"><i class="linearicons-user"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
              <ul class="align-items-center">
                <li><a class="dropdown-item nav-link nav_item" href="login.html">تسجيل الدخول </a></li>
                <li><a class="dropdown-item nav-link nav_item" href="contact.html">انشاء حساب جديد</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      </nav>
    </div>
  </div>
  </div>
  </div>
</header>
<!-- END HEADER --><?php /**PATH D:\myproject1\mido-shops\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>