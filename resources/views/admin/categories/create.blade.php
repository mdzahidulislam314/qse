@extends('admin.layouts.master')
@section('products-menu') active @stop
@section('show') show @stop
@section('add-cat') active @stop

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Categories</h4>
                        <a href="{{route('categories.index')}}" class="btn btn-info" ><i class="ri-add-fill"></i>All Categories</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           <div class="row">
                               <div class="col-lg-6">
                                   <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" >
                                       {{ csrf_field() }}
                                       <div class="form-wrapper">
                                           <div class="form-group">
                                               <label class="form-label">Name</label>
                                               <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                                           </div>
                                           <div class="form-group">
                                               <label class="form-label">Parent category</label>
                                               <select name="parent" class="form-control select2" >
                                                   <option value="" selected>Please Select....</option>
                                                   @foreach($categories as $cat)
                                                       <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
                                                       @if($cat->children->count())
                                                           @foreach($cat->children as $child)
                                                               <option value="{{ $child->id }}">-{{ $child->name }}</option>
                                                               @if($child->children->count())
                                                                   @foreach($child->children as $row)
                                                                       <option value="{{ $row->id }}">--{{ $row->name }}</option>
                                                                   @endforeach
                                                               @endif
                                                           @endforeach
                                                       @endif
                                                   @endforeach
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <label class="form-label d-block">Image</label>
                                               <span class="text-danger">*An Image dimensions 150 x 140 pixels is recommended!</span>
                                               <input type="file" class="dropify" name="image">
                                           </div>
                                               <div class="form-group">
                                                   <label class="form-label d-block">Active Status</label>
                                                   <div class="square-switch">
                                                       <input type="checkbox" id="square-switch1" switch="none" name="status" />
                                                       <label for="square-switch1" data-on-label="On" data-off-label="Off"></label>
                                                   </div>
                                               </div>
                                           <button type="submit" class="btn btn-success btn-save">Save</button>
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

@stop
@push('scripts')
    <script>
        $(function () {

            $(document).ready(function(){
                $('.dropify').dropify();
            });
        })
    </script>

@endpush