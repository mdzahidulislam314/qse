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
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="https://demo.dashboardpack.com/admindek-html/index.html"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard CRM</a> </li>
                        </ul>
                    </div>
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

                            <div class="col-xl-7 col-md-12">
                                <div class="card latest-update-card">
                                    <div class="card-header">
                                        <h5>Latest Orders</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-centered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                <tr>

                                                    <th>Order ID</th>
                                                    <th>Date</th>
                                                    <th>Shipping Name</th>
                                                    <th>Total</th>
                                                    <th>Payment Status</th>
                                                    <th>Order Status</th>
                                                    <th style="width: 120px;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($latestOrders as $row)
                                                    <tr>

                                                        <td><a href="javascript: void(0);" class="text-dark font-weight-bold">#{{$row->id}}</a> </td>
                                                        <td>{{ presentDate($row->created_at) }}</td>
                                                        <td>{{$row->billing_name}}</td>
                                                        <td>{{ presentPrice($row->billing_total) }}</td>
                                                        <td>{!! $row->paymentStatusHtml() !!}</td>
                                                        <td>{!! $row->statusHtml() !!}</td>
                                                        <td>
                                                            <a href="{{ route('admin.orders.show', $row->id)}}" class="text-info" data-toggle="tooltip" data-placement="top" title="view deteils"
                                                               data-original-title="Delete">
                                                                <i class="fa fa-eye text-c-green mr-2"></i>
                                                            </a>
                                                            {{--                                                            <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">--}}
                                                            {{--                                                                <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i>--}}
                                                            {{--                                                            </a>--}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-12">
                                <div class="card new-cust-card">
                                    <div class="card-header">
                                        <h5>New Customers</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        @foreach($latestCus as $item)
                                        <div class="align-middle m-b-35">
                                            <img src="/admin/assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                            <div class="d-inline-block">
                                                <a href="#!"><h6>{{$item->name}}</h6></a>
                                                <p class="text-muted m-b-0">{{$item->email}}</p>
                                                <span class="status active"></span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- income start -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card o-hidden">
                                    <div class="card-header">
                                        <h5>Total Leads</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="text-muted m-b-5">Overall</p>
                                                <h6>68.52%</h6>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted m-b-5">Monthly</p>
                                                <h6>28.90%</h6>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted m-b-5">Day</p>
                                                <h6>13.50%</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="sal-income" style="height:100px"></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card o-hidden">
                                    <div class="card-header">
                                        <h5>Total Vendors</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="text-muted m-b-5">Overall</p>
                                                <h6>68.52%</h6>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted m-b-5">Monthly</p>
                                                <h6>28.90%</h6>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted m-b-5">Day</p>
                                                <h6>13.50%</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="rent-income" style="height:100px"></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12">
                                <div class="card o-hidden">
                                    <div class="card-header">
                                        <h5>Invoice Generate</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="text-muted m-b-5">Overall</p>
                                                <h6>68.52%</h6>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted m-b-5">Monthly</p>
                                                <h6>28.90%</h6>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted m-b-5">Day</p>
                                                <h6>13.50%</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="income-analysis" style="height:100px"></div>
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

