@extends('admin.layouts.master')

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4 class="mb-0">Customer Details</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="https://demo.dashboardpack.com/admindek-html/index.html"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <a href="{{route('customers.index')}}" class="btn btn-primary btn-round"><i class="fas fa-chevron-left"></i> Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title mb-4">
                                            <div class="d-flex justify-content-start">
                                                <div class="image-container">
                                                    <img src="{{file_exists($customer->avatar) && isset($customer->avatar) ? asset($customer->avatar) : 'https://templates.joomla-monster.com/joomla30/jm-news-portal/components/com_djclassifieds/assets/images/default_profile.png' }}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                                    <div class="middle">
                                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                                    </div>
                                                </div>
                                                <div class="userData ml-3">
                                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{$customer->name}}</a></h2>
                                                    <h6 class="d-block"><a href="javascript:void(0)"></a> {{$customer->address}}</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab"
                                                           aria-controls="connectedServices" aria-selected="false">Orders Details</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content ml-1" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Full Name</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                {{$customer->name}}
                                                            </div>
                                                        </div>
                                                        <hr />
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Joined Date</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                {{  $customer->created_at->format('Y-m-d h:i:s') }}
                                                            </div>
                                                        </div>
                                                        <hr />
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Birth Date</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                {{$customer->dob ?? '-'}}
                                                            </div>
                                                        </div>
                                                        <hr />

                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Phone</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                {{$customer->phone ?? '-'}}
                                                            </div>
                                                        </div>
                                                        <hr />
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Email Address</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                {{$customer->email ?? '-'}}
                                                            </div>
                                                        </div>
                                                        <hr />
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Address</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                {{$customer->address ?? '-'}}
                                                            </div>
                                                        </div>
                                                        <hr />

                                                    </div>
                                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                        <div class="table-responsive">
                                                            <table class="table mb-0">
                                                                <thead>
                                                                <tr>
                                                                    <th>Order ID</th>
                                                                    <th>Billing Name</th>
                                                                    <th>Num.of Products</th>
                                                                    <th>Payment Status</th>
                                                                    <th>Order Status</th>
                                                                    <th>Order Date</th>
                                                                    <th>Total</th>
                                                                    <th style="width: 120px;">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @forelse($customer->orders as $key => $row)
                                                                    <tr>
                                                                        <td>{{ $row->order_id }}</td>
                                                                        <td>{{ $row->billing_name }}</td>
                                                                        <td>{{ count($row->products) }}</td>
                                                                        <td>{!! $row->paymentStatusHtml()!!}</td>
                                                                        <td>{!! $row->statusHtml()!!}</td>
                                                                        <td>{{ presentDate($row->created_at) }}</td>
                                                                        <td>{{ presentPrice($row->billing_total) }}</td>
                                                                        <td>
                                                                            {{--                                                <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="Delete"--}}
                                                                            {{--                                                   data-original-title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>--}}

                                                                            <a href="{{ route('admin.orders.show', $row->id)}}" class="text-info" data-toggle="tooltip" data-placement="top" title="view deteils"
                                                                               data-original-title="Delete"><i class="mdi mdi-eye-outline font-size-18"></i></a>
                                                                        </td>
                                                                    </tr>d>Table cell</td>
                                                                    </tr>
                                                                @empty
                                                                    <tr class="text-center!">
                                                                        <td colspan="8">
                                                                            <div class="text-center pb-5 mt-5">
                                                                                <img src="/demo/box.png" width="60">
                                                                                <div class="font-weight-bold mt-1">No Orders Found!</div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop