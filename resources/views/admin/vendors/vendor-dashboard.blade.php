@extends('admin.layouts.master')
@section('title') @lang('translation.Dashboards') @endsection
@section('css')

<link href="{{ URL::asset('/assets/backend/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet">

@endsection
@section('content')

@component('admin.components.breadcrumb')
@slot('li_1') لوحة التحكم @endslot
@slot('title') مرحبا ! @endslot
@endcomponent

<div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">اجمالي المبيعات</span>
                        <h4 class="mb-3">
                            $<span class="counter-value" data-target="354.5">0</span>k
                        </h4>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-success text-success">+$20.9k</span>
                            <span class="ms-1 text-muted font-size-13">منذ اخر اسبوع</span>
                        </div>
                    </div>

                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">اجمالي الوحدات</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="1256">0</span>
                        </h4>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                            <span class="ms-1 text-muted font-size-13">منذ اخر اسبوع</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">متوسط المبيعات</span>
                        <h4 class="mb-3">
                            $<span class="counter-value" data-target="7.54">0</span>M
                        </h4>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-success text-success">+ $2.8k</span>
                            <span class="ms-1 text-muted font-size-13">منذ اخر اسبوع</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">طلبات التوصيل</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="18.34">0</span>%
                        </h4>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-success text-success">+5.32%</span>
                            <span class="ms-1 text-muted font-size-13">منذ اخر اسبوع</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0 text-end dash-widget">
                        <div id="mini-chart4" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row-->


  

   
</div><!-- end row -->
@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/backend/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/backend/libs/admin-resources/admin-resources.min.js') }}"></script>

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/backend/js/pages/dashboard.init.js') }}"></script>
<script src="{{ URL::asset('/assets/backend/js/app.min.js') }}"></script>
@endsection
