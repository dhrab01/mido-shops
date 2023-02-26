@extends('admin.layouts.master')
@section('title') @lang('translation.add_edit_product') @endsection
@section('css')

@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Attributes @endslot
@slot('title')  @endslot
@endcomponent
<div class="row">
    <div class="col-6 ">
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
        <form  action="{{ url('admin/add_edit_attributes/'.$product['id']) }}" method="post" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات المنتج</h4>
                    <!-- <p class="card-title-desc">Fill all information below</p> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="product_name">اسم المنتج</label>
                                <input class="form-control" type="text" value="{{ $product['product_name'] }}" readonly>
                                
                            </div>
                            
                            <div class="mb-3">
                                <label for="product_code"> رمز المنتج</label>
                                <input class="form-control" type="text" value="{{ $product['product_code'] }}" readonly>
                                 
                            </div>
                            <div class="mb-3">
                                <label for="product_color">لون المنتج</label>
                                 <input class="form-control" type="text" value="{{ $product['product_color'] }}" readonly>
                                 
                            </div>
                            <div class="mb-3">
                                <label for="product_price">سعر المنتج</label>
                                 <input class="form-control" type="text" value="{{ $product['product_price'] }}" readonly>
                               
                            </div>
                        </div>

                        <div class="col-sm-4">
                            
                           @if(!empty($product['product_image']))
                                 <img class="d-block img-thumbnail img-fluid" style="height: 100%;" src="{{ URL::asset('images/front/products/small/'. $product['product_image']) }}" alt="product-image">
                            @else
                             <img src="{{ URL::asset('images/front/products/small/avatar-3.jpg') }}" alt="product-image" class="img-fluid  d-block img-thumbnail" style="height: 100%;">
                           @endif   
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
<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
<script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
@endsection