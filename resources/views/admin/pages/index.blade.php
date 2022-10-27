@extends('admin.layouts.master')

@section('pages') active pcoded-trigger @stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Pages</h5>
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
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th >Name</th>
                                                    <th >Url</th>
                                                    <th >Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($pages as $row)
                                                    <tr>
                                                        <td>{{ $row->title }}</td>
                                                        <td>{{ \Illuminate\Support\Facades\URL::to('/').'/' .$row->slug }}</td>
                                                        <td>
                                                            <a href="{{ route('pages.edit', $row->id) }}">
                                                                <i class="icon feather icon-edit f-w-600 f-16 text-c-green"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" data-href="{{route('pages.destroy', $row->id)}}" class="text-danger ml-3 confirm-delete">
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
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('pages.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="validationCustom03">Page Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title" id="validationCustom03" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Page Title.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom03">Description<span class="text-danger">*</span></label>
                                                <textarea class="ckeditor" name="desc"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom03">Visibility<span class="text-danger">*</span></label>
                                                <select name="visibility" class="form-control">
                                                    <option value="{{\App\Page::TOP_HEADER}}">Top Header</option>
                                                    <option value="{{\App\Page::MAIN_HEADER}}">Main Header</option>
                                                    <option value="{{\App\Page::FOOTER_ONE}}">Footer One</option>
                                                    <option value="{{\App\Page::FOOTER_TWO}}">Footer Two</option>
                                                    <option value="{{\App\Page::FOOTER_THREE}}">Footer Three</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label d-block">Status</label>
                                                <input type="checkbox" class="js-switch" name="is_active"/>
                                            </div>
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
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-success mr-2 waves-effect waves-light">Save</button>
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
    @include('admin.modals.delete_modal')
@stop

@push('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
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
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });

</script>
@endpush