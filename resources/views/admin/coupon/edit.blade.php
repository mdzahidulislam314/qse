@extends('admin.layouts.master')
@section('marketing') active pcoded-trigger @stop
@section('content')

    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Blogs</h5>
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
                                        <a href="{{route('coupons.index')}}" class="btn btn-primary btn-round">  <i class="fas fa-list-ul"></i>View Coupon</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <div class="col-6">
                                            <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-wrapper">
                                                    <div class="form-group">
                                                        <label class="form-label">Coupon Code</label>
                                                        <input type="text" class="form-control" name="code" value="{{ $coupon->code }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label d-block">Coupon Type</label>
                                                        <select name="type" class="form-control">
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="Fixed" {{$coupon->type == 'Fixed' ? 'selected' : ''}}>Fixed</option>
                                                            <option value="Percent" {{$coupon->type == 'Percent' ? 'selected' : ''}}>Percent</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Value (fixed amount)</label>
                                                        <input type="text" class="form-control" name="value" value="{{ $coupon->value }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Percent (%)</label>
                                                        <input type="text" class="form-control" name="percent_off" value="{{ $coupon->percent_off }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label d-block">Status</label>
                                                        <input type="checkbox" class="js-switch" name="status" {{$coupon->status == true ? 'checked' : ''}}/>
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
    </div>
    <div id="styleSelector">
    </div>

@stop

@push('scripts')

    <script>
        function deleteTable(id) {
            if(confirm("Do you want to delete this item?")) {
                document.getElementById('delete-form-'+id).submit();
                toastr.success('Deleted!', "")
            }
        }
    </script>

@endpush