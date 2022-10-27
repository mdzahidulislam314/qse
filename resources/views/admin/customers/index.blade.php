@extends('admin.layouts.master')

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>{{$title}}</h5>
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($customers as $customer)
                                                    <tr>
                                                        <td>{{ $customer->id }}</td>
                                                        <td>{{ ($customer->name) }}</td>
                                                        <td>{{ ($customer->email) }}</td>
                                                        <td>
                                                            @if ($customer->isOnline())
                                                                <span class="text-success"><i class="fas fa-circle"></i> online</span>
                                                            @else
                                                                <span><i class="fas fa-circle"></i> offline</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-sm btn-primary">View Details</a>
                                                            {{--                                                <a class="btn btn-danger" type="button" onclick="deleteTable({{$customer->id}})">--}}
                                                            {{--                                                    Delete--}}
                                                            {{--                                                </a>--}}

                                                            {{--                                                <form id="delete-form-{{$customer->id}}"--}}
                                                            {{--                                                        action="{{ route('categories.destroy', $customer->id) }}" method="POST">--}}
                                                            {{--                                                    @csrf--}}
                                                            {{--                                                    @method('DELETE')--}}
                                                            {{--                                                </form>--}}
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