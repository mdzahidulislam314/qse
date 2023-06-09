@extends('admin.layouts.master')
@section('products-menu') active @stop
@section('show') show @stop
@section('all-cat') active @stop
@section('content')

    <main class="content">
        <div class="container-fluid p-0">
            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-flex align-items-center">
                    <h2>{{$title}}</h2>
                    <a href="{{route('categories.create')}}" class="btn btn-primary ml-4">Add {{$title}}</a>
                </div>

            </div>

            <div class="cotainer-fluid">
                <div class="row">
                    <div class="col-12 col-xl-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><b>Add New Category</b></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            @method('PUT')
                                            <div class="form-wrapper">
                                                <div class="form-group row">
                                                    <label class="form-label d-block">Category Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label d-block">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="0">Disable</option>
                                                        <option value="1">Enable</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label d-block">Image</label>
                                                    <span class="btn btn-primary d-block">
                                                        <input class="d-block" type="file" accept="image/*" onchange="loadImage(event)" id="image" name="image">
                                                    </span>
                                                    <div class="show-img text-center">
                                                        <div class="old-img d-inline-block mr-5">
                                                            <h5>Old Image-></h5>
                                                            @if (isset($category->image))
                                                                <img height="100" width="140" src="{{ asset($category->image) }}"/>
                                                            @endif
                                                        </div>
                                                        <div class="new-img d-inline-block">
                                                            <h5>New Image-></h5>
                                                            <img height="100" width="140" id="output"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><b>All Categories</b></h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($categories->count() > 0)
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->slug}}</td>
                                                <td class="table-action d-flex align-items-center">
                                                    <a href="{{ route('categories.edit', $category->id) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                                    <form id="delete-form-{{$category->id}}"
                                                          action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a class="ml-3" href="javascript:void(0);" onclick="deleteTable({{$category->id}})"><i class="align-middle"
                                                                                                                                           data-feather="trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4"><h4 class="text-center">No Category Found !</h4></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

@stop

@push('scripts')

<script>
    var loadImage = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
    <script>
        function deleteTable(id) {
            if(confirm("Do you want to delete this item?")) {
                document.getElementById('delete-form-'+id).submit();
                toastr.success('Deleted!', "")
            }
        }
    </script>
@endpush