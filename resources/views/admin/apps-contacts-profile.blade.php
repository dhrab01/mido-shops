@extends('admin.layouts.master')
@section('title') @lang('translation.Profile') @endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div style="background-image:url('{{ asset('/images/photos/'.Auth::guard('admin')->user()->banner)}}');" class="profile-user">
        @if(!empty(Auth::guard('admin')->user()->banner))
        <a href="javascript:void(0)" title="حذف" class="conformDelete btn btn-soft-danger waves-effect waves-light" style=" position: absolute; right: 0px; top: 0px; z-index: 1;" module="admin-banner" moduleid="{{Auth::guard('admin')->user()->id}}"><i class="bx bx-trash  align-middle"></i></a>
        @endif
    </div>
    </div>
</div>

<div class="row">
    <div class="profile-content">
        <div class="row align-items-end">
            <div class="col-sm">
                <div class="d-flex align-items-end mt-3 mt-sm-0">
                    @if(!empty(Auth::guard('admin')->user()->image))
                    <div class="flex-shrink-0">
                        <div class="avatar-xxl me-3">
                            <img src="{{ URL::asset('images/photos/'. Auth::guard('admin')->user()->image) }}" alt="profile-image" class="img-fluid rounded-circle d-block img-thumbnail">
                        </div>
                    </div>
                    @else
                    <div class="flex-shrink-0">
                        <div class="avatar-xxl me-3">
                            <img src="{{ URL::asset('images/photos/avatar-3.jpg') }}" alt="profile-image" class="img-fluid rounded-circle d-block img-thumbnail">
                        </div>
                    </div>
                    @endif

                    <div class="flex-grow-1">
                        <div>
                            <h5 class="font-size-16 mb-1">{{ Auth::guard('admin')->user()->name }}</h5>
                            <p class="text-muted font-size-13 mb-2 pb-2">{{ Auth::guard('admin')->user()->type }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="d-flex align-items-start justify-content-end gap-2 mb-2">
                    <div>
                        <a class="btn btn-primary" href="{{ url('admin/dashboard') }}"><i class="me-1"></i> لوحة التحكم</a>
                        @if($slug=="profile")
                        <a class="btn btn-secondary" href="{{ url('admin/update-admin-profile/password') }}"><i class="me-1"></i> تغيير كلمة المرور</a>
                        @else
                        <a class="btn btn-secondary" href="{{ url('admin/update-admin-profile/profile') }}"><i class="me-1"></i> الصفحة الشخصية</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@if($slug=="profile")
<div class="row">
    <div class="col-lg-12">
        <div class="card bg-transparent shadow-none">
            <div class="card-body">

            </div>
        </div>
    </div>
</div>

<div class="row">

    <!-- end col -->

    <div class="col-12  stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">البيانات الشخصية</Details>
                </h4>
                <!-- @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error: </strong> {{Session::get('error_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif -->
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                <form class="forms-sample" method="post" action="{{ url('admin/update-admin-profile/profile') }}" enctype="multipart/form-data">@csrf
                    <div class="form-group mb-3">
                        <label for="admin_name">الاسم</label>
                        <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="ادخل الاسم" value="{{ Auth::guard('admin')->user()->name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="admin_email">البريد الالكتروني</label>
                        <input type="email" class="form-control" name="admin_email" id="admin_email" placeholder="البريد الالكتروني" value="{{ Auth::guard('admin')->user()->email }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone_numper">رقم الهاتف</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="رقم الهاتف" value="{{ Auth::guard('admin')->user()->mobile }}" maxlength="9" minlength="9">
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-10">
                                <label for="admin_image">الصورة الشخصية</label>
                                <input type="file" name="admin_image" id="admin_image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="رفع صورة">
                                    <input type="hidden" name="current_image" value="{{ Auth::guard('admin')->user()->image }}">
                                </div>
                            </div>
                            <div class="col-2">
                                @if(!empty(Auth::guard('admin')->user()->image))
                                <div class="card" style="height:150px; width:150px;">
                                    <img class="card-img-top img-fluid d-block img-thumbnail" src="{{ URL::asset('images/photos/'. Auth::guard('admin')->user()->image) }}" alt="product-image">
                                    <a href="javascript:void(0)" title="حذف" class="conformDelete btn btn-soft-danger waves-effect waves-light" style=" position: absolute; right: 0px; top: 0px; z-index: 1;" module="admin-image" moduleid="{{Auth::guard('admin')->user()->id}}"><i class="bx bx-trash  align-middle"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="admin_banner">صورة العرض</label>
                        <input type="file" name="admin_banner" id="admin_banner" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="رفع صورة">
                            <input type="hidden" name="current_banner" value="{{ Auth::guard('admin')->user()->banner }}">
                        </div>
                    </div>

                    <div class="btn-group mb-3">
                        <button type="submit" class="btn btn-outline-primary text-expanded mr-5">حفظ</button>
                        <button class="btn btn-outline-danger">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- end col -->
</div>
<!-- end row -->
@elseif($slug=="password")
<div class="row">
    <div class="col-lg-12">
        <div class="card bg-transparent shadow-none">
            <div class="card-body">

            </div>
        </div>
    </div>
</div>

<div class="row">

    <!-- end col -->

    <div class="col-12  stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تحديث كلمة المرور</h4>
                @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error: </strong> {{Session::get('error_message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong> {{Session::get('success_message')}}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <p class="card-description">
                    {{ $adminDetails['email'] }}
                </p>
                <form class="forms-sample" action="{{ url('admin/update-admin-profile/password') }}" method="post" name="updateAdminPasswordForm" id="updateAdminPasswordForm">@csrf

                    <div class="form-group mt-2">
                        <label for="current_password">كلمة المرور الحالية</label>
                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password" required="">
                        <span id="check_password"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="new_password">كلمة المرور الجديدة</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required="">
                    </div>
                    <div class="form-group mt-2">
                        <label for="conform_password">اعد ادخال كلمة المرور للتاكيد</label>
                        <input type="password" class="form-control" name="conform_password" id="conform_password" placeholder="Conform Password" required="">
                    </div>
                    <div class="btn-group mt-2 ">
                        <button type="submit" class="btn btn-primary mr-2">حفظ</button>
                        <button class="btn btn-light">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end col -->
</div>
<!-- end row -->

@endif



@endsection
@section('script')
<script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/custom.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/profile.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>

<!-- <script>
    $('#update-password').on('submit', function(event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        let formData = new FormData(this);
        $('#currentPasswordError').text('');
        $('#passwordError').text('');
        $.ajax({
            url: "{{ url('admin/update-admin-password') }}" + "/" + Id,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#currentPasswordError').text('');
                $('#passwordError').text('');
                if (response.isSuccess == false) {
                    alert(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function(response) {
                $('#currentPasswordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                
            }
        });
    });
</script> -->
@endsection