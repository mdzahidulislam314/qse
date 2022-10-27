@extends('admin.layouts.master')
@section('products') active pcoded-trigger @stop
@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Product Reviews</h5>
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
{{--                                    <div class="card-block">--}}
{{--                                        <a href="{{route('products.create')}}" class="btn btn-primary btn-round waves-effect waves-light">Add New</a>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Title</th>
                                                    <th>Content</th>
                                                    <th>Rating</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($reviews as $row)
                                                    <tr>
                                                        <td>{{$row->customer->name}}</td>
                                                        <td>{{$row->title}}</td>
                                                        <td>{{$row->massage}}</td>
                                                        <td>{{$row->rating}}</td>
                                                        <td>
                                                            <input type="checkbox" class="js-switch" id="statusChange" data-id="{{$row->id}}" {{$row->status === 1 ? 'checked' : ''}}/>
                                                        </td>
                                                        <td class="table-action d-flex align-items-center">
{{--                                                            <a href="{{ route('coupons.edit', $row->id) }}">--}}
{{--                                                                <i class="fa fa-eye f-w-600 f-16 m-r-15 text-c-success"></i>--}}
{{--                                                            </a>--}}
                                                            <a class="ml-3 confirm-delete" href="#" data-href="{{route('reviews.destroy', $row->id)}}">
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

    <script>

        //status change
        $('body').on('change',"#statusChange",function () {
            var id = $(this).attr('data-id');

            if (this.checked){
                var status = 1;
            }else{
                var status = 0;
            }
            $.ajax({
                url:"/backpanel/review-status/" + id + '/' + status,
                method:"GET",
                success:function (done) {
                    console.log(done);
                    toastr.success(done.message, '');
                }
            });
        })

    </script>

@endpush