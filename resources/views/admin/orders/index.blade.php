@extends('admin.layouts.master')
@section('orders') active @endsection
@section('css')
    <link rel="stylesheet" href="/admin/assets/vendor/bootstrap-datetimepicker.min.css"/>
@stop
@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>All Orders</h5>
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
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <form class="form-inline" method="GET">
                                            <div class="form-group mx-sm-3">
                                                <select name="delivery_status" class="form-control">
                                                    <option value="" selected disabled>Filter by Delivery Status</option>
                                                    <option value="{{\App\Order::STATUS_PENDING}}" @if ($delivery_status == \App\Order::STATUS_PENDING) selected @endif>Pending</option>
                                                    <option value="{{\App\Order::STATUS_CANCELLED}}" @if ($delivery_status == \App\Order::STATUS_CANCELLED) selected @endif>Cancelled</option>
                                                    <option value="{{\App\Order::STATUS_COMPLETE}}" @if ($delivery_status == \App\Order::STATUS_COMPLETE) selected @endif>Complete</option>
                                                    <option value="{{\App\Order::STATUS_PROCESSING}}" @if ($delivery_status == \App\Order::STATUS_PROCESSING) selected @endif>Processing</option>
                                                    <option value="{{\App\Order::STATUS_ACCEPTED}}" @if ($delivery_status == \App\Order::STATUS_ACCEPTED) selected @endif>Accepted</option>
                                                </select>
                                            </div>
                                            <div class="form-group mx-sm-3">
                                                <select name="payment_status" class="form-control">
                                                    <option value="" selected disabled>Filter by Payment Status</option>
                                                    <option value="{{\App\Order::PAYMENT_STATUS_UNPAID}}" @if ($payment_status == \App\Order::PAYMENT_STATUS_UNPAID) selected @endif>Un-Paid</option>
                                                    <option value="{{\App\Order::PAYMENT_STATUS_PARTIAL}}" @if ($payment_status == \App\Order::PAYMENT_STATUS_PARTIAL) selected @endif>Partial</option>
                                                    <option value="{{\App\Order::PAYMENT_STATUS_PAID}}" @if ($payment_status == \App\Order::PAYMENT_STATUS_PAID) selected @endif>Paid</option>
                                                </select>
                                            </div>
                                            <div class="form-group mx-sm-3">
                                                <input type="text" class="form-control order-date" name="order_date" @isset($order_date) value="{{ $order_date }}" @endisset placeholder="Search by order Date">
                                            </div>
                                            <div class="form-group mx-sm-3">
                                                <input type="text" class="form-control" name="search" @isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Search by order id">
                                            </div>
                                            <button type="submit" class="btn btn-success">Filter</button>
                                            <a href="{{route('admin.orders.index')}}" class="btn btn-info ml-2">Clear</a>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Customer</th>
                                                    <th>Num.of Products</th>
                                                    <th>Payment Status</th>
                                                    <th>Delivery Status</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th style="width: 120px;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->order_id }}</td>
                                                        <td>{{ $order->billing_name }}</td>
                                                        <td>{{ count($order->products) ?? '' }}</td>
                                                        <td>{!! $order->paymentStatusHtml()!!}</td>
                                                        <td>{!! $order->statusHtml()!!}</td>
                                                        <td>{{ presentDate($order->created_at) }}</td>
                                                        <td>{{ presentPrice($order->billing_total) }}</td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('admin.orders.show', $order->id)}}" class="text-info" data-toggle="tooltip" data-placement="top" title="View Invoice">
                                                                <i class="fa fa-eye f-w-600 f-16 text-c-success"></i>
                                                            </a>
                                                            <a class="ml-3 confirm-delete" href="javascript:void(0);" data-href="{{route('admin.orders.destroy', $order->id)}}" title="Delete" data-toggle="tooltip" data-placement="top">
                                                                <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i>
                                                            </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.modals.delete_modal')
@stop

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="/admin/assets/vendor/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
            $('.order-date').datetimepicker({
                format: 'Y-MM-DD',
            });
        });
        $('#datatable2').dataTable({
            paging: true,
            searching: true,
            pageLength: 100,
        });
    </script>
@endpush