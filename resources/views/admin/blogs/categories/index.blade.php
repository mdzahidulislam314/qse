@extends('admin.layouts.master')
@section('blog') active pcoded-trigger @stop
@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Blog Category</h5>
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
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cat as $row)
                                                    <tr>
                                                        <td>{{$loop->index+ 1}}</td>
                                                        <td>{{$row->name}}</td>
                                                        <td>
                                                            <input type="checkbox" class="js-switch" id="statusChange" data-id="{{$row->id}}" {{$row->is_active === 1 ? 'checked' : ''}}/>
                                                        </td>
                                                        <td class="table-action d-flex align-items-center">
                                                            <a href="{{ route('blogscategories.edit', $row->id) }}">
                                                                <i class="icon feather icon-edit f-w-600 f-16 text-c-green"></i></a>
                                                            <a class="ml-3 confirm-delete" href="#" data-href="{{route('blogscategories.destroy', $row->id)}}">
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
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('blogscategories.store') }}" method="POST">
                                            @csrf
                                            <div class="form-wrapper">
                                                <div class="form-group">
                                                    <label class="form-label">Category Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label d-block">Active</label>
                                                    <input type="checkbox" class="js-switch" />
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