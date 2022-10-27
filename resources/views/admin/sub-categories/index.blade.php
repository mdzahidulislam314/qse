@extends('admin.layouts.master')
@section('products-menu') active @stop
@section('show') show @stop
@section('all-subcat') active @stop
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Sub Categories</h4>
                        <button class="btn btn-info" id="btn-create"><i class="ri-add-fill"></i>Add Sub-Category</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="dtable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ $formAction ?? '' }}" method="POST" id="form-create"
                      class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="head_text"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="form-wrapper">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                            </div>
                            <div class="form-group">
                                <label class="form-label d-block">Selcte Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label d-block">Active Status</label>
                                <div class="square-switch">
                                    <input type="checkbox" id="square-switch1" switch="none" name="status" />
                                    <label for="square-switch1" data-on-label="On" data-off-label="Off"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(function () {

            var dtable = $('#dtable').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                pageLength: 50,
                ajax: "{{ $dataUrl }}",
                // dom: 'Brtip',
                bFilter: false, // hide search box
                buttons: [
                    'copy'
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    { data: 'category.name', name: 'category.name'},
                    {data: 'name', name: 'name'},

                    {data: 'status', name:'status', render: function ( data, type, row ) {
                            return (data === 1)  ? '<span class="badge badge-soft-success font-size-12">Active</span>'
                                : '<span class="badge badge-soft-danger font-size-12">Inactive</span>';
                        }
                    },
                    {
                        data: null,
                        "searchable": false,
                        defaultContent: "<button class='btn btn-sm btn-info dt-btn-edit'><i class=\"fa " +
                            "fa-edit\"></i></button>" +
                            "<button class='btn btn-sm btn-danger dt-btn-delete'><i class=\"fa " +
                            "fa-trash\"></i></button>"
                    },
                ]
            });

            // open create modal
            $("#btn-create").on("click", function (e) {
                e.preventDefault();
                $(".print-error-msg").css('display','none');
                $("#head_text").html('Add Subcategory');

                var form = $("#form-create");
                form.attr("action", route('sub-categories.store'));
                form.attr("method", "POST");

                $("input[name=name]").val("");
                $("input[name=category_id]").val("");
                $('input[name=status]').removeAttr('Checked');
                $("#modal-create").modal();
            });

            //insert data
            $("#form-create").on("click", ".btn-save", function (e) {
                e.preventDefault();

                var form = $("#form-create");
                var action = form.attr("action");
                var data = new FormData(form[0]);
                data.append("_method", form.attr("method"));

                $.ajax({
                    url: action,
                    method: "POST",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                    .done(function(data) {
                        if(data.success){
                            dtable.ajax.reload();
                            form.trigger("reset");
                            $("#modal-create").modal('hide');
                            toastr.success(data.message, '');

                        } else {
                            toastr.error("Something went wrong!", 'Error');
                        }
                    })
                    .fail(function(xhr) {
                        //button.html("Save").attr("disabled", false);
                        if(xhr.status == 422){
                            printErrorMsg(xhr.responseJSON.errors);
                        } else {
                            toastr.error("Something went wrong!", 'Error');
                        }
                    });
            });

            //open Edit modal
            dtable.on('click','.dt-btn-edit', function (e) {
                e.preventDefault();
                $(".print-error-msg").css('display','none');
                $("#head_text").html('Edit SubCategory');
                var data = dtable.row($(this).closest('tr')).data();

                $("input[name=name]").val(data.name);
                $("select[name=status]").val(data.status);
                $("select[name=category_id]").val(data.category_id);
                if(data.status) {
                    $('input[name=status]').attr('Checked','Checked');
                } else {
                    $('input[name=status]').removeAttr('Checked');
                }

                var form = $("#form-create");
                form.attr("action", route('sub-categories.update', data.id));
                form.attr("method", "PUT");

                $("#modal-create").modal();
            });

            //delete data
            dtable.on('click', '.dt-btn-delete', function(e) {
                e.preventDefault();
                var data = dtable.row($(this).closest('tr')).data();
                if (confirm("Delete this item?")) {
                    $.ajax({
                        url: route('sub-categories.destroy', data.id) ,
                        method: "DELETE",
                        data:{"_token":"{{csrf_token()}}"}
                    })
                        .done(function(data) {
                            if(data.success){
                                dtable.ajax.reload();
                                toastr.success(data.message, '');
                            } else {
                                toastr.error("Something went wrong!", 'Error');
                            }
                        })
                        .fail(function(xhr) {
                            if(xhr.status == 422){
                                alert("Validation error");
                            } else {
                                toastr.error("Something went wrong!", 'Error');
                            }
                        });
                }

            });


            // error masage
            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        })
    </script>
    <script>
        var loadImage = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
                output.style.display = "block";
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>

@endpush