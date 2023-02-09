@extends('admin.layouts.master')
@section('title') @lang('translation.admins') @endsection
@section('css')
<link href="{{ URL::asset('assets/backend/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/backend/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/backend/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/backend/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/backend/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Admins @endslot
@slot('title') {{$title}} @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h4 class="card-title"> {{$title}}</h4>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn  btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> اضافة  جديد</button>
                        </div>
                    </div><!-- end col-->
                </div>
            </div>
            <div class="card-body">
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
                    <table class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                <th>النوع </th>
                                <th>رقم الهاتف</th>
                                <th>البريد الالكتروني</th>
                                <th>الصورة الشخصية</th>
                                <th>الحالة</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <td>
                                    {{$admin['id']}}
                                </td>
                                <td>
                                    {{$admin['name']}}
                                </td>
                                <td>
                                    {{$admin['type']}}
                                </td>

                                <td>
                                    {{$admin['mobile']}}
                                </td>
                                <td>
                                    {{$admin['email']}}
                                </td>
                                <td>
                                    <div class="flex-shrink-0">
                                        <div class="avatar-md me-3">
                                            <img src="{{ URL::asset('images/photos/'. $admin['image']) }}" alt="profile-image" class="img-fluid rounded-circle d-block img-thumbnail">
                                        </div>
                                    </div>
                                    
                                </td>
                                <td>
                                    @if($admin['status']==1)
                                    <input type="checkbox" class="updateAdminStatus" id="admin-{{$admin['id']}}" admin_id="{{$admin['id']}}" status="Active" switch="success" checked />
                                    <label for="admin-{{$admin['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @else
                                    <input type="checkbox" class="updateAdminStatus" id="admin-{{$admin['id']}}" admin_id="{{$admin['id']}}" status="Inactive" switch="success"  />
                                    <label for="admin-{{$admin['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @endif
                                    
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @if($admin['type']=="vendor")
                                            <li><a href="{{ url('admin/view-vendor-details/'.$admin['id']) }}" class="dropdown-item"><i class="mdi mdi-account-details font-size-16 text-success me-1"></i> عرض معلومات الحساب</a></li>
                                            <li><a href="#" class="dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
                                            @else
                                            <li><a href="#" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> تعديل</a></li>
                                            <li><a href="#" class="dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
                                            @endif
                                            
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
<script src="{{ URL::asset('assets/backend/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net-buttons/datatables.net-buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/backend/backend/js/app.min.js') }}"></script>
@endsection