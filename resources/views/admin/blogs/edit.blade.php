@extends('admin.layouts.master')
@section('blog') active pcoded-trigger @stop
@section('css')
    <link href="/admin/vendor/dropify/css/dropify.css"  rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4 class="mb-0">Edit Blog</h4>
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
                <div class="page-wrapper mb-5">
                    <div class="page-body">
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-block">
                                            <a href="{{route('blogs.index')}}" class="btn btn-primary btn-round"><i class="fas fa-list-ul"></i>  View List</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="col-sm-6">
                                                <div class="form-wrapper">
                                                        <div class="form-group">
                                                            <label class="form-label">Title</label>
                                                            <input type="text" class="form-control" name="title" value="{{ $blog->title }}" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label d-block">Category</label>
                                                            <select name="cat_id" class="form-control">
                                                                <option value="" selected disabled>Select</option>
                                                                @foreach($categories as $row)
                                                                    <option value="{{$row->id}}" {{$blog->cat_id == $row->id ? 'selected' : ''}}>{{$row->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="validationCustom03">Description<span class="text-danger">*</span></label>
                                                            <textarea class="ckeditor" name="description" rows="2">{{ $blog->content }}</textarea>
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="validationCustom03">Blog image</label>
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
                                                                    <img class="imageThumb" id="ImgPreview" src="{{ asset($blog->image) ?? '' }}">
                                                                    <span class="remove" onclick="removeSingleImage('ImgPreview','image')" >
                                                                        Remove
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label d-block">Active</label>
                                                            <input type="checkbox" class="js-switch" name="is_active" {{$blog->is_active == true ? 'checked' : ''}}/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="meta_title" class="col-form-label">Meta Title</label>
                                                            <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $blog->meta_title }}">
                                                            <span class="messages"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="meta_description">Meta Description</label>
                                                            <textarea class="form-control" name="meta_description" id="meta_description" cols="3">{{ $blog->meta_description }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="meta_keywords">Meta Keywords</label>
                                                            <textarea class="form-control" name="meta_keywords" id="meta_keywords" cols="3">{{ $blog->meta_keywords }}</textarea>
                                                            <small>Separate with coma</small>
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="validationCustom03">Meta image</label>
                                                            <div class="file-input">
                                                                <input type="file" name="meta_img" id="meta_img" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview1')"/>
                                                                <label class="file-input__label" for="meta_img">
                                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                        <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                                    </svg>
                                                                    <span>Upload file</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-flex align-items-center flex-wrap">
                                                                <span class="pip">
                                                                    <img class="imageThumb" id="ImgPreview1" src="{{ asset($blog->meta_img) ?? '' }}">
                                                                    <span class="remove" onclick="removeSingleImage('ImgPreview1','meta_img')" >
                                                                        Remove
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card sticky-save-btn">
                                        <div class="card-body">
                                            <div class="button-items text-right">
                                                <a href="{{route('pages.index')}}" class="btn btn-warning w-lg waves-effect waves-light">Cancel</a>
                                                <button type="submit" class="btn btn-info w-lg waves-effect waves-light">Update</button>
                                            </div>
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
    <div id="styleSelector">
    </div>
@stop

@push('scripts')
    <script src="/admin/vendor/dropify/js/dropify.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        function deleteTable(id) {
            if(confirm("Do you want to delete this item?")) {
                document.getElementById('delete-form-'+id).submit();
                toastr.success('Deleted!', "")
            }
        }

        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

    </script>

@endpush