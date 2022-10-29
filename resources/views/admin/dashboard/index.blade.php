@extends('admin.layouts.master')
@section('dashboard') active @endsection

@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Dashboard</h5>
                            <span>Welcome back!</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <!-- [ page content ] start -->
                        <div class="row">

                            <!-- product profit start -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-red">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Total Sales</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">{{presentPrice($totalSale)}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Total Orders</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">{{$totalOrders}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-database text-c-blue f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-green">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Total Customer</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">{{$totalCus}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign text-c-green f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-yellow">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Total Product</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">{{$totalProducts}}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tags text-c-yellow f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="styleSelector">
    </div>
@stop

@push('scripts')

@endpush

