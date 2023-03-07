<?php

use App\Models\Section;

$sections = Section::sections();


// echo "<pre>";print_r($arr1);die;
?>

<!-- Top block -->
<div class="bg-info text-white small py-2">
  <div class="container d-flex justify-content-between px-3">
    <div class="text-white">
      <strong> دعم فني: </strong><a class="text-body" href="tel:+967777221953">(+967) 777-221-953</a>
    </div>
    <div class="text-white">
      <strong> بريد الكتروني: </strong><a class="text-body" href="mailto:mohammedaldhrab1@gmail.com">&nbsp; mohammedaldhrab1@gmail.com</a>
    </div>

    <div>

      <div class="dropdown d-inline-block">
        <a class="dropdown-toggle text-body font-weight-semibold" href="#" data-toggle="dropdown">AR</a>
        <div class="dropdown-menu dropdown-menu-right">
          <!-- <a class="dropdown-item" href="#">Arabic</a>
            <a class="dropdown-item" href="#">French</a>
            <a class="dropdown-item" href="#">German</a> -->
        </div>
      </div>
      <div class="dropdown d-inline-block">
        <a class="dropdown-toggle text-body font-weight-semibold ml-3" href="#" data-toggle="dropdown">USD</a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#">USD</a>
          <a class="dropdown-item" href="#">YR</a>
          <!-- <a class="dropdown-item" href="#">USD</a> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Top block -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white">
  <div class="container flex-wrap">

    <a href="#" class="navbar-brand col-lg-3 order-lg-1 w-auto text-large font-weight-bolder line-height-1 py-3 px-0 m-0">Mido Shops</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".header-9">
      <span class="navbar-toggler-icon"></span>
    </button>

    <form class="header-9 navbar-collapse collapse col-lg-6 order-lg-2 w-auto py-3 py-lg-0 px-0">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text ion ion-ios-search"></div>
        </div>
        <input type="text" class="form-control" placeholder="بحث...">
        <select class="custom-select pl-2">
          <option>الكل</option>
          @foreach($sections as $section)
          <option>{{ $section['name'] }}</option>
          @endforeach

        </select>
      </div>
    </form>

    <div class="header-9 navbar-collapse collapse col-lg-12 flex-wrap order-lg-4 px-0">
      <hr class="d-none d-lg-block w-100 my-2">
      <ul class="navbar-nav">
        <a class="nav-item nav-link pl-lg-0 active" href="#">الرئيسية</a>
        @foreach($sections as $section)
        @if(count($section['categories'])>0)
        <li class="nav-item mega-dropdown" @if($section['name']=="احذية") id="shop-men-dropdown" @endif>
          <a class="nav-item nav-link dropdown-toggle small text-expanded pr-lg-3 pl-lg-0" href="#" data-toggle="mega-dropdown" data-trigger="hover">{{ $section['name'] }}</a>
          <div class="dropdown-menu p-0 mt-2">
            @if($section['name']=="ملابس")
            <div class="row no-gutters row-bordered">
              @foreach($section['categories'] as $category)
              <div class="col-6 col-lg-3 p-4">
                <h6 class="small font-weight-bold text-expanded">{{$category['category_name']}}</h6>
                @foreach($category['sub_category'] as $subcategory)
                <a href="#" class="mega-link d-block text-body small mb-2">{{$subcategory['category_name']}}</a>
                @endforeach
              </div>
              @endforeach
              
               
            </div>
            <!-- end row -->
            <div class="row no-gutters row-bordered">
              <!-- Presentation block -->
               <div class="d-flex col-12  align-items-stretch p-0">
                  <div class="d-flex flex-column justify-content-center align-items-center w-100 ui-bg-cover text-center text-white py-5" style="background-image: url('images/front/uikit/presentation-jeans.jpg');">
                    <div class="text-big font-weight-bold mt-5 mb-2">
                      LIMITED TIME ONLY!
                    </div>
                    <div class="display-3 font-weight-bolder mb-2">
                      25% OFF
                    </div>
                    <div class="mb-5">
                      USE CODE: <span class="font-weight-bold">second</span>
                    </div>
                    <a href="#" class="btn btn-outline-white btn-lg d-block text-expanded">
                      SHOP NOW <i class="ion ion-ios-arrow-forward"></i>
                    </a>
                  </div>
                </div>
                <!-- / Presentation block -->
            </div>
            @elseif($section['name']=="احذية")
             <!-- Men categories -->
              <div class="row no-gutters row-bordered">
                 @foreach($section['categories'] as $category)
                <div class="col-6 col-lg-3 p-4">
                  <h6 class="small font-weight-bold text-expanded">{{$category['category_name']}}</h6>
                   @foreach($category['sub_category'] as $subcategory)
                  <a href="#" class="mega-link d-block text-body small mb-2">{{$subcategory['category_name']}}</a>
                  @endforeach
                </div>
                @endforeach
                </div>
                <!-- end row -->
                  <div class="row no-gutters row-bordered">
                    <!-- Special deals -->
                    <div class="col-12 p-4">
                      <h6 class="small font-weight-bold text-expanded">SPECIAL DEALS</h6>
                      <div class="w-100">
                        <div class="swiper-container" id="shop-men-special-deals">
                          <div class="swiper-wrapper">
                            <a href="#" class="swiper-slide d-block ui-bordered text-center text-body p-4">
                              <div class="shop-special-deal-label badge badge-success font-weight-bold">15% OFF</div>
                              <img src="{{ URL::asset('images/front/uikit/nike-1.jpg')}}" class="mb-2" alt="" style="max-width: 75%; max-height: 200px">
                              <div><strike class="text-light">$57.55</strike>&nbsp; <strong>$48.92</strong></div>
                            </a>
                            <a href="#" class="swiper-slide d-block ui-bordered text-center text-body p-4">
                              <div class="shop-special-deal-label badge badge-success font-weight-bold">10% OFF</div>
                              <img src="{{ URL::asset('images/front/uikit/sunglasses.jpg')}}" class="mb-2" alt="" style="max-width: 75%; max-height: 200px">
                              <div><strike class="text-light">$20.55</strike>&nbsp; <strong>$18.50</strong></div>
                            </a>
                            <a href="#" class="swiper-slide d-block ui-bordered text-center text-body p-4">
                              <div class="shop-special-deal-label badge badge-success font-weight-bold">15% OFF</div>
                              <img src="{{ URL::asset('images/front/uikit/adidas.jpg')}}" class="mb-2" alt="" style="max-width: 75%; max-height: 200px">
                              <div><strike class="text-light">$57.55</strike>&nbsp; <strong>$48.92</strong></div>
                            </a>
                            <a href="#" class="swiper-slide d-block ui-bordered text-center text-body p-4">
                              <div class="shop-special-deal-label badge badge-success font-weight-bold">20% OFF</div>
                              <img src="{{URL::asset('images/front/img/uikit/backpack.jpg')}}" class="mb-2" alt="" style="max-width: 75%; max-height: 200px">
                              <div><strike class="text-light">$160.00</strike>&nbsp; <strong>$128.00</strong></div>
                            </a>
                          </div>
                          <div class="swiper-pagination"></div>
                        </div>
                      </div>
                    </div>
                    <!-- / Special deals -->
                  </div>
          <!-- Men categories -->
          @else
           <div class="row no-gutters row-bordered">
                <!-- Popular categories -->
                <div class="col-sm-6 col-lg-3 p-4">
                  <h6 class="small font-weight-bold text-expanded">POPULAR CATEGORIES</h6>
                  @foreach($section['categories'] as $category)
                  <a href="#" class="media align-items-center ui-bordered text-body py-2 px-3 mb-2">
                    <img src="{{URL::asset('images/front/uikit/s7edge-1.jpg')}}" alt="" class="d-block ui-w-40">
                    <span class="media-body small font-weight-semibold ml-2">{{$category['category_name']}}</span>
                  </a>
                  @endforeach
                </div>
                <!-- / Popular categories -->
                @foreach($section['categories'] as $category)
                <div class="col-6 col-lg-3">
                      <h6 class="small font-weight-bold text-expanded">{{$category['category_name']}}</h6>
                      @foreach($category['sub_category'] as $subcategory)
                      <a href="#" class="mega-link d-block text-body small mb-2">{{$subcategory['category_name']}}</a>
                      @endforeach
               </div>
                    
                    @endforeach
             </div>
          @endif
          </div>
        </li>
        @endif
        @endforeach

        <a class="nav-item nav-link" href="#">البائعين</a>
        <a class="nav-item nav-link" href="#">المتاجر</a>
      </ul>
    </div>

    <div class="header-9 navbar-collapse collapse col-lg-3 justify-content-lg-end order-lg-3 w-auto px-0">
      <div class="navbar-nav align-items-lg-center order-lg-2 py-lg-1">
        <a class="nav-item nav-link dropdown-toggle hide-arrow text-nowrap ml-lg-2" href="#">
          <i class="ion ion-md-cart navbar-icon align-middle"></i>
          <span class="badge badge-info indicator">5</span>
          <span class="d-lg-none align-middle">&nbsp; Cart</span>
        </a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hide-arrow ml-lg-2" href="#" data-toggle="dropdown">
            <i class="ion ion-md-contact  d-block" style="font-size:20px;"></i>
            <span class="d-lg-none align-middle">&nbsp; الحساب</span>
          </a>
          <div class="dropdown-menu dropdown-menu-left">
            <a class="dropdown-item" href="#">تسجيل الدخول</a>
            <a class="dropdown-item" href="#">انشاء حساب جديد</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">تسجيل الدخول كبائع</a>
            <a class="dropdown-item" href="#">انشاء حساب بائع</a>
          </div>
        </li>
      </div>
    </div>

  </div>
</nav>
<!-- / Navbar -->