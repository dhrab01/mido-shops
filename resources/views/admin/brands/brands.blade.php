@extends('admin.layouts.master')
@section('title') @lang('translation.sections') @endsection
@section('css')
<link href="{{ URL::asset('assets/backend/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/backend/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/backend/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">

<link href="{{ URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Sections @endslot
@slot('title') الكاتالوج @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h4 class="card-title">ادارة الماركات</h4>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn  btn-primary btn-rounded waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target=".add-brand"><i class="mdi mdi-plus me-1"></i> اضافة  جديد</button>
                        </div>
                    </div><!-- end col-->
                </div>
            </div>
            <div class="card-body">
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
                <div class="row mb-2">
                    <!-- <div class="col-sm-4">
                        <div class="search-box me-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div> -->

                </div>

                <div class="table-responsive">
                    <table id="section" class="data-table table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                <th>الصورة</th>
                                <th>الحالة</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <td>
                                    {{$brand['id']}}
                                </td>
                                <td>
                                    {{$brand['brand_name']}}
                                </td>
                                <td>
                                @if(!empty($brand['brand_image']))
                                    <div class="flex-shrink-0">
                                        <div class="avatar-md me-3">
                                                <img src="{{ URL::asset('images/front/brands/'. $brand['brand_image']) }}" alt="brand-image" class="img-fluid  d-block img-thumbnail">

                                        </div>
                                    </div>
                                    @else
                                         <div class="flex-shrink-0">
                                        <div class="avatar-md me-3">
                                                <img src="{{ URL::asset('images/front/brands/avatar-3.jpg') }}" alt="brand-image" class="img-fluid  d-block img-thumbnail">

                                        </div>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if($brand['status']==1)
                                    <input type="checkbox" class="updateStatus" id="module-{{$brand['id']}}" module="brand" module_id="{{$brand['id']}}" status="Active" switch="primary" checked />
                                    <label for="module-{{$brand['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @else
                                    <input type="checkbox" class="updateStatus" id="module-{{$brand['id']}}" module="brand" module_id="{{$brand['id']}}" status="Inactive" switch="primary" />
                                    <label for="module-{{$brand['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @endif

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu ">
                                            <li><button type="button" class="dropdown-item btn  btn-primary btn-rounded edit-brand"   value="{{$brand['id']}}"><i class="edit-btn mdi mdi-pencil font-size-16 text-primary me-1"></i> تعديل</button></li>
                                            <li><a title="القسم" href="javascript:void(0)" class="conformDelete dropdown-item btn  btn-primary btn-rounded" module="brand" moduleid="{{$brand['id']}}"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
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
<div class="modal fade add-brand" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">اضافة  جديد </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ url('admin/add-brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="brand-name" class="form-label">الاسم </label>
                        <input type="text" class="form-control" name="brand-name" placeholder="ادخل الاسم " autofocus>

                    </div>
                    <div class="form-group mb-2">
                    <label for="brand_image" class="form-label">الصورة </label>
                        <input class="form-control" id="brand_image" name="brand_image" type="file"  />
                    </div>



                    <div class="mt-3 d-grid">
                        <button class="btn btn-outline-primary waves-effect waves-light UpdateProfile" type="submit">اضافة</button>

                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--update section modal -->
<div class="modal fade update-brand" id="editBrand" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">تعديل ماركة  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ url('admin/update-brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="brand_id" name="brand_id" value="">
                    <div class="mb-3">
                    <label for="brand-name" class="form-label">الاسم </label>
                    <input type="text" class="form-control" id="brand_name" name="brand-name" placeholder="ادخل الاسم " autofocus>
                    </div>
                    <div class="form-group mb-2">
                    <label for="brand_image" class="form-label">الصورة </label>
                    <input class="form-control" id="brand_image" name="brand_image" type="file"  />
                    </div>



                    <div class="mt-3 d-grid">
                        <button class="btn btn-outline-primary waves-effect waves-light UpdateProfile" type="submit">تعديل</button>

                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end row -->
@endsection
@section('script')zz
<script src="{{ URL::asset('assets/backend/js/custom.js') }}"></script>

<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/app.min.js') }}"></script>


@endsection