@extends('admin.layouts.master')
@section('title') @lang('translation.Add_Edit_Banner') @endsection
@section('css')
<link href="{{ URL::asset('assets/backend/libs/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') العروض @endslot
@slot('title') {{$title}} @endslot
@endcomponent
<div class="row">
    <div class="col-12">
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
        <form @if(empty($banner['id'])) action="{{ url('admin/add_edit_banner') }}" @else action="{{ url('admin/add_edit_banner/'.$banner['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">معلومات العرض</h4>
                    <!-- <p class="card-title-desc">Fill all information below</p> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="banner_title">العنوان</label>
                                <input id="banner_title" name="banner_title" type="text" class="form-control" placeholder="Banner Title"
                                @if(!empty($banner['title'])) value="{{ $banner['title'] }}" @else value="{{ old('banner_title') }}" @endif>
                            </div>
                            
                           
                            <div class="mb-3">
                                <label for="banner_link">Link</label>
                                <input id="banner_link" name="banner_link" type="text" class="form-control" placeholder="Enter Banner link"
                                @if(!empty($banner['link'])) value="{{ $banner['link'] }}" @else value="{{ old('banner_link') }}" @endif>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="banner_class" class="control-label">الثيم</label>
                                <select name="banner_class" id="banner_class" class="form-control select2">
                                    <option>Select</option>
                                    @foreach($class as $cl)
                                    <option value="{{$cl['name']}}" @if(!empty($banner['class']) && $banner['class']==$cl['class']) selected @endif>{{ $cl['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="banner_alt">الوصف</label>
                                <textarea class="form-control" id="banner_alt" name="banner_alt" rows="10" placeholder=" Description">
                                @if(!empty($banner['alt'])) {{ $banner['alt'] }} @endif
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">صورة العرض</h4>
                </div>
                <div class="card-body">

                    <div class="form-group mb-2">
                        <input class="form-control" id="banner_image" name="banner_image" type="file"  />
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
<script src="{{ URL::asset('assets/backend/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
@endsection