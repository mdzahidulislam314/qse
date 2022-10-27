@extends('admin.layouts.master')
@section('payment') active @stop

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Slider & Banner</h4>
                        <a href="{{route('sliders.create')}}" class="btn btn-info" id="btn-create"><i class="ri-add-fill"></i> Add Slider</a>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body  pt-0">
                            <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold p-3 active" href="{{route('sliders.index')}}">All Sliders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-3 font-weight-bold" href="{{route('sliders.create')}}">Add Slider</a>
                                </li>
                            </ul>

                            <div class="mt-5 mb-5">
                                <table id="datatable" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order Id</th>
                                        <th>transaction ID</th>
                                        <th>varified Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{$slider->orders}}</td>
                                            <td><img src="{{asset($slider->image)}}" width="100px" height="50px"></td>
                                            <td>{{$slider->image_url}}</td>
                                            <td>{{$slider->open_new_tab}}</td>
                                            <td>
                                                <input id="statusChange" type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="small"
                                                       data-id="{{$slider->id}}" {{$slider->status
                                                 === 1 ? 'checked' : ''}}>
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('sliders.edit', $slider->id) }}"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <form id="delete-form-{{$slider->id}}"
                                                      action="{{ route('sliders.destroy', $slider->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a class="text-danger" href="javascript:void(0);" onclick="deleteTable({{$slider->id}})">
                                                    <i class="mdi mdi-trash-can font-size-18"></i>
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
@stop

@push('scripts')
    <script src="/admin/assets/js/pages/form-wizard.init.js"></script>
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>

    <script>
        function deleteTable(id){

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        document.getElementById('delete-form-'+id).submit(),
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }

    </script>

@endpush