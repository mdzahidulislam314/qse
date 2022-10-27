@extends('admin.layouts.master')

@section('website_setup') active pcoded-trigger @stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Payment Method</h5>
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
                            <div class="col-md-8 offset-md-2">
                                <form class="custom-validation" action="{{route('store-settings')}}" method="POST" >
                                    @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">COD</h4>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="cod_title" value="{{$settings['cod_title'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="ckeditor" name="cod_desc">{{$settings['cod_desc'] ?? ''}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label d-block">Active</label>
                                            <input type="checkbox" class="js-switch" name="cod_status" {{array_key_exists('cod_status', $settings) && $settings['cod_status'] == 1 ? 'checked' : ''}}/>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Bkash</h4>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="bkash_title" value="{{$settings['bkash_title'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="ckeditor" name="bkash_desc">{{$settings['bkash_desc'] ?? ''}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label d-block">Active</label>
                                            <input type="checkbox" class="js-switch" name="bkash_status" {{array_key_exists('bkash_status', $settings) && $settings['bkash_status'] == 1 ? 'checked' : ''}}/>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Nagad</h4>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="nagad_title" value="{{$settings['nagad_title'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="ckeditor" name="nagad_desc">{{$settings['nagad_desc'] ?? ''}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label d-block">Active</label>
                                            <input type="checkbox" class="js-switch" name="nagad_status" {{array_key_exists('nagad_status', $settings) && $settings['nagad_status'] == 1 ? 'checked' : ''}}/>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Rocket</h4>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="rocket_title" value="{{$settings['rocket_title'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="ckeditor" name="rocket_desc">{{$settings['rocket_desc'] ?? ''}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label d-block">Active</label>
                                            <input type="checkbox" class="js-switch" name="rocket_status" {{array_key_exists('rocket_status', $settings) && $settings['rocket_status'] == 1 ? 'checked' : ''}}/>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    Update
                                                </button>
                                            </div>
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
@stop

@push('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
