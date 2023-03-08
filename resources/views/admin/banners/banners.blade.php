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
@slot('title') العروض @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h4 class="card-title">ادارة العروض</h4>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <a href="{{ url('admin/add_edit_banner') }}" class="btn  btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> اضافة  جديد</a>
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
                    <table id="banner" class="data-table table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الصورة</th>
                                <th>العنوان</th>
                                <th>Alt</th>
                                <th>Link</th>
                                <th>الحالة</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                           
                            <tr>
                                <td>
                                    {{$banner['id']}}
                                </td>
                               
                                <td>
                                    @if(!empty($banner['image']))
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xxl me-3">
                                                <img src="{{ URL::asset('images/front/banners/'. $banner['image']) }}" alt="banner-image" class="img-fluid  d-block ">
                                        </div>
                                    </div>
                                    @else
                                        <div class="flex-shrink-0">
                                        <div class="avatar-xxl me-3">
                                                <img src="{{ URL::asset('images/front/categories/avatar-3.jpg') }}" alt="banner-image" class="img-fluid  d-block ">
                                        </div>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    {{$banner['title']}}
                                </td>
                                <td>
                                    {{$banner['alt']}}
                                </td>
                                <td>
                                    {{$banner['link']}}
                                </td>

                                <td>
                                    @if($banner['status']==1)
                                    <input type="checkbox" class="updateStatus" id="module-{{$banner['id']}}" module="banner" module_id="{{$banner['id']}}" status="Active" switch="success" checked />
                                    <label for="module-{{$banner['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @else
                                    <input type="checkbox" class="updateStatus" id="module-{{$banner['id']}}" module="banner" module_id="{{$banner['id']}}" status="Inactive" switch="success" />
                                    <label for="module-{{$banner['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @endif

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu ">
                                            <li><a href="{{ url('admin/add_edit_banner/'.$banner['id']) }}" class="dropdown-item btn  btn-success btn-rounded edit-btn" value="{{$banner['id']}}"><i class="edit-btn mdi mdi-pencil font-size-16 text-success me-1"></i> تعديل</a></li>
                                            <li><a title="العرض" href="javascript:void(0)" class="conformDelete dropdown-item btn  btn-success btn-rounded" module="banner" moduleid="{{$banner['id']}}"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
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
@section('script')zz
<script src="{{ URL::asset('assets/backend/js/custom.js') }}"></script>

<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/app.min.js') }}"></script>


@endsection