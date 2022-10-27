@extends('admin.layouts.master')

@section('pages') active pcoded-trigger @stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Edit FAQs</h5>
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
                                        <a href="{{route('faqs.index')}}" class="btn btn-primary btn-round waves-effect waves-light"><i class="fa fa-list"></i> Pages List</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <form action="{{ route('faqs.update', $page->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label f>Title<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="title" required value="{{$page->title}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Order By<span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="order_by" value="{{$page->order_by}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom03">Description<span class="text-danger">*</span></label>
                                                        <textarea class="ckeditor" name="desc">{{$page->desc}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label d-block">Active</label>
                                                        <input type="checkbox" class="js-switch" name="is_active" {{$page->is_active === 1 ? 'checked' : ''}}/>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button type="submit" class="btn btn-success mr-2 waves-effect waves-light">Save</button>
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
    </div>
@stop

@push('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
