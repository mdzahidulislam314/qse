@extends('layouts.master')

@section('title', 'Cart')

@section('css')
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="/site/assets/css/order-tracking.css">
@stop

@section('main')
    <main class="main">
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>Track Your Order</li>
                </ul>
            </div>
        </nav>

            <div class="page-content contact-us pb-10">
                <div class="container">
                    <article class="card">
                        <header class="card-header"> Your Orders Status</header>
                        <div class="card-body">
                            <h6>Order ID: {{$order->order_id}}</h6>
                            <article class="card" style="border: none">
                                <div class="card-body row">
                                    <div class="col-lg-3"> <strong>Estimated Delivery time:</strong> <br>{{$order->estimated_delivery_time}}</div>
                                    <div class="col-lg-3"> <strong>Shipping BY:</strong> <br> {{$order->shipped_by}} </div>
                                    <div class="col-lg-3"> <strong>Order Status:</strong> <br> {!! $order->statusHtml() ?? '' !!} </div>
                                    <div class="col-lg-3"> <strong>Payment Status:</strong> <br> {!! $order->paymentStatusHtml() ?? '' !!} </div>
                                </div>
                            </article>
                            <div class="track">
                                @if ($order->order_status == \App\Order::STATUS_PENDING)
                                    <div class="step active"><span class="icon"> <i class="fa fa-clock" ></i></span> <span class="text"> Order Pending </span></div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Deliverd</span> </div>
                                @elseif ($order->order_status == \App\Order::STATUS_ACCEPTED )
                                    <div class="step active"><span class="icon"> <i class="fa fa-clock" ></i></span> <span class="text"> Order Pending </span></div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Deliverd</span> </div>
                                @elseif ( $order->order_status == \App\Order::STATUS_PROCESSING)
                                    <div class="step active"><span class="icon"> <i class="fa fa-clock" ></i></span> <span class="text"> Order Pending </span></div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Deliverd</span> </div>
                                @elseif ( $order->order_status == \App\Order::STATUS_COMPLETE)
                                    <div class="step active"><span class="icon"> <i class="fa fa-clock" ></i></span> <span class="text"> Order Pending </span></div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Deliverd</span> </div>
                                @endif
                            </div>

                            <div class="order-track mb-10">
                                @if ($order->order_status == \App\Order::STATUS_PENDING)
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-clock" ></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Pending</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-check"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Confirmed</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-user"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat"> Picked by courier</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-truck"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">On the way</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-box"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Deliverd</p>
                                        </div>
                                    </div>
                                @elseif ($order->order_status == \App\Order::STATUS_ACCEPTED )
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-clock" ></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Pending</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-check"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Confirmed</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-user"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat"> Picked by courier</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-truck"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">On the way</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-box"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Deliverd</p>
                                        </div>
                                    </div>
                                @elseif ( $order->order_status == \App\Order::STATUS_PROCESSING)
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-clock" ></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Pending</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-check"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Confirmed</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-user"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat"> Picked by courier</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-truck"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">On the way</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-box"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Deliverd</p>
                                        </div>
                                    </div>
                                @elseif ( $order->order_status == \App\Order::STATUS_COMPLETE)
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-clock" ></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Pending</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-check"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Confirmed</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-user"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat"> Picked by courier</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-truck"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">On the way</p>
                                        </div>
                                    </div>
                                    <div class="order-track-step active">
                                        <div class="order-track-status">
                                    <span class="order-track-status-dot">
                                        <i class="fa fa-box"></i>
                                    </span>
                                            <span class="order-track-status-line"></span>
                                        </div>
                                        <div class="order-track-text">
                                            <p class="order-track-text-stat">Order Deliverd</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <hr>
                            <ul class="row">
                                @if($order->products)
                                    @foreach($order->products as $row)
                                        <li class="col-md-4">
                                            <figure class="itemside mb-3">
                                                <div class="aside"><img src="{{productImage('uploads/products/'.$row)}}" class="img-sm border"></div>
                                                <figcaption class="info align-self-center">
                                                    <p class="title">{{$row->name}}</p>
                                                </figcaption>
                                            </figure>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <hr> <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
                        </div>
                    </article>
                </div>
            </div>

    </main>
@stop

@section('script')
@stop

