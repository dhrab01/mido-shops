@extends('admin.layouts.master')
@section('title') @lang('translation.sections') @endsection
@section('css')
<link href="{{ URL::asset('assets/backend/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/backend/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/backend/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
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
                        <h4 class="card-title">ادارة الاصناف</h4>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <a href="{{ url('admin/add_edit_category') }}" class="btn  btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> اضافة صنف جديد</a>
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
                    <table id="category" class="data-table table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الصنف</th>
                                <th>صورة الصنف</th>
                                <th>الصنف الاب</th>
                                <th>القسم</th>
                                <th>URL</th>
                                <th>الحالة</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            @if(isset($category['parent_category']['category_name'])&&!empty($category['parent_category']['category_name']))
                            @php $parent_category = $category['parent_category']['category_name']; @endphp
                            @else

                            @php $parent_category = "Root"; @endphp
                            @endif
                            <tr>
                                <td>
                                    {{$category['id']}}
                                </td>
                                <td>
                                    {{$category['category_name']}}
                                </td>
                                <td>
                                    @if(!empty($category['catigory_1st_image']))
                                    <div class="flex-shrink-0">
                                        <div class="avatar-md me-3">
                                            <a href="javascript:void(0)" class="waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                <img src="{{ URL::asset('images/front/categories/'. $category['catigory_1st_image']) }}" alt="category-image" class="img-fluid  d-block img-thumbnail">
                                            </a>

                                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{$category['category_name']}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ url('images/front/categories/'.$category['catigory_1st_image']) }}" class="img-fluid" alt="Category image">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="javascript:void(0)" class="conformDelete btn btn-danger waves-effect waves-light" module="category-image" moduleid="{{$category['id']}}">حذف الصورة</a>
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">الغاء</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                        </div>
                                    </div>

                                    @endif
                                </td>
                                <td>
                                    {{$parent_category}}
                                </td>
                                <td>
                                    {{$category['section']['name']}}
                                </td>
                                <td>
                                    {{$category['url']}}
                                </td>

                                <td>
                                    @if($category['status']==1)
                                    <input type="checkbox" class="updateStatus" id="module-{{$category['id']}}" module="category" module_id="{{$category['id']}}" status="Active" switch="success" checked />
                                    <label for="module-{{$category['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @else
                                    <input type="checkbox" class="updateStatus" id="module-{{$category['id']}}" module="category" module_id="{{$category['id']}}" status="Inactive" switch="success" />
                                    <label for="module-{{$category['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                                    @endif

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ url('admin/add_edit_category/'.$category['id']) }}" class="dropdown-item btn  btn-success btn-rounded edit-btn" value="{{$category['id']}}"><i class="edit-btn mdi mdi-pencil font-size-16 text-success me-1"></i> تعديل</a></li>
                                            <li><a title="الصنف" href="javascript:void(0)" class="conformDelete dropdown-item btn  btn-success btn-rounded" module="category" moduleid="{{$category['id']}}"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
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
<script src="{{ URL::asset('assets/backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/app.min.js') }}"></script>


@endsection