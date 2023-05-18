@extends('admin.layouts.master')
@section('services') active pcoded-trigger @stop

@section('css')
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/pages.css">
@stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>{{$title ?? ''}}</h5>
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
                                        <a href="{{route('services.create')}}" class="btn btn-primary btn-round waves-effect waves-light"><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th width="5%">Sl</th>
                                                    <th width="10%">Photo</th>
                                                    <th >Name</th>
                                                    <th >Status</th>
                                                    <th >Feature</th>
                                                    <th >Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($services as $row)
                                                    <tr>
                                                        <td>{{$loop->index+ 1}}</td>
                                                        <td>
                                                            <div class="row gutters-5 w-200px w-md-300px mw-100">
                                                                <div class="col-auto">
                                                                    <img src="{{ asset(productImage($row->image))  }}" alt="Image" width="50" height="40">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $row->name }}</td>
                                                        <td>
                                                            <input type="checkbox" class="js-switch" id="statusChange" data-id="{{$row->id}}" {{$row->is_active === 1 ? 'checked' : ''}}/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" class="js-switch" id="featureChange" data-id="{{$row->id}}" {{$row->is_feature === 1 ? 'checked' : ''}}/>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('services.edit', $row->id) }}">
                                                                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
                                                            </a>
                                                            <a href="#" class="confirm-delete" data-href="{{ route('services.destroy', $row->id) }}">
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
    $(function () {
        $('body').on('change',"#statusChange",function () {
            var id = $(this).attr('data-id');
            if (this.checked){
                 var status = 1;
            }else{
                var status = 0;
            }
            $.ajax({
               url:"/admin/update-status/" + id + '/' + status,
               method:"GET",
               success:function (done) {
                   toastr.success(done.message, '');
               }
            });
        });

        $('body').on('change',"#featureChange",function () {
            var id = $(this).attr('data-id');
            if (this.checked){
                 var status = 1;
            }else{
                var status = 0;
            }
            $.ajax({
               url:"/admin/update-feature/" + id + '/' + status,
               method:"GET",
               success:function (done) {
                   toastr.success(done.message, '');
               }
            });
        });
    })
    // });
</script>

<script>
    function deleteTable(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't to delete this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    document.getElementById('delete-form-'+id).submit(),
                )
            }
        })
    }

</script>
@endpush