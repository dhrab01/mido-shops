@extends('admin.layouts.master')
@section('title') @lang('translation.Product_Images') @endsection
@section('css')
<link href="{{ URL::asset('assets/backend/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') المنتجات @endslot
@slot('title') بيانات المنتج @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">صور المنتج</h4>
            </div>
            <div class="card-body">

                <form action=" {{url('admin/add-images/'.$product['id'])}}" method="post" class="dropzone" name="file" enctype="multipart/form-data">@csrf


                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>

                        <h4>يمكنك سحب الصور وافلاتها هنا , او اضغط لاختيار صورة.</h4>
                    </div>

                </form>
            </div>

        </div> <!-- end card-->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product-detai-imgs">
                            <div class="row">

                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                            <div>
                                                @if(!empty($product['product_image']))
                                                <img src="{{ URL::asset('images/front/products/large/'.$product['product_image']) }}" alt="" class="img-fluid mx-auto d-block rounded">
                                                @else
                                                <img src="{{ URL::asset('images/front/products/small/avatar-3.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mt-4 mt-xl-3 ms-6">
                                <a href="javascript: void(0);" class="text-primary">{{$product['product_code']}}</a>
                                <h4 class="mt-1 mb-3">{{$product['product_name']}}</h4>


                                <p class="text-muted mb-4">( 152 Customers Review )</p>

                                <h6 class="text-success text-uppercase">20 % Off</h6>
                                <h5 class="mb-4">السعر : <span class="text-muted me-2"><del>{{($product['product_price']-20)/100}} USD</del></span> <b>${{$product['product_price']}} USD</b></h5>
                                <p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar pronunciation and more common words If several languages coalesce</p>
                                <!-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Wireless</p>
                                        <p class="text-muted"><i class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i> Wireless Range : 10m</p>
                                        <p class="text-muted"><i class="bx bx-battery font-size-16 align-middle text-primary me-1"></i> Battery life : 6hrs</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted"><i class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i> Bass</p>
                                        <p class="text-muted"><i class="bx bx-cog font-size-16 align-middle text-primary me-1"></i> Warranty : 1 Year</p>
                                    </div>
                                </div>
                            </div> -->

                                <div class="product-color">
                                    <h5 class="font-size-15">اللون :</h5>

                                    <a href="javascript: void(0);" class="active">
                                        <div class="product-color-item border rounded">
                                            <img src="{{ URL::asset('images/front/products/small/'.$product['product_image']) }}" alt="" class="avatar-lg">
                                        </div>
                                        <p>{{$product['product_color']}}</p>
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mt-12">
                        <div class="col-10">
                            <div class="card">
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

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class=" table align-middle table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($product['images'] as $image)

                                                <tr>
                                                    <td>
                                                        {{$image['id']}}
                                                    </td>
                                                    <td>
                                                        <div class="avatar-lg">
                                                            <div>
                                                                <img src="{{ URL::asset('images/front/products/images/'.$image['image']) }}" alt="" class=" img-thumbnail d-block">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($image['status']==1)
                                                        <input type="checkbox" class="updateStatus" id="module-{{$image['id']}}" module="pro_image" module_id="{{$image['id']}}" status="Active" switch="success" checked />
                                                        <label for="module-{{$image['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                                        @else
                                                        <input type="checkbox" class="updateStatus" id="module-{{$image['id']}}" module="pro_image" module_id="{{$image['id']}}" status="Inactive" switch="success" />
                                                        <label for="module-{{$image['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a title="حذف" href="javascript:void(0)" class="conformDelete  btn btn-soft-danger waves-effect waves-light" module="pro_image" moduleid="{{$image['id']}}"><i class="bx bx-trash font-size-16 align-middle"></i></a></li>
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
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->

    @endsection
    @section('script')
    <script src="{{ URL::asset('assets/backend/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/custom.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>

    @endsection