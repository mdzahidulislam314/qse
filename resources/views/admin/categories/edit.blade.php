@extends('admin.layouts.master')
@section('products') active pcoded-trigger @stop

@section('css')
    <style>
        .dropify-wrapper {
            width: 40%;
            height: 130px;
        }
    </style>
@stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Categories</h5>
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
                                        <a href="{{route('categories.index')}}" class="btn btn-primary btn-round">
                                            <i class="fas fa-list-ul"></i> List Categories</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $model->name }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Parent category</label>
                                                        <select name="parent_id" class="form-control select2" id="mySelect2" {{ $model->parent_id == null ? 'disabled' : ''}}>
                                                            <option selected disabled>Select Parent</option>
                                                            @foreach($cat_parents as $cat)
                                                                <option value="{{ $cat->id }}" {{ ($cat->id == $model->parent_id) ? 'selected' : ''}} {{ ($cat->id == $model->id) ?
                                                    'disabled' : ''}}>{{ $cat->name }}</option>
                                                                @if($cat->children()->count())
                                                                    @foreach($cat->children as $child)
                                                                        <option value="{{ $child->id }}" {{ ($child->id == $model->parent_id) ? 'selected' : ''}} {{ ($child->id == $model->id) ?
                                                    'disabled' : ''}}>&nbsp;&nbsp;
                                                                            &nbsp;-{{ $child->name }}</option>
                                                                        @if($child->children()->count())
                                                                            @foreach($child->children as $innerChild)
                                                                                <option value="{{ $innerChild->id }}" {{ ($innerChild->id == $model->parent_id) ? 'selected' :
                                                                    ''}} disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--{{ $innerChild->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <button type="button" class="btn btn-warning btn-sm mt-2" id="clearSelect2">Clear</button>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Meta Title</label>
                                                        <input type="text" class="form-control" name="meta_title" value="{{ $model->meta_title ?? '' }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Meta Description</label>
                                                        <textarea class="form-control" name="meta_description" cols="3">{{ $model->meta_description ?? '' }}</textarea>
                                                    </div>
                                                    <div class="form-group mb-1">
                                                        <label for="validationCustom03">Category image <small> (150 x 140)</small></label>
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
                                                                <img class="imageThumb" id="ImgPreview" src="{{ asset($model->image) ?? '' }}">
                                                                <span class="remove" onclick="removeSingleImage('ImgPreview','image')" >
                                                                    Remove
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label d-block">Active</label>
                                                        <input type="checkbox" class="js-switch" name="status" {{$model->status == 1 ? 'checked' : ''}}/>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary" name="submit_save" value="save">Update</button>
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
    <script>
        $(function () {
            $('.dropify').dropify();
            function clearSelectedOptions() {
                $('#mySelect2').val(null).trigger('change');
            }
            $("#clearSelect2").on("click", clearSelectedOptions);

        })
    </script>

@endpush