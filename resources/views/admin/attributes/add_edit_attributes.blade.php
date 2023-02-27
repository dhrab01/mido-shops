@extends('admin.layouts.master')
@section('title') @lang('translation.add_edit_product') @endsection
@section('css')
<link href="{{ URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet" type="text/css" />
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
        @if(Session::has('error_message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error: </strong> {{Session::get('error_message')}}
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
                    <div class="row mb-2">
                      <div class="col-sm-6">
                    <h4 class="card-title">بيانات المنتج</h4>
                    <!-- <p class="card-title-desc">Fill all information below</p> -->
                    </div>
                    <div class="col-sm-6">
                    <div class="text-sm-end">
                        <a href="javascript:void(0);" class="add_button btn btn-primary" title="Add field"><i class=" mdi mdi-plus-box  me-1"></i>اضافة  صفة</a>
                    </div>
                    </div>
                 </div>
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
                    <div class="row mt-4">
                        <div class="field_wrapper">
                               <div>
                                 <input type="text" name="size[]" placeholder="Size" class="me-2 mb-2" />
                                 
                                 <input type="text" name="sku[]" placeholder="SKU" class="me-2 mb-2" />
                                
                                 <input type="text" name="price[]" placeholder="Price" class="me-2 mb-2" />
                                 
                                 <input type="text" name="stock[]" placeholder="Stock" class="me-2 mb-2" />
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
<div class="row mt-12">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                 <h4 class="card-title">مواصفات المنتج</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="attribute" class="data-table table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Size</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product['attributes'] as $attribute)
                            <tr>
                                <td>
                                    {{$attribute['id']}}
                                </td>
                                <td>
                                    {{$attribute['size']}}
                                </td>
                                <td>
                                    {{$attribute['sku']}}
                                </td>
                                 <td>
                                    {{$attribute['price']}}
                                </td>
                                 <td>
                                    {{$attribute['stock']}}
                                </td>
                                <td>
                                    @if($attribute['status']==1)
                                    <input type="checkbox" class="updateStatus" id="module-{{$attribute['id']}}" module="attribute" module_id="{{$attribute['id']}}" status="Active" switch="success" checked />
                                    <label for="module-{{$attribute['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @else
                                    <input type="checkbox" class="updateStatus" id="module-{{$attribute['id']}}" module="attribute" module_id="{{$attribute['id']}}" status="Inactive" switch="success" />
                                    <label for="module-{{$attribute['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @endif

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu ">
                                            <li><button type="button" class="dropdown-item btn  btn-success btn-rounded edit-attribute"   value="{{$attribute['id']}}"><i class="edit-btn mdi mdi-pencil font-size-16 text-success me-1"></i> تعديل</button></li>
                                            <li><a title="القسم" href="javascript:void(0)" class="conformDelete dropdown-item btn  btn-success btn-rounded" module="attribute" moduleid="{{$attribute['id']}}"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
    </div>
</div>

<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/backend/js/custom.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
@endsection