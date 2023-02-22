@extends('admin.layouts.master')
@section('title') @lang('translation.add_edit_product') @endsection
@section('css')
<link href="{{ URL::asset('assets/backend/libs/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Products @endslot
@slot('title') {{$title}} @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            <strong>Success: </strong> {{Session::get('success_message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @endforeach
            </ul>

        </div>
        @endif
        <form @if(empty($products['id'])) action="{{ url('admin/add_edit_product') }}" @else action="{{ url('admin/add_edit_product/'.$products['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
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
                                    @foreach($categories as $section)
                                    <optgroup label="{{ $section['name'] }}"></optgroup>
                                    @foreach($section['categories'] as $category)
                                    <option value="{{ $category['id'] }}">&nbsp;&nbsp;&nbsp;--&nbsp;{{ $category['category_name'] }}</option>
                                    @foreach($category['sub_category'] as $subcategory)
                                    <option value="{{ $subcategory['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{ $subcategory['category_name'] }}</option>
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_name">اسم المنتج</label>
                                <input id="product_name" name="product_name" type="text" class="form-control" placeholder="product Name"
                                @if(!empty($products['product_name'])) value="{{ $products['product_name'] }}" @else value="{{ old('product_name') }}" @endif>
                            </div>
                            
                            <div class="mb-3">
                                <label for="product_code"> رمز المنتج</label>
                                <input id="product_code" name="product_code" type="text" class="form-control" placeholder="product Code"
                                @if(!empty($products['product_code'])) value="{{ $products['product_code'] }}" @else value="{{ old('product_code') }}" @endif>
                            </div>
                            <div class="mb-3">
                                <label for="product_color">لون المنتج</label>
                                <input id="product_color" name="product_color" type="text" class="form-control" placeholder="product Color"
                                @if(!empty($products['product_color'])) value="{{ $products['product_color'] }}" @else value="{{ old('product_color') }}" @endif>
                            </div>
                            <div class="mb-3">
                                <label for="product_price">سعر المنتج</label>
                                <input id="product_price" name="product_price" type="text" class="form-control" placeholder="product Price"
                                @if(!empty($products['product_price'])) value="{{ $products['product_price'] }}" @else value="{{ old('product_price') }}" @endif>
                            </div>
                             <div class="mb-3">
                                <label for="product_unit">عدد الوحدات</label>
                                <input id="product_unit" name="product_unit" type="text" class="form-control" placeholder="product Units"
                                @if(!empty($products['product_unit'])) value="{{ $products['product_unit'] }}" @else value="{{ old('product_unit') }}" @endif>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="brand_id" class="control-label">الماركة</label>
                                <select name="brand_id" id="brand_id" class="form-control select2">
                                    <option>Select</option>
                                   @foreach($brands as $brand)
                                   <option value="{{$brand['id']}}">{{$brand['brand_name']}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_discount">نسبة التخفيض (%)</label>
                                <input id="product_discount" name="product_discount" type="text" class="form-control" placeholder="Dicount"
                                @if(!empty($products['product_discount'])) value="{{ $products['product_discount'] }}" @else value="{{ old('product_discount') }}" @endif>
                            </div>
                            <div class="mb-3">
                                <label for="product_weight">الوزن</label>
                                <input id="product_weight" name="product_weight" type="text" class="form-control" placeholder="product Weight"
                                @if(!empty($products['product_weight'])) value="{{ $products['product_weight'] }}" @else value="{{ old('product_weight') }}" @endif>
                            </div>
                            <div class="mb-3">
                                <label for="decription">الوصف</label>
                                <textarea class="form-control" id="decription" name="decription" rows="10" placeholder="Product Description">
                                @if(!empty($products['description'])) {{ $products['description'] }} @endif
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

                    <div class="form-group mb-2">
                        <input class="form-control" id="product-image" name="product-image" type="file"  />
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">الفيديو الخاص بالمنتج(size:less than 2M)</h4>
                </div>
                <div class="card-body">

                    <div class="form-group mb-2">
                        <input class="form-control" id="product-video" name="product-video" type="file"  />
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
                                <input id="metatitle" name="metatitle" type="text" class="form-control" placeholder="Metatitle"
                                @if(!empty($products['meta_title'])) value="{{ $products['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">الكلمات المفتاحية</label>
                                <input id="metakeywords" name="metakeywords" type="text" class="form-control" placeholder="Meta Keywords"
                                @if(!empty($products['meta_keywords'])) value="{{ $products['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">الوصف</label>
                                <textarea class="form-control" id="metadescription" name="metadescription" rows="5" placeholder="Meta Description">
                                @if(!empty($products['meta_description'])){{ $products['meta_description'] }} @endif
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
@endsection
@section('script')
<script src="{{ URL::asset('assets/backend/js/custom.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
@endsection