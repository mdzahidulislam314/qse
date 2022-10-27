@extends('admin.layouts.master')
@section('marketing') active pcoded-trigger @stop
@section('css')
    <link rel="stylesheet" href="/admin/assets/vendor/bootstrap-datetimepicker.min.css"/>
@stop
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
                <div class="page-wrapper mb-5">
                    <div class="page-body">
                        <form action="{{route('flashdeals.update', $flashdeal->id)}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <a href="{{route('flashdeals.index')}}" class="btn btn-primary btn-round waves-effect waves-light"> <i class="fa fa-list"></i>List Flash Deals</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">

                                            <div class="card-body pt-0">
                                                <div class="mt-5 mb-5">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">Title</label>
                                                                <input type="text" class="form-control" id="title" name="title" value="{{ $flashdeal->title }}"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="title">Start Date</label>
                                                                <input type="text" class="form-control sale-date" id="sale-date" name="start_date" value="{{ date('d-m-Y H:i:s', $flashdeal->start_date) }}"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="title">End Date</label>
                                                                <input type="text" class="form-control sale-date" id="sale-date" name="end_date" value="{{ date('d-m-Y H:i:s', $flashdeal->end_date) }}"/>
                                                            </div>
                                                            <div class="form-group mb-1">
                                                                <label for="validationCustom03">Banner image</label>
                                                                <div class="file-input">
                                                                    <input type="file" name="image" id="image" class="file-input__input" onchange="singleImagePreview(event,'ImgPreview')"/>
                                                                    <label class="file-input__label" for="image">
                                                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                            <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                                        </svg>
                                                                        <span>Upload file</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-1">
                                                                <div id="alt_img_show" class="d-flex align-items-center flex-wrap">
                                                                    <span class="pip">
                                                                        <img class="imageThumb" id="ImgPreview" src="{{ asset($flashdeal->image) ?? '' }}">
                                                                        <span class="remove" onclick="removeSingleImage('ImgPreview','image')">
                                                                            Remove
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label d-block">Active</label>
                                                                <input type="checkbox" class="js-switch" name="is_active" {{ ($flashdeal->is_active == true) ? 'checked' : ''}}/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label d-block">Featured</label>
                                                                <input type="checkbox" class="js-switch" name="is_feature" {{ ($flashdeal->is_feature == true) ? 'checked' : ''}}/>
                                                            </div>
                                                            <div class="form-group mb-0" id="filtr_test">
                                                                <label class="control-label">Select Products</label>
                                                                <select class="select2 form-control select2-multiple" id="products" multiple="multiple" name="product_id[]" data-placeholder="Choose ...">
                                                                    @foreach(\App\Product::all() as $product)
                                                                        @php
                                                                            $flash_deal_product = \App\FlashDealProduct::where('flashdeal_id', $flashdeal->id)->where('product_id', $product->id)->first();
                                                                        @endphp
                                                                        <option value="{{$product->id}}" <?php if($flash_deal_product != null) echo "selected";?> >{{ $product->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flashDealProducts" class="mb-3">

                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card sticky-save-btn">
                                    <div class="card-body">
                                        <div class="button-items text-right">
                                            <a href="{{route('flashdeals.index')}}" class="btn btn-warning w-lg waves-effect waves-light">Cancel</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="/admin/assets/vendor/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(document).ready(function(){

            get_flashdeal_products();

            $('#products').on('change', function(){
                get_flashdeal_products();
            });

            function get_flashdeal_products(){
                var product_ids = $('#products').val();
                if(product_ids.length > 0){
                    $.post('{{ route('flashdeal.flashdealedit') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids, flash_deal_id:{{ $flashdeal->id }}}, function(data){
                        $('#flashDealProducts').html(data);
                    });
                }
                else{
                    $('#flashDealProducts').html(null);
                }
            }

            $(".select2").select2({
                closeOnSelect : false,
            });

            var obj = $('#filtr_test').find('.select2-selection__rendered');
            select_grouping(obj);

            function select_grouping(obj) {
                var min_grouping_count = 1;
                var title = ' Products selected';
                var count = 1;
                if (obj.children('li').length > min_grouping_count) {
                    if (obj.children('li').length > min_grouping_count) {
                        count = obj.children('li').length - 1;
                        obj.children('li').each(function(index, el) {
                            if (index > 0 && index < count) {
                                $(this).remove();
                            }
                        });
                    }
                    obj.children('li:eq(0)').html(count + title);
                }
            }
            $(".select2").on("select2:select", function(obj) {
                var obj = $('#filtr_test').find('.select2-selection__rendered');
                select_grouping(obj);
            });
            $(".select2").on("select2:unselect", function(obj) {
                var obj = $('#filtr_test').find('.select2-selection__rendered');
                select_grouping(obj);
            });

            $('.dropify').dropify();
        });

        $(function () {
            $('.sale-date').datetimepicker({
               format: 'DD-MM-Y HH:mm:ss',
            });
        });

    </script>

@endpush
