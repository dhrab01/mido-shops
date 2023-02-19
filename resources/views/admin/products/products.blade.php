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
                  <h4 class="card-title">ادارة المنتجات</h4>
               </div>
               <div class="col-sm-8">
                  <div class="text-sm-end">
                     <a href="{{ url('admin/add_edit_product') }}" class="btn  btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>اضافة جديد</a>
                  </div>
               </div>
               <!-- end col-->
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
               <table id="product" class="data-table table align-middle table-nowrap">
                  <thead>
                     <tr>
                        <th>الرقم</th>
                        <th>اسم المنتج</th>
                        <th>الرمز</th>
                        <th>صورة المنتج</th>
                        <th>لون المنتج</th>
                        <th>القسم</th>
                        <th>الصنف</th>
                        <th>اصيف بواسطة</th>
                        <th>مميز</th>
                        <th>الحالة</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($products as $product)
                     <tr>
                        <td>
                           {{$product['id']}}
                        </td>
                        <td>
                           {{$product['product_name']}}
                        </td>
                        <td>
                           {{$product['product_code']}}
                        </td>
                        <td>
                           @if(!empty($product['product_image']))
                           <div class="flex-shrink-0">
                              <div class="avatar-md me-3">
                                 <a href="javascript:void(0)" class="waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                 <img src="{{ URL::asset('images/front/products/'. $product['product_image']) }}" alt="product-image" class="img-fluid  d-block img-thumbnail">
                                 </a>
                                 <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title">{{$product['product_name']}}</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                             <img src="{{ url('images/front/products/'.$product['product-image']) }}" class="img-fluid" alt="Category image">
                                          </div>
                                          <div class="modal-footer">
                                             <a href="javascript:void(0)" class="conformDelete btn btn-danger waves-effect waves-light" module="product-image" moduleid="{{$product['id']}}">حذف الصورة</a>
                                             <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">الغاء</button>
                                          </div>
                                       </div>
                                       <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                 </div>
                                 <!-- /.modal -->
                              </div>
                           </div>
                           @endif
                        </td>
                        <td>
                           {{$product['product_color']}}
                        </td>
                        <td>
                           {{$product['section']['name']}}
                        </td>
                        <td>
                           {{$product['category']['category_name']}}
                        </td>
                        <td>
                           <button type="button" class="btn btn-link link-info waves-effect waves-light show-link"  value="{{$product['admin']['id']}}">{{$product['admin']['name']}}</button>
                        </td>
                        <td>
                           @if($product['is_featured']=="Yes")
                           <input type="checkbox" class="updateIsFeatured" id="product-{{$product['id']}}"  product_id="{{$product['id']}}" status="Yes" switch="success" checked />
                           <label for="product-{{$product['id']}}" data-on-label="Yes" data-off-label="Yes"></label>
                           @else
                           <input type="checkbox" class="updateIsFeatured" id="product-{{$product['id']}}"  product_id="{{$product['id']}}" status="No" switch="success" />
                           <label for="product-{{$product['id']}}" data-on-label="Yes" data-off-label="No"></label>
                           @endif
                        </td>
                        <td>
                           @if($product['status']==1)
                           <input type="checkbox" class="updateStatus" id="module-{{$product['id']}}" module="product" module_id="{{$product['id']}}" status="Active" switch="success" checked />
                           <label for="module-{{$product['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                           @else
                           <input type="checkbox" class="updateStatus" id="module-{{$product['id']}}" module="product" module_id="{{$product['id']}}" status="Inactive" switch="success" />
                           <label for="module-{{$product['id']}}" data-on-label="مفعل" data-off-label="غير مفعل"></label>
                           @endif
                        </td>
                        <td>
                           <div class="dropdown">
                              <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="mdi mdi-dots-horizontal font-size-18"></i>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end">
                                 <li><a href="{{ url('admin/add_edit_product/'.$product['id']) }}" class="dropdown-item btn  btn-success btn-rounded edit-btn" value="{{$product['id']}}"><i class="edit-btn mdi mdi-pencil font-size-16 text-success me-1"></i> تعديل</a></li>
                                 <li><a title="الصنف" href="javascript:void(0)" class="conformDelete dropdown-item btn  btn-success btn-rounded" module="product" moduleid="{{$product['id']}}"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> حذف</a></li>
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
<!-- sample modal content -->
<div id="myModal" class="modal fade show-detail" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="card">
               <div class="text-center">
                        <div class="mt-sm-0">
                                 <img src="" alt="profile-image" id="admin_image" class="  card-img-top img-thumbnail">
                              
                              <div id="type">
                                  
                              </div>
                           
                        </div>
               </div>
               <!-- end card header -->
               <div class="card-body">
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">البيانات الشخصية</span>
                        </a>
                     </li>
                     <li class="nav-item btb">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Profile</span>
                        </a>
                     </li>
                     <li class="nav-item btb">
                        <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                        <span class="d-none d-sm-block">Messages</span>
                        </a>
                     </li>
                     <li class="nav-item btb">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">Settings</span>
                        </a>
                     </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content p-3 text-muted">
                     <div class="tab-pane active" id="home" role="tabpanel">
                       <div class="row">
                            <input type="hidden" id="admin_id" name="admin_id" value="">
                            <div class="form-group mb-3">
                             <label for="admin_name">الاسم</label>
                             <input type="text" class="form-control" id="admin_name" name="admin_name" value="" readonly>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="admin_email">البريد الالكتروني</label>
                            <input type="email" class="form-control" id="admin_email" name="admin_email" value="" readonly>
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="phone_numper">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone_number" value="" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="admin_address" class="lbl">العنوان</label>
                            <input type="text" class="form-control" value="" id="admin_address" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="admin_city" class="lbl">المحافضة</label>
                            <input type="text" class="form-control" value="" id="admin_city" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="admin_state" class="lbl">المديرية</label>
                            <input type="text" class="form-control" value="" id="admin_state" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label class="lbl">الدولة</label>
                            <input type="text" class="form-control" value="" id="admin_country" readonly>
                        </div>
                    </div>
                       </div>
                     </div>
                     <div class="tab-pane" id="profile" role="tabpanel">
                        <p class="mb-0">
                           Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                           single-origin coffee squid. Exercitation +1 labore velit, blog
                           sartorial PBR leggings next level wes anderson artisan four loko
                           farm-to-table craft beer twee. Qui photo booth letterpress,
                           commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                           vinyl cillum PBR. Homo nostrud organic, assumenda labore
                           aesthetic magna delectus.
                        </p>
                     </div>
                     <div class="tab-pane" id="messages" role="tabpanel">
                        <p class="mb-0">
                           Etsy mixtape wayfarers, ethical wes anderson tofu before they
                           sold out mcsweeney's organic lomo retro fanny pack lo-fi
                           farm-to-table readymade. Messenger bag gentrify pitchfork
                           tattooed craft beer, iphone skateboard locavore carles etsy
                           salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                           Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                           mi whatever gluten yr.
                        </p>
                     </div>
                     <div class="tab-pane" id="settings" role="tabpanel">
                        <p class="mb-0">
                           Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                           art party before they sold out master cleanse gluten-free squid
                           scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                           art party locavore wolf cliche high life echo park Austin. Cred
                           vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                           farm-to-table VHS.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end card -->
         </div>
         <div class="modal-footer">
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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