@extends('admin.layouts.master')
@section('title') @lang('translation.Profile') @endsection
@section('content')
<!-- <div class="row">
    <div class="col-xl-12">
        <div class="profile-user"></div>
    </div>
</div> -->

<div class="row">
    <div class="profile-content mt-3">
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
                        <a class="btn btn-primary" href="{{ url('admin/vendor-dashboard') }}"><i class="me-1"></i> لوحة التحكم</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card bg-transparent shadow-none">
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
@if($slug=="personal")
<div class="row">
    <div class="col-12  stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تحديث البيانات الشخصية</Details>
                </h4>

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
                <form class="forms-sample" method="post" action="{{ url('admin/update-vendor-details/personal') }}" enctype="multipart/form-data">@csrf
                    <div class="row">

                        <div class="form-group mb-3">
                            <label for="vendor_name">الاسم</label>
                            <input type="text" class="form-control" id="vendor_name" name="vendor_name" placeholder="ادخل الاسم" value="{{ Auth::guard('admin')->user()->name }}">
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="vendor_email">البريد الالكتروني</label>
                                <input type="email" class="form-control" name="vendor_email" id="vendor_email" placeholder="البريد الالكتروني" value="{{ Auth::guard('admin')->user()->email }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="phone_numper">رقم الهاتف</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="رقم الهاتف" value="{{ Auth::guard('admin')->user()->mobile }}" maxlength="9" minlength="9">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="vendor_address">العنوان</label>
                                <input type="text" class="form-control" id="vendor_address" name="vendor_address" placeholder="ادخل العنوان" value="{{ $vedorDetails['address'] }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="vendor_city">المحافضة</label>
                                <input type="text" class="form-control" id="vendor_city" name="vendor_city" placeholder="ادخل المحافضة" value="{{ $vedorDetails['city'] }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="vendor_state">المديرية</label>
                                <input type="text" class="form-control" id="vendor_state" name="vendor_state" placeholder="ادخل المديرية" value="{{$vedorDetails['state'] }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <select class="form-control" id="vendor_country" name="vendor_country">
                                    <option value="">اختار الدولة</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country['country_name'] }}" @if( $country['country_name']==$vedorDetails['country']) selected @endif>{{ $country['country_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="vendor_pincode">pin code</label>
                                <input type="text" class="form-control" id="vendor_pincode" name="vendor_pincode" placeholder="ادخل الرمز" value="{{ $vedorDetails['pincode'] }}">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-10">
                                    <label for="vendor_image">الصورة الشخصية</label>
                                    <input type="file" name="vendor_image" id="vendor_image" class="file-upload-default">
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
                    </div>
                    <div class="btn-group mt-2">
                        <button type="submit" class="btn btn-outline-primary text-expanded mr-5 ">حفظ</button>
                        <button class="btn btn-outline-danger">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- end col -->
    @elseif($slug=="business")
    <div class="row">
        <div class="col-12  stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">تحديث بيانات المتجر</Details>
                    </h4>

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
                    <form class="forms-sample" method="post" action="{{ url('admin/update-vendor-details/business') }}" enctype="multipart/form-data">@csrf
                        <div class="row">

                            <div class="form-group mb-3">
                                <label for="shop_name">اسم المتجر</label>
                                <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="ادخل الاسم" value="{{ $vedorDetails->shop_name }}">
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="shop_email"> البريد الالكتروني الخاص بالمتجر</label>
                                    <input type="email" class="form-control" name="shop_email" id="shop_email" placeholder="البريد الالكتروني" value="{{ $vedorDetails->shop_email }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="phone_numper">رقم الهاتف الخاص بالمتجر</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="رقم الهاتف" value="{{ $vedorDetails->shop_mobile }}" maxlength="9" minlength="9">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="shop_address">عنوان المتجر</label>
                                    <input type="text" class="form-control" id="shop_address" name="shop_address" placeholder="ادخل العنوان" value="{{ $vedorDetails->shop_address }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="shop_city">المحافضة</label>
                                    <input type="text" class="form-control" id="shop_city" name="shop_city" placeholder="ادخل المحافضة" value="{{ $vedorDetails->shop_city }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="shop_state">المديرية</label>
                                    <input type="text" class="form-control" id="shop_state" name="shop_state" placeholder="ادخل المديرية" value="{{$vedorDetails->shop_state }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <select class="form-control" id="shop_country" name="shop_country">
                                        <option value="">اختار الدولة</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country['country_name'] }}" @if( $country['country_name']==$vedorDetails->shop_country) selected @endif >{{ $country['country_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="shop_pincode">pin code</label>
                                    <input type="text" class="form-control" id="shop_pincode" name="shop_pincode" placeholder="ادخل الرمز" value="{{ $vedorDetails->shop_pincode }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="business_license_number">رقم السجل التجاري</label>
                                    <input type="text" class="form-control" id="business_license_number" name="business_license_number" placeholder="ادخل الرمز" value="{{ $vedorDetails->business_license_number }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="gst_number">(GST) رقم حساب الفوترة الالكترونية</label>
                                    <input type="text" class="form-control" id="gst_number" name="gst_number" placeholder="ادخل الرمز" value="{{ $vedorDetails->gst_number }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="pan_number">(PAN) رقم الحساب البنكي الاساسي</label>
                                    <input type="text" class="form-control" id="pan_number" name="pan_number" placeholder="ادخل الرمز" value="{{ $vedorDetails->pan_number }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="shop_address_proof">اثبات الهوية</label>
                                    <select class="form-control" name="shop_address_proof" id="shop_address_proof">
                                        <option value="passport" @if($vedorDetails->address_proof=="passport") selected @endif>جواز سفر</option>
                                        <option value="id-card" @if($vedorDetails->address_proof=="id-card") selected @endif>بطاقة شخصية</option>
                                        <option value="driving-license" @if($vedorDetails->address_proof=="driving-license") selected @endif>رخصة قيادة</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="address_proof_image">صورة الهوية</label>
                                <input type="file" name="address_proof_image" id="address_proof_image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="رفع صورة">
                                    <input type="hidden" name="current_image" value="{{ $vedorDetails->address_proof_image }}">

                                </div>
                            </div>
                        </div>
                        <div class="btn-group mt-2">
                            <button type="submit" class="btn btn-outline-primary text-expanded ">حفظ</button>
                            <button class="btn btn-outline-danger">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @elseif($slug=="bank")
        <div class="row">
            <div class="col-12  stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">تحديث بيانات البنك</Details>
                        </h4>

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
                        <form class="forms-sample" method="post" action="{{ url('admin/update-vendor-details/bank') }}" enctype="multipart/form-data">@csrf


                            <div class="form-group mb-3">
                                <label for="account_holder_name">اسم مالك الحساب</label>
                                <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" placeholder="مطلوب " value="{{ $vedorDetails->account_holder_name }}">
                            </div>


                            <div class="form-group mb-3">
                                <label for="bank_name"> اسم البنك</label>
                                <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder=" مطلوب" value="{{ $vedorDetails->bank_name }}">
                            </div>


                            <div class="form-group mb-3">
                                <label for="account_number">رقم الحساب</label>
                                <input type="text" class="form-control" id="account_number" name="account_number" placeholder=" مطلوب" value="{{ $vedorDetails->account_number }}" maxlength="15" minlength="15">
                            </div>


                            <div class="form-group mb-3">
                                <label for="bank_ifsc_code"> رقم الثانوي</label>
                                <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code" placeholder=" مطلوب" value="{{ $vedorDetails->bank_ifsc_code }}">
                            </div>




                            <div class="btn-group mt-2">
                                <button type="submit" class="btn btn-outline-primary text-expanded ">حفظ</button>
                                <button class="btn btn-outline-danger">الغاء</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endif
        </div>
        <!-- end row -->

        @endsection
        @section('script')
        <script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
        <script src="{{ URL::asset('assets/backend/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ URL::asset('assets/backend/js/custom.js') }}"></script>
        <script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
        <script src="{{ URL::asset('assets/backend/js/pages/profile.init.js') }}"></script>
        <script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>

        <!-- <script>
    $('#update-profile').on('submit', function(event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        let formData = new FormData(this);
        $('#emailError').text('');
        $('#nameError').text('');
        $('#avatarError').text('');
        $.ajax({
            url: "{{ url('update-profile') }}" + "/" + Id,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#emailError').text('');
                $('#nameError').text('');
                $('#avatarError').text('');
                if (response.isSuccess == false) {
                    alert(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function(response) {
                $('#emailError').text(response.responseJSON.errors.email);
                $('#nameError').text(response.responseJSON.errors.name);
                $('#avatarError').text(response.responseJSON.errors.avatar);
            }
        });
    });
</script> -->
        @endsection