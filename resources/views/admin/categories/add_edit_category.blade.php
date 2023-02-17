@extends('admin.layouts.master')
@section('title') @lang('translation.Add_Gategory') @endsection
@section('css')
<link href="{{ URL::asset('assets/backend/libs/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Categories @endslot
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
        <form @if(empty($category['id'])) action="{{ url('admin/add_edit_category') }}" @else action="{{ url('admin/add_edit_category/'.$category['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">معلومات الصنف</h4>
                    <!-- <p class="card-title-desc">Fill all information below</p> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="category_name">اسم الصنف </label>
                                <input id="category_name" name="category_name" type="text" class="form-control" placeholder="Category Name"
                                @if(!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old('category_name') }}" @endif>
                            </div>
                            <div id="appendCatLevel">
                                @include('admin.categories.append_cat_level')
                            </div>
                            <div class="mb-3">
                                <label for="category_dicount">نسبة التخفيض</label>
                                <input id="category_dicount" name="category_dicount" type="text" class="form-control" placeholder="Category dicount"
                                @if(!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif>
                            </div>
                            <div class="mb-3">
                                <label for="category_url">URL</label>
                                <input id="category_url" name="category_url" type="text" class="form-control" placeholder="Enter category link"
                                @if(!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old('url') }}" @endif>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="section_id" class="control-label">القسم</label>
                                <select name="section_id" id="section_id" class="form-control select2">
                                    <option>Select</option>
                                    @foreach($sections as $section)
                                    <option value="{{$section['id']}}" @if(!empty($category['section_id']) && $category['section_id']==$section['id']) selected @endif>{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="decription">الوصف</label>
                                <textarea class="form-control" id="decription" name="decription" rows="10" placeholder="Category Description">
                                @if(!empty($category['description'])) {{ $category['description'] }} @endif
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">صورة الصنف</h4>
                </div>
                <div class="card-body">

                    <div class="form-group mb-2">
                        <input class="form-control" id="category_image" name="category_image" type="file"  />
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات الميتا</h4>
                    <!-- <p class="card-title-desc">Fill all information below</p> -->
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">العنوان</label>
                                <input id="metatitle" name="metatitle" type="text" class="form-control" placeholder="Metatitle"
                                @if(!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">الكلمات المفتاحية</label>
                                <input id="metakeywords" name="metakeywords" type="text" class="form-control" placeholder="Meta Keywords"
                                @if(!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">الوصف</label>
                                <textarea class="form-control" id="metadescription" name="metadescription" rows="5" placeholder="Meta Description">
                                @if(!empty($category['meta_description'])){{ $category['meta_description'] }} @endif
                                </textarea>
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

<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/backend/js/custom.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
@endsection