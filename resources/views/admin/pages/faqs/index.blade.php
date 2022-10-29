@extends('admin.layouts.master')
@section('pages') active pcoded-trigger @stop
@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>FAQs</h5>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th >Name</th>
                                                    <th >Order</th>
                                                    <th >Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($pages as $row)
                                                    <tr>
                                                        <td>{{ $row->title }}</td>
                                                        <td>{{ $row->order_by  }}</td>
                                                        <td>
                                                            <a href="{{ route('faqs.edit', $row->id) }}">
                                                                <i class="icon feather icon-edit f-w-600 f-16 text-c-green"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" data-href="{{route('faqs.destroy', $row->id)}}" class="text-danger ml-3 confirm-delete">
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('faqs.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="validationCustom03">Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title" id="validationCustom03">
                                            </div>
                                            <div class="form-group">
                                                <label>Order By<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="order_by">
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom03">Description<span class="text-danger">*</span></label>
                                                <textarea class="ckeditor" name="desc"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label d-block">Active</label>
                                                <input type="checkbox" class="js-switch" name="is_active"/>
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
    @include('admin.modals.delete_modal')
@stop

@push('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });

</script>
@endpush