@extends('admin.layouts.master')
@section('products') active pcoded-trigger @stop

@section('css')

@stop

@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Add Product</h5>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <a href="{{route('products.index')}}" class="btn btn-primary btn-round waves-effect waves-light"><i class="fa fa-bars"></i>Products List</a>
                                    </div>
                                </div>
                                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row font-bold">
                                        <div class="col-md-7">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Product Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="name" id="name" required value="{{old('name')}}">
                                                        <span class="messages"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom03">Quantity<span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="quantity" id="validationCustom03" required value="{{old('quantity')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom03">Selling Price<span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="price" id="validationCustom03" required value="{{old('price')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Discount Price</label>
                                                        <input type="number" class="form-control" name="spacial_price" value="{{old('spacial_price')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Video Link</label>
                                                        <input type="link" class="form-control" name="video_link" value="{{old('video_link')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="validationCustom03">Specification<span class="text-danger">*</span></label>
                                                        <textarea class="ckeditor" name="details">{{old('details')}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Long Description</label>
                                                        <textarea class="ckeditor" name="description" cols="3">{{old('description')}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="control-label">Brands</label>
                                                        <select class="form-control select2" name="brand_id" id="getBrand">
                                                            <option value=''>Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group mb-1">
                                                        <label for="image">Main Image<span class="text-danger">*</span> <small class=""> (462 x 462)</small></label>
                                                        <div class="file-input">
                                                            <input type="file" name="image" id="image" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview1')"/>
                                                            <label class="file-input__label" for="image">
                                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                    <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                                </svg>
                                                                <span>Upload file</span></label>
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
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="validationCustom03">Additional Image <small class=""> (462 x 462)</small></label>
                                                    </div>
                                                    <div class="file-input">
                                                        <input type="file" name="file-input" id="file-input" class="file-input__input" onchange="showAltImg(event, '#alt_img_show', 'pro_alt_temp_img')" multiple/>
                                                        <label class="file-input__label" for="file-input">
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                            </svg>
                                                            <span>Upload file</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div id="alt_img_show" class="d-flex align-items-center flex-wrap"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="meta_title" class="col-form-label">Meta Title</label>
                                                        <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{old('meta_title')}}">
                                                        <span class="messages"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="meta_description">Meta Description</label>
                                                        <textarea class="form-control" name="meta_description" id="meta_description" cols="3">{{old('meta_description')}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="meta_keywords">Meta Keywords</label>
                                                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" cols="3">{{old('meta_keywords')}}</textarea>
                                                        <small>Separate with coma</small>
                                                    </div>
                                                    <div class="form-group mb-1">
                                                        <label for="meta_image">Meta image</label>
                                                        <div class="file-input">
                                                            <input type="file" name="meta_image" id="meta_image" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview')"/>
                                                            <label class="file-input__label" for="meta_image">
                                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                    <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                                </svg>
                                                                <span>Upload file</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="d-flex align-items-center flex-wrap">
                                                            <span class="pip d-none">
                                                                <img class="imageThumb" id="ImgPreview" src="">
                                                                <span class="remove" id="removeImage1" onclick="removeSingleImage('ImgPreview','meta_image')">
                                                                    Remove
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="product_status ">
                                                        <div class="form-group">
                                                            <label class="form-label d-block">Status</label>
                                                            <input type="checkbox" class="js-switch" name="is_enable"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label d-block">Featured</label>
                                                            <input type="checkbox" class="js-switch" name="featured"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="card sticky-save-btn">
                                                <div class="card-body">
                                                    <div class="button-items text-right">
                                                        <a href="{{route('products.index')}}" class="btn btn-warning w-lg waves-effect waves-light">Cancel</a>
                                                        <button type="submit" class="btn btn-info w-lg waves-effect waves-light">Save Now</button>
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
        </div>
    </div>
    <div id="styleSelector">
    </div>
@stop

@push('scripts')
    <!-- Date-dropper js -->
    <script type="text/javascript" src="/admin/bower_components/datedropper/js/datedropper.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <!--Dynamic Brand Dreopdown in ajax -->
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function(){
            $( "#getBrand" ).select2({
                ajax: {
                    url: "{{route('get.brands')}}",
                    type: "post",
                    dataType: 'json',
                    delay: 150,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
    <script type="text/javascript">
        window.alt_tmp_img_up = '{{ url('admin/product-images') }}';
        window.alt_tmp_img_remove = '{{ url('admin/product-images-remove') }}';
        window.delete_alt_img_by_id = '{{ url('admin/product-images-delete') }}';
    </script>
@endpush
