
@extends('layouts.master')

@section('title', 'My Profile')

@section('css')
   <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')
   <!-- Start of Main -->
   <main class="main">
      <!-- Start of Page Header -->
      <div class="page-header">
         <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
         </div>
      </div>
      <!-- End of Page Header -->

      <!-- Start of Breadcrumb -->
      <nav class="breadcrumb-nav mb-10">
         <div class="container">
            <ul class="breadcrumb">
               <li><a href="demo1.html">Home</a></li>
               <li>My account</li>
            </ul>
         </div>
      </nav>
      <!-- End of Breadcrumb -->

      <!-- Start of PageContent -->
      <div class="page-content pt-2 my-account">
         <div class="container">
            @if (session()->has('success_message'))
               <div class="alert alert-success">
                  {{ session()->get('success_message') }}
               </div>
            @endif

            @if(count($errors) > 0)
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            @endif
            <div class="tab tab-vertical row gutter-lg">
               <ul class="nav nav-tabs mb-6" role="tablist">
                  <li class="nav-item">
                     <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                  </li>
                  <li class="nav-item">
                     <a href="#account-orders" class="nav-link">Orders</a>
                  </li>
                  <li class="nav-item">
                     <a href="#account-details" class="nav-link">Account details</a>
                  </li>
                  <li class="link-item">
                     <a href="{{route('wishlist.index')}}">Wishlist</a>
                  </li>
                  <li class="link-item">
                     <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  </li>
               </ul>

               <div class="tab-content mb-6">
                  <div class="tab-pane active in" id="account-dashboard">
                     <p class="greeting">
                        Hello
                        <span class="text-dark font-weight-bold">{{Auth::user()->name}}</span>
                     </p>

                     <p class="mb-4">
                        From your account dashboard you can view your
                        <a href="#account-orders" class="text-primary link-to-tab">recent orders</a>,and
                        <a href="#account-details" class="text-primary link-to-tab">edit your password and
                           account details.</a>
                     </p>

                     <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                           <a href="#account-orders" class="link-to-tab">
                              <div class="icon-box text-center">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                 <div class="icon-box-content">
                                    <p class="text-uppercase mb-0">Orders</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                           <a href="#account-details" class="link-to-tab">
                              <div class="icon-box text-center">
                                 <span class="icon-box-icon icon-account">
                                     <i class="w-icon-user"></i>
                                 </span>
                                 <div class="icon-box-content">
                                    <p class="text-uppercase mb-0">Account Details</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                           <a href="{{route('wishlist.index')}}" class="link-to-tab">
                              <div class="icon-box text-center">
                                 <span class="icon-box-icon icon-wishlist">
                                     <i class="w-icon-heart"></i>
                                 </span>
                                 <div class="icon-box-content">
                                    <p class="text-uppercase mb-0">Wishlist</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                           <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <div class="icon-box text-center">
                                 <span class="icon-box-icon icon-logout">
                                     <i class="w-icon-logout"></i>
                                 </span>
                                 <div class="icon-box-content">
                                    <p class="text-uppercase mb-0">Logout</p>
                                 </div>
                              </div>
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                           </form>
                        </div>
                     </div>
                  </div>

                  <div class="tab-pane mb-4" id="account-orders">
                     <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                        <div class="icon-box-content">
                           <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                        </div>
                     </div>
                     @if ($orders->count() > 0)
                        <table class="shop-table account-orders-table mb-6">
                           <thead>
                           <tr>
                              <th class="order-id">Order</th>
                              <th class="order-date">Date</th>
                              <th class="order-status">Status</th>
                              <th class="order-total">Total</th>
                              <th class="order-actions">Actions</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach ($orders as $order)
                              <tr>
                                 <td class="order-id">{{ $order->order_id }}</td>
                                 <td class="order-date">{{ presentDate($order->created_at) }}</td>
                                 <td class="order-status">
                                    @php echo $order->statusHtml() @endphp
                                 </td>
                                 <td class="order-total">{{ presentPrice($order->billing_total) }}</td>
                                 <td class="order-action">
                                    <a href="{{ route('orders.show', $order->id) }}"  class="btn btn-outline btn-default btn-block btn-sm btn-rounded">Views Invoice</a>
                                 </td>
                              </tr>
                           @endforeach
                           </tbody>
                        </table>
                     @else
                        <p>No order has been made yet.</p>
                        <a href="{{route('shop.index')}}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                     @endif

                     <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                        Shop<i class="w-icon-long-arrow-right"></i></a>
                  </div>

                  <div class="tab-pane" id="account-details">
                     <div class="icon-box icon-box-side icon-box-light">
                        <span class="icon-box-icon icon-account mr-2">
                            <i class="w-icon-user"></i>
                        </span>
                        <div class="icon-box-content">
                           <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                        </div>
                     </div>
                     <form action="{{ route('users.update') }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="firstname">Full name *</label>
                                 <input type="text" id="firstname" name="name" value="{{ old('name', $user->name) }}" class="form-control form-control-md">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="phone">Phone *</label>
                                 <input type="text" id="phone" name="phone" value="{{ old('name', $user->phone) }}"
                                        class="form-control form-control-md">
                              </div>
                           </div>
                        </div>
                        <div class="form-group mb-6">
                           <label for="email">Email address *</label>
                           <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control form-control-md">
                        </div>
                        <div class="form-group mb-6">
                           <label for="dob">Date of barth *</label>
                           <input type="email" id="dob" name="dob"  value="{{ old('dob', $user->dob) }}" class="form-control form-control-md">
                        </div>
                        <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>

                        <div class="form-group">
                           <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                           <input type="password" class="form-control form-control-md"
                                  id="new-password" name="password">
                        </div>
                        <div class="form-group mb-10">
                           <label class="text-dark" for="conf-password">Confirm Password</label>
                           <input type="password" class="form-control form-control-md"
                                  id="conf-password" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End of PageContent -->
   </main>
   <!-- End of Main -->
@stop

@section('js')

@stop
