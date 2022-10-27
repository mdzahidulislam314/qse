@extends('admin.layouts.master')
@section('marketing') active pcoded-trigger @stop
@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Coupons</h5>
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
                            <div class="col-sm-7">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Code</th>
                                                    <th>Type</th>
                                                    <th>value</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($coupons as $coupon)
                                                        <tr>
                                                            <td>{{$loop->index+ 1}}</td>
                                                            <td>{{$coupon->code}}</td>
                                                            <td>{{$coupon->type}}</td>
                                                            <td>
                                                                @if ($coupon->percent_off === null)
                                                                    Tk.{{$coupon->value}}
                                                                @else
                                                                    % {{$coupon->percent_off}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="js-switch" id="statusChange" data-id="{{$coupon->id}}" {{$coupon->status === 1 ? 'checked' : ''}}/>
                                                            </td>
                                                            <td class="table-action d-flex align-items-center">
                                                                <a href="{{ route('coupons.edit', $coupon->id) }}">
                                                                    <i class="icon feather icon-edit f-w-600 f-16 text-c-green"></i>
                                                                </a>
                                                                <a class="ml-3 confirm-delete" href="javascript:void(0);" data-href="{{route('coupons.destroy', $coupon->id)}}">
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
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('coupons.store') }}" method="POST">
                                            @csrf
                                            <div class="form-wrapper">
                                                <div class="form-group">
                                                    <label class="form-label">Coupon Code</label>
                                                    <input type="text" class="form-control" name="code" value="{{ old('code') }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label d-block">Coupon Type</label>
                                                    <select name="type" class="form-control">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="Fixed">Fixed</option>
                                                        <option value="Percent">Percent</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Value (fixed amount)</label>
                                                    <input type="text" class="form-control" name="value" value="{{ old('value') }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Percent (%)</label>
                                                    <input type="text" class="form-control" name="percent_off" value="{{ old('percent_off') }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label d-block">Status</label>
                                                    <input type="checkbox" class="js-switch" name="status"/>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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

@endpush