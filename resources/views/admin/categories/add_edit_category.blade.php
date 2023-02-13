@extends('admin.layouts.master')
@section('title') @lang('translation.Add_Gategory') @endsection
@section('css')
<link href="{{ URL::asset('assets/backend/libs/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/backend/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Categories @endslot
@slot('title') Add Category @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category Information</h4>
                <p class="card-title-desc">Fill all information below</p>
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
                <form @if(empty($category['id'])) action="{{ url('admin/add_edit_category') }}" @else action="{{ url('admin/add_edit_category/'.$category['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="category_name">اسم الصنف </label>
                                <input id="category_name" name="category_name" type="text" class="form-control"  placeholder="Category Name">
                            </div>
                            <div class="mb-3">
                                <label for="parent_id" class="control-label">نوع الصنف</label>
                                <select name="parent_id" id="parent_id" class="form-control select2">
                                    <option value="0">رئيسي</option>
                                   
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category_dicount">نسبة التخفيض</label>
                                <input id="category_dicount" name="category_dicount" type="text" class="form-control" placeholder="Category dicount">
                            </div>
                            <div class="mb-3">
                                <label for="category_url">URL</label>
                                <input id="category_url" name="category_url" type="text" class="form-control" placeholder="Enter category link">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="section_id" class="control-label">القسم</label>
                                <select name="section_id" id="section_id" class="form-control select2">
                                    <option>Select</option>
                                    @foreach($sections as $section)
                                    <option value="{{$section['id']}}">{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="decription">الوصف</label>
                                <textarea class="form-control" id="decription" name="decription" rows="10" placeholder="Product Description"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                         <div class="card">
                           <div class="card-header">
                             <h4 class="card-title mb-0">Product Images</h4>
                           </div>
                         <div class="card-body">
               
                            <div class="fallback">
                             <input name="file" type="file" multiple />
                            </div>

                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="card">
            <div class="card-header">
                <h4 class="card-title">Meta Data</h4>
                <p class="card-title-desc">Fill all information below</p>
            </div>
            <div class="card-body">

                
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">Meta title</label>
                                <input id="metatitle" name="productname" type="text" class="form-control" placeholder="Metatitle">
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">Meta Keywords</label>
                                <input id="metakeywords" name="manufacturername" type="text" class="form-control" placeholder="Meta Keywords">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">Meta Description</label>
                                <textarea class="form-control" id="metadescription" rows="5" placeholder="Meta Description"></textarea>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
                    </div>
                </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
       
    </div>   
            
                   
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/backend/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/alert.init.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
@endsection
