@extends('admin.layouts.master')

@section('products') active pcoded-trigger @stop

@section('css')
    <link rel="stylesheet" href="/admin/assets/vendor/treeview/bstreeview.min.css">
    <style>
        .card-header {
            background-color: #ddd;
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
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Categories TreeViews</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="tree"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Add Category</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $model->name ?? '' }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Parent category</label>
                                                <select name="parent_id" class="form-control js-example-basic-single" id="mySelect2" >
                                                    <option selected value="">Select Parent</option>
                                                    @foreach($cat_parents as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        @if($cat->children()->count())
                                                            @foreach($cat->children as $child)
                                                                <option value="{{ $child->id }}">&nbsp;&nbsp;
                                                                    &nbsp;--{{ $child->name }}</option>
                                                                @if($child->children()->count())
                                                                    @foreach($child->children as $innerChild)
                                                                        <option value="{{ $innerChild->id }}" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---{{ $innerChild->name }}</option>
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
                                            <div class="form-group">
                                                <label class="form-label d-block">Active</label>
                                                <input type="checkbox" class="js-switch" name="status"/>
                                            </div>
                                            <div class="form-group mb-1">
                                                <label for="validationCustom03">image</label>
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
                                                    <span class="pip d-none">
                                                        <img class="imageThumb" id="ImgPreview" src="">
                                                        <span class="remove" onclick="removeSingleImage('ImgPreview','image')">
                                                            Remove
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary" name="submit_save" value="save">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>All Categories</h6>
                                    </div>
                                    <div class="card-body">
                                        <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Parent Category</th>
                                                <th>Show Homepage</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allcats as $row)
                                                <tr>
                                                    <td><img src="{{ isset($row->image) ? asset($row->image) : '/demo/no-img.jpg'}}" width="50" height="50"></td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->parent->name ?? '-' }}</td>
                                                    <td>
                                                        <input type="checkbox" class="js-switch" name="show_homepage" data-id="{{$row->id}}" id="showHomepage" {{ $row->show_homepage === 1 ? 'checked' : ''}}/>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="js-switch" name="status" data-id="{{$row->id}}" id="statusChange" {{ $row->status === 1 ? 'checked' : ''}}/>
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
@stop

@push('scripts')
    <script src="/admin/assets/vendor/treeview/bstreeview.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var tree = [
                @foreach($categories as $category)
                    {
                        text: "{{$category->name}}",
                        icon: "fa fa-folder",
                        self_id: "{{$category->id}}",
                        @if($category->children()->count())
                            nodes: [
                                @foreach($category->children as $child)
                                    {
                                        text: "{{ $child->name }}",
                                        icon: "fa fa-folder",
                                        self_id: "{{ $child->id }}",
                                        parent_id: "{{$category->id}}",
                                        @if($child->children()->count())
                                            nodes: [
                                                @foreach($child->children as $child2)
                                                    {
                                                        text: "{{ $child2->name }}",
                                                        icon: "fa fa-folder",
                                                        self_id: "{{ $child2->id }}",
                                                        parent_id: "{{$child->id}}",
                                                        
                                                    }
                                                    @if(!$loop->last)
                                                    ,
                                                    @endif
                                                @endforeach
                                            ]
                                        @endif
                                    }
                                    @if(!$loop->last)
                                    ,
                                    @endif
                                @endforeach
                            ]
                        @endif
                    }
                    @if(!$loop->last)
                        ,
                    @endif
                @endforeach
            ];

            $('#tree').bstreeview({ data: tree });

            $("body").on("click", ".list-group-item > .btn.btn-link.btn-sm", function (e) {
                e.stopPropagation();
                var $this = $(this);
                var id = $this.closest(".list-group-item").data("self_id");

                window.location = "/backpanel/categories/"+id+"/edit";
            });


            //show home page
            $('body').on('change',"#showHomepage",function () {
                var id = $(this).attr('data-id');

                if (this.checked){
                    var show_homepage = 1;
                }else{
                    var show_homepage = 0;
                }

                $.ajax({
                    url:"/backpanel/show-homepage/" + id + '/' + show_homepage,
                    method:"GET",
                    success:function (done) {
                        console.log(done);
                        toastr.success(done.message, '');
                    },
                });
            });

            //status change
            $('body').on('change',"#statusChange",function () {
                var id = $(this).attr('data-id');

                if (this.checked){
                    var status = 1;
                }else{
                    var status = 0;
                }
                $.ajax({
                    url:"/backpanel/cat-status/" + id + '/' + status,
                    method:"GET",
                    success:function (done) {
                        console.log(done);
                        toastr.success(done.message, '');
                    }
                });
            })

            $(document).ready(function(){
                $('.dropify').dropify();
            });

            function clearSelectedOptions() {
                $('#mySelect2').val(null).trigger('change');
            }
            $("#clearSelect2").on("click", clearSelectedOptions);

        });
    </script>
@endpush


