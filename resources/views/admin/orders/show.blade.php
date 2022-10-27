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
                        <h5>View Order</h5>
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
                    <div>
                        @php
                            use App\Services\SettingsService;$settingsArr = SettingsService::getSettingsArray();
                        @endphp
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-sm btn-info d-inline-block" data-toggle="modal" data-target="#orderStatus">Delivery Status</button>
                                        <button type="button" class="btn btn-sm btn-info d-inline-block" data-toggle="modal" data-target="#paymentStatus">Payment Status</button>
                                    </div>
                                </div>
                                <div class="card" id="printableArea">
                                    <div class="card-body m-sm-3 m-md-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong> <img src="{{url($settingsArr['header_logo'] ?? '')}}" alt="invoice Logo" width="150"></strong>

                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <h1><b>INVOICE</b></h1>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <span><b>Invoice No: {{$order->invoice_no}}</b></span>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <div class="text-muted">Order Date</div>
                                                <strong>{{$order->created_at->format(' jS F, Y h:i A')}}</strong>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="text-muted">Invoiced To:</div>
                                                <strong>
                                                    {{ $order -> billing_name }}
                                                </strong>
                                                <span class="d-block">{{ $order->billing_email }}</span>
                                                <span class="d-block">{{ $order->billing_phone }}</span>

                                                <div class="d-flex align-items-center mb-2 mt-3">
                                                    <div class="text-muted mr-3">Order No:</div>
                                                    <strong>{{$order->order_id}}</strong>
                                                </div>
                                                <div class="d-flex align-items-center mb-2 mt-3">
                                                    <div class="text-muted mr-3">Order Status:</div>
                                                    <strong>{!! $order->statusHtml()!!}</strong>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="text-muted mr-3">Payment Status:</div>
                                                    <strong>{!! $order->paymentStatusHtml()!!}</strong>
                                                </div>

                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <div class="text-muted">Shipping Address:</div>
                                                <strong>
                                                    {{$order->shipping_address}}
                                                </strong>
                                            </div>
                                        </div>

                                        <table class="table table-sm">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($order->products as $product)
                                                <tr>
                                                    <td width="20%"><img src="{{ productImage($product->image) }}" alt="" width="50"></td>
                                                    <td width="30%"><a href="{{ route('shop.show', $product->slug) }}" class="text-decoration-none">
                                                            {{$product->name}}</a>
                                                    </td>
                                                    <td width="25%">{{ $product->pivot->quantity }}</td>
                                                    <td width="25%" class="text-right">
                                                        {{ presentPrice($product->pivot->quantity*$product->pivot->price) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>Subtotal </th>
                                                <th class="text-right">{{presentPrice($order->billing_subtotal)}}</th>
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>Shipping </th>
                                                <th class="text-right">{{presentPrice($order->shipping_cost)}}</th>
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>Discount </th>
                                                <th class="text-right">% {{$order->billing_discount}}</th>
                                            </tr>
                                            {{--                                <tr>--}}
                                            {{--                                    <th>&nbsp;</th>--}}
                                            {{--                                    <th>&nbsp;</th>--}}
                                            {{--                                    <th>Tax </th>--}}
                                            {{--                                    <th class="text-right">{{presentPrice($order->billing_tax)}}</th>--}}
                                            {{--                                </tr>--}}
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>Total </th>
                                                <th class="text-right">{{presentPrice($order->billing_total)}}</th>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print a div!">
                                                Print Invoice
                                            </button>
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
<div id="styleSelector">
</div>

<div class="modal fade" id="orderStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('order.status', $order->id)}}" method="POST">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset class="form-group">
                    <div class="row">
                        <label class="col-form-label col-sm-5 text-sm-right pt-sm-0"><b>Status:</b></label>
                        <div class="col-sm-7">
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                    <input name="status" type="radio" class="custom-control-input"  value="1" {{$order->order_status == 1 ?
                                                    'checked' : ''}}/>
                                    <span class="custom-control-label">Pending</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input name="status" type="radio" class="custom-control-input"  value="5" {{$order->order_status == 5 ?
                                                    'checked' : ''}}/>
                                    <span class="custom-control-label">Accepted</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input name="status" type="radio" class="custom-control-input" value="2" {{$order->order_status == 2 ?
                                                    'checked' : ''}}/>
                                    <span class="custom-control-label">Processing</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input name="status" type="radio" class="custom-control-input" value="3" {{$order->order_status == 3 ?
                                                    'checked' : ''}}/>
                                    <span class="custom-control-label">Completed</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input name="status" type="radio" class="custom-control-input" value="4" {{$order->order_status == 4 ?
                                                    'checked' : ''}}/>
                                    <span class="custom-control-label">Canceled</span>
                                </label>
                            </div>
                        </div>
                        <label class="col-form-label col-sm-5 text-sm-right pt-sm-0"><b>Estimate Delivery Date:</b></label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input type="text" class="form-control sale-date" name="estimated_delivery_time" value="{{ $order->estimated_delivery_time }}"/>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="paymentStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('payment.status', $order->id)}}" method="POST">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Payment Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset class="form-group">
                    <div class="row">
                        <label class="col-form-label col-sm-4 text-sm-right pt-sm-0"><b>Payment:</b></label>
                        <div class="col-sm-8">
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                    <input name="payment" type="radio" class="custom-control-input" value="1" {{$order->payment_status == 1 ?
                                                        'checked' : ''}}/>
                                    <span class="custom-control-label">Unpaid</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input name="payment" type="radio" class="custom-control-input" value="2" {{$order->payment_status == 2 ?
                                                        'checked' : ''}}/>
                                    <span class="custom-control-label">Partial</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input name="payment" type="radio" class="custom-control-input" value="3" {{$order->payment_status == 3 ?
                                                        'checked' : ''}}/>
                                    <span class="custom-control-label">Paid</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

@stop

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="/admin/assets/vendor/bootstrap-datetimepicker.min.js"></script>
    <script>
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
        $(function () {
            $('.sale-date').datetimepicker({
                format: 'DD-MM-Y',
            });
        });
    </script>
@endpush