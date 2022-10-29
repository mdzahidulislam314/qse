@extends('admin.layouts.master')
@section('sliders') active @stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Edit Slider</h5>
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
                                        <a href="{{route('sliders.index')}}" class="btn btn-primary btn-round waves-effect waves-light"><i class="fa fa-list"></i> Sliders List</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{ route('sliders.update', $slider) }}" method="POST"  enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="title">Image Url</label>
                                                                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ $slider->image_url ?? '' }}"/>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="orders">Title</label>
                                                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                                       id="title" name="title" value="{{ $slider->title ?? '' }}"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea class="ckeditor" name="description" cols="3">{{$slider->description}}</textarea>
                                                            </div>
                                                            <div class="form-group mb-1">
                                                                <label for="validationCustom03">Slider image <span class="text-danger">*</span> <small class=""> (1920 x 1280)</small></label>
                                                                <div class="file-input">
                                                                    <input type="file" name="image" id="image" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview')"/>
                                                                    <label class="file-input__label" for="image">
                                                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                            <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                                        </svg>
                                                                        <span>Upload file</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div id="alt_img_show" class="d-flex align-items-center flex-wrap">
                                                                    <span class="pip">
                                                                        <img class="imageThumb" id="ImgPreview" src="{{ asset($slider->image) ?? '' }}">
                                                                        <span class="remove" onclick="removeSingleImage('ImgPreview','image')" >
                                                                            Remove
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label d-block">Active</label>
                                                                <input type="checkbox" class="js-switch" name="status" {{isset($slider->status) && $slider->status === 1 ? 'checked' : '' }}/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Update</button>
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
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>

@endpush
