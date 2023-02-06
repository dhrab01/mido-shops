@extends('admin.layouts.master')
@section('title') @lang('translation.Profile') @endsection
@section('content')

<div class="row">
    <div class="profile-content mt-3">
        <div class="row align-items-end">
            <div class="col-sm">
                <div class="d-flex align-items-end mt-3 mt-sm-0">
                    <div class="flex-shrink-0">

                    </div>
                    <div class="flex-grow-1">
                        <div>
                            <h5 class="font-size-16 mb-1">بيانات التاجر</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="d-flex align-items-start justify-content-end gap-2 mb-2">
                    <div>
                        <a class="btn btn-primary" href="{{ url('admin/admins/vendor') }}" ><i class="me-1"></i>رجوع الى القائمة</a>
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

<div class="row">
    <div class="col-12  stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> البيانات الشخصية</Details>
                </h4>
                <div class="row">

                    <div class="form-group mb-3">
                        <label>الاسم</label>
                        <input type="text" class="form-control" value="{{ $vendorDetails['name'] }}" readonly>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label>البريد الالكتروني</label>
                            <input type="email" class="form-control" value="{{ $vendorDetails['email'] }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label>رقم الهاتف</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['mobile'] }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label>العنوان</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['address'] }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label>المحافضة</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['city'] }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label>المديرية</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['state'] }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label>الدولة</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['country'] }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label>pin code</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="vendor_image">الصورة الشخصية</label>
                        <div class="avatar-xxl me-3">
                            <img src="{{ URL::asset('images/photos/'. $vendorDetails['image']) }}" alt="profile-image" class="img-fluid d-block img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- end col -->

    <div class="row">
        <div class="col-12  stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> بيانات المتجر</Details>
                    </h4>
                    <div class="row">

                        <div class="form-group mb-3">
                            <label for="shop_name">اسم المتجر</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_name'] }}" readonly="">
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="shop_email"> البريد الالكتروني الخاص بالمتجر</label>
                                <input type="email" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_email'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="phone_numper">رقم الهاتف الخاص بالمتجر</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="shop_address">عنوان المتجر</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_address'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="shop_city">المحافضة</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_city'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="shop_state">المديرية</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_state'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="shop_country">الدولة</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_name'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="shop_pincode">pin code</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_pincode']}}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="business_license_number">رقم السجل التجاري</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['business_license_number'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="gst_number">(GST) رقم حساب الفوترة الالكترونية</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['gst_number'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="pan_number">(PAN) رقم الحساب البنكي الاساسي</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['pan_number'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="pan_number">اثبات الهوية</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['address_proof'] }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address_proof_image">صورة الهوية</label>
                            <div style="width: 50%;">
                                <img src="{{ URL::asset('images/proofs/'. $vendorDetails['vendor_business']['address_proof_image']) }}" alt="address-proof-image" class="img-fluid d-block img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- end col -->

            <div class="row">
                <div class="col-12  stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> بيانات البنك</Details>
                            </h4>
                            <div class="form-group mb-3">
                                <label for="account_holder_name">اسم مالك الحساب</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" readonly>
                            </div>


                            <div class="form-group mb-3">
                                <label for="bank_name"> اسم البنك</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" readonly>
                            </div>


                            <div class="form-group mb-3">
                                <label for="account_number">رقم الحساب</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['account_number'] }}" readonly>
                            </div>


                            <div class="form-group mb-3">
                                <label for="bank_ifsc_code"> الرقم الثانوي</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            @endsection
            @section('script')
            <script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
            <script src="{{ URL::asset('assets/backend/libs/apexcharts/apexcharts.min.js') }}"></script>
            <script src="{{ URL::asset('assets/backend/js/pages/profile.init.js') }}"></script>

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