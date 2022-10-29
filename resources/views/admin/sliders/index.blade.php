@extends('admin.layouts.master')

@section('website_setup') active pcoded-trigger @stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Sliders</h5>
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
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Image Url</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($sliders as $slider)
                                                    <tr>
                                                        <td><img src="{{asset($slider->image)}}" width="100px" height="50px"></td>
                                                        <td>{{$slider->title}}</td>
                                                        <td>{{$slider->image_url}}</td>
                                                        <td>
                                                            <input type="checkbox" class="js-switch" id="statusChange" data-id="{{$slider->id}}" {{$slider->status === 1 ? 'checked' : ''}}/>
                                                        </td>
                                                        <td class="d-flex">
                                                            <a class="mr-3" href="{{ route('sliders.edit', $slider->id) }}">
                                                                <i class="icon feather icon-edit f-w-600 f-16 text-c-green"></i>
                                                            </a>
                                                            <form id="delete-form-{{$slider->id}}"
                                                                  action="{{ route('sliders.destroy', $slider->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a class="text-danger" href="javascript:void(0);" onclick="deleteTable({{$slider->id}})">
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
                                        <form action="{{ route('sliders.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"/>

                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="ckeditor" name="description" cols="3">{{old('description')}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Image Url</label>
                                                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ old('image_url') }}"/>

                                            </div>
                                            <div class="form-group mb-1">
                                                <label for="image">Slider image<span class="text-danger">*</span> <small class=""> (940 x 509)</small></label>
                                                <div class="file-input">
                                                    <input type="file" name="image" id="image" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview1')"/>
                                                    <label class="file-input__label" for="image">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                        </svg>
                                                        <span>Upload file</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <span class="pip d-none">
                                                        <img class="imageThumb" id="ImgPreview1" src="">
                                                        <span class="remove" id="removeImage1" onclick="removeSingleImage('ImgPreview1','image')">
                                                            Remove
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label d-block">Active</label>
                                                <input type="checkbox" class="js-switch" name="status"/>
                                            </div>
                                            <button type="submit" class="btn btn-success">Save</button>
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
@stop

@push('scripts')
<script src="/admin/assets/js/pages/form-wizard.init.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>

    $('body').on('change',"#statusChange",function () {
        var id = $(this).attr('data-id');

        if (this.checked){
            var status = 1;
        }else{
            var status = 0;
        }
        $.ajax({
            url:"/backpanel/slider-status/" + id + '/' + status,
            method:"GET",
            success:function (done) {
                console.log(done);
                toastr.success(done.message, '');
            }
        });
    })

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
            // confirmButtonText: 'Yes, delete it!'
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