@extends('admin.layouts.master')

@section('marketing') active pcoded-trigger @stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Flash deals</h5>
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
                                        <a href="{{route('flashdeals.create')}}" class="btn btn-primary btn-round"><i class="fa fa-plus"></i>Add New</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Image</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th>Feature</th>
                                                    <th>Link</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($flashdeal as $row)
                                                    <tr>
                                                        <td>{{$row->title}}</td>
                                                        <td><img src="{{asset($row->image)}}" width="100px" height="50px"></td>
                                                        <td>{{ date('d-m-Y H:i:s', $row->start_date) }}</td>
                                                        <td>{{ date('d-m-Y H:i:s', $row->end_date) }}</td>
                                                        <td>
                                                            <input type="checkbox" class="js-switch" id="statusChange" data-id="{{$row->id}}" {{$row->is_active === 1 ? 'checked' : ''}}/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" class="js-switch" id="statusChange" data-id="{{$row->id}}" {{$row->is_feature === 1 ? 'checked' : ''}}/>
                                                        </td>
                                                        <td>
                                                            {{ \Illuminate\Support\Facades\URL::to('/').'/flash-deals/' .$row->slug }}
                                                        </td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('flashdeals.edit', $row->id) }}">
                                                                <i class="icon feather icon-edit f-w-600 f-16 m-r-10 text-c-green"></i>
                                                            </a>
                                                            <form id="delete-form-{{$row->id}}"
                                                                  action="{{ route('flashdeals.destroy', $row->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a class="text-danger ml-2 confirm-delete"
                                                               href="javascript:void(0);" data-href="{{route('flashdeals.destroy', $row->id)}}">
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
    <script src="/admin/assets/js/pages/form-wizard.init.js"></script>
@endpush