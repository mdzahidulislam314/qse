@extends('admin.layouts.master')
@section('products-menu') active @stop
@section('show') show @stop
@section('add-cat') active @stop
@section('css')
    <style>
        .dropify-wrapper {
            width: 40%;
            height: 130px;
        }
    </style>
@stop

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Categories</h4>
                        <a href="{{route('categories.index')}}" class="btn btn-info" ><i class="ri-add-list"></i>All Categories</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ $formAction ?? '' }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="{{ $formMethod ?? 'POST'}}">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $model->name ?? '' }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Parent category</label>
                                            <select name="parent_id" class="form-control select2" id="mySelect2" >
                                                <option selected disabled>Select Parent</option>
                                                @foreach($cat_parents as $cat)
                                                    <option value="{{ $cat->id }}" {{ ($cat->id == $model->parent_id) ? 'selected' : ''}}>{{ $cat->name }}</option>
                                                    @if($cat->children()->count())
                                                        @foreach($cat->children as $child)
                                                            <option value="{{ $child->id }}" {{ ($child->id == $model->parent_id) ? 'selected' : ''}}>&nbsp;&nbsp;
                                                                &nbsp;-{{ $child->name }}</option>
                                                            @if($child->children()->count())
                                                                @foreach($child->children as $innerChild)
                                                                    <option value="{{ $innerChild->id }}" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--{{
                                                                    $innerChild->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-warning btn-sm mt-2" id="clearSelect2">Clear</button>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label d-block">Active Status</label>
                                            <div class="square-switch">
                                                <input type="checkbox" id="square-switch1" switch="none" name="status" />
                                                <label for="square-switch1" data-on-label="On" data-off-label="Off"></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label d-block">Image</label>
                                            <span class="text-danger">*An Image dimensions 150 x 140 pixels is recommended!</span>
                                            <input type="file" class="dropify" name="image">
                                            <div class="old-img d-inline-block mt-2">
                                                @if (isset($model->image))
                                                    <img height="70" width="70" src="{{ asset($model->image) ?? '' }}"/>
                                                @endif
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary" name="submit_save" value="save">Save</button>
                                    </form>

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