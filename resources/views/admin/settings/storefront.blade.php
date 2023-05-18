@extends('admin.layouts.master')

@section('website_setup') active pcoded-trigger @stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Appearance</h5>
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
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">General</h4>
                                        <form class="custom-validation" action="{{route('store-settings')}}" method="POST" >
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-4">Website Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="name" value=" {{ get_setting('name') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Site Motto</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="site_moto" value="{{ get_setting('site_moto') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Site Email</label>
                                                <div class="col-md-8">
                                                    <input type="email" class="form-control" name="email" value="{{ get_setting('email') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Phone</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="phone" value="{{ get_setting('phone') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Office Time</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="office_time" value="{{ get_setting('office_time') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0 float-right">
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Footer</h4>
                                        <form action="{{route('store-settings')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-4">Copyright Text </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="footertext" value="{{ get_setting('footertext') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Footer Text </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="footer_text" value="{{ get_setting('footer_text') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Address</label>
                                                <div class="col-md-8">
                                                    <textarea rows="2" class="form-control" id="example-text-input" name="address" >{{ get_setting('address') }}</textarea>
                                                </div>
                                            </div>
{{--                                            <div class="form-group row">--}}
{{--                                                <label class="col-md-4">Payment Image</label>--}}
{{--                                                <div class="col-md-8">--}}
{{--                                                    <div class="file-input">--}}
{{--                                                        <input type="file" name="pay_method_img" id="pay_method_img" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview')"/>--}}
{{--                                                        <label class="file-input__label" for="pay_method_img">--}}
{{--                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}
{{--                                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>--}}
{{--                                                            </svg>--}}
{{--                                                            <span>Upload file</span>--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex align-items-center flex-wrap">--}}
{{--                                                        <span class="pip">--}}
{{--                                                            <img class="imageThumb" id="ImgPreview" src="{{ asset( get_setting('pay_method_img')) }}">--}}
{{--                                                        </span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="form-group row mb-0 float-right">
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Global SEO</h4>
                                        <form action="{{route('store-settings')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-4">Meta Title</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="meta_title" value="{{get_setting('meta_title') ?? ''}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Meta description</label>
                                                <div class="col-md-8">
                                                    <textarea rows="2" class="form-control" id="example-text-input" name="meta_description" >{{get_setting('meta_description') ?? ''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Keywords</label>
                                                <div class="col-md-8">
                                                    <textarea rows="2" class="form-control" id="example-text-input" name="meta_keywords" placeholder="keyword,keyword">{{get_setting('meta_keywords') ?? ''}}</textarea>
                                                    <small class="text-muted">Separate with coma</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4">Meta Image</label>
                                                <div class="col-md-8">
                                                    <div class="file-input">
                                                        <input type="file" name="meta_img" id="meta_img" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview1')"/>
                                                        <label class="file-input__label" for="meta_img">
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                            </svg>
                                                            <span>Upload file</span>
                                                        </label>
                                                    </div>
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <span class="pip">
                                                            <img class="imageThumb" id="ImgPreview1" src="{{ asset( get_setting('meta_img')) }}">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0 float-right">
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('store-settings')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Site Favicon <small class="text-warning">(size 80 x 80)</small></label>
                                                        <div class="">
                                                            <div class="file-input">
                                                                <input type="file" name="favicon" id="favicon" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview2')"/>
                                                                <label class="file-input__label" for="favicon">
                                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                        <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                                    </svg>
                                                                    <span>Upload file</span>
                                                                </label>
                                                            </div>
                                                            <div class="d-flex align-items-center flex-wrap">
                                                                <span class="pip">
                                                                    <img class="imageThumb" id="ImgPreview2" src="{{ asset( get_setting('favicon')) }}">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group ">
                                                        <label>Site Logo <small class="text-warning">( size 144 x 45 )</small></label>
                                                        <div class="">
                                                            <div class="file-input">
                                                                <input type="file" name="header_logo" id="header_logo" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview3')"/>
                                                                <label class="file-input__label" for="header_logo">
                                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                        <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                                    </svg>
                                                                    <span>Upload file</span>
                                                                </label>
                                                            </div>
                                                            <div class="d-flex align-items-center flex-wrap">
                                                        <span class="pip">
                                                            <img class="imageThumb" id="ImgPreview3" src="{{ asset( get_setting('header_logo')) }}">
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
{{--                                                <div class="col-md-4">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>Footer Logo <small class="text-warning">( size 170 x 70 )</small></label>--}}
{{--                                                        <div class="">--}}
{{--                                                            <div class="file-input">--}}
{{--                                                                <input type="file" name="footer_logo" id="footer_logo" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview4')"/>--}}
{{--                                                                <label class="file-input__label" for="footer_logo">--}}
{{--                                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}
{{--                                                                        <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>--}}
{{--                                                                    </svg>--}}
{{--                                                                    <span>Upload file</span>--}}
{{--                                                                </label>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="d-flex align-items-center flex-wrap">--}}
{{--                                                        <span class="pip">--}}
{{--                                                            <img class="imageThumb" id="ImgPreview4" src="{{ asset( get_setting('footer_logo')) }}">--}}
{{--                                                        </span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="form-group mb-0 float-right">
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Social Link</h4>
                                        <form class="custom-validation" action="{{route('store-settings')}}" method="POST" >
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-4">Youtube</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="youtube" value="{{get_setting('youtube')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Facebook Link</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control"name="facebook" value="{{get_setting('facebook')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Twitter</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="twitter" value="{{get_setting('twitter')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Map</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="map_code" value="{{get_setting('map_code')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0 float-right">
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Features</h4>
                                        <form action="{{route('store-settings')}}" method="POST" >
                                            @csrf
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="feature_title_1" value="{{$settings['feature_title_1'] ?? ''}}"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Subtitle</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="feature_subt_1" value="{{$settings['feature_subt_1'] ?? ''}}"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2">Icon <small class="text-warning">( SVG format )</small></label>
                                                <div class="col-md-10">
                                                    <div class="file-input">
                                                        <input type="file" name="feature_icon_1" id="feature_icon_1" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview5')"/>
                                                        <label class="file-input__label" for="feature_icon_1">
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                            </svg>
                                                            <span>Upload file</span>
                                                        </label>
                                                    </div>
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <span class="pip">
                                                            <img class="imageThumb" id="ImgPreview5" src="{{ asset( get_setting('feature_icon_1')) }}">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="feature_title_2" value="{{$settings['feature_title_2'] ?? ''}}"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Subtitle</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="feature_subt_2" value="{{$settings['feature_subt_2'] ?? ''}}"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2">Icon <small class="text-warning">( SVG format )</small></label>
                                                <div class="col-md-10">
                                                    <div class="file-input">
                                                        <input type="file" name="feature_icon_2" id="feature_icon_2" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview6')"/>
                                                        <label class="file-input__label" for="feature_icon_2">
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                            </svg>
                                                            <span>Upload file</span>
                                                        </label>
                                                    </div>
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <span class="pip">
                                                            <img class="imageThumb" id="ImgPreview6" src="{{ asset( get_setting('feature_icon_2')) }}">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="feature_title_3" value="{{$settings['feature_title_3'] ?? ''}}"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Subtitle</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="feature_subt_3" value="{{$settings['feature_subt_3'] ?? ''}}"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2">Icon <small class="text-warning">( SVG format )</small></label>
                                                <div class="col-md-10">
                                                    <div class="file-input">
                                                        <input type="file" name="feature_icon_3" id="feature_icon_3" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview7')"/>
                                                        <label class="file-input__label" for="feature_icon_3">
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                            </svg>
                                                            <span>Upload file</span>
                                                        </label>
                                                    </div>
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <span class="pip">
                                                            <img class="imageThumb" id="ImgPreview7" src="{{ asset( get_setting('feature_icon_3')) }}">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="feature_title_4" value="{{$settings['feature_title_4'] ?? ''}}"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Subtitle</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="feature_subt_4" value="{{$settings['feature_subt_4'] ?? ''}}"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2">Icon <small class="text-warning">( SVG format )</small></label>
                                                <div class="col-md-10">
                                                    <div class="file-input">
                                                        <input type="file" name="feature_icon_4" id="feature_icon_4" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview8')"/>
                                                        <label class="file-input__label" for="feature_icon_4">
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                            </svg>
                                                            <span>Upload file</span>
                                                        </label>
                                                    </div>
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <span class="pip">
                                                            <img class="imageThumb" id="ImgPreview8" src="{{ asset( get_setting('feature_icon_4')) }}">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0 float-right">
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
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
@stop

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
@endpush
