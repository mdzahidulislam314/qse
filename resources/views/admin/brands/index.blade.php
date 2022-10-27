@extends('admin.layouts.master')
@section('products') active pcoded-trigger @stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Brands</h5>
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
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <button class="btn btn-info" id="btn-create"><i class="ri-add-fill"></i>Add Brands</button>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <table id="dtable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Logo</th>
                                                <th>Name</th>
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
            </div>
        </div>
    </div>
    <div id="styleSelector">
    </div>

    <div class="modal fade" id="modal-create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <label class="form-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description" cols="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label d-block">Image</label>
                                <input type="file" class="dropify" name="image">
                                <div class="show-img">
                                    <div class="new-img d-inline-block">
                                        <img height="100" width="140" id="output"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label d-block">Active</label>
                                <input type="checkbox" class="js-switch status" name="status"/>
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
            $(document).ready(function(){
                $('.dropify').dropify();
            });

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
                    { data: 'image', name: 'image',
                        render: function( data, type, full, meta ) {
                            return "<img src=\"/" + data + "\" height=\"50\"/>";
                        }
                    },
                    {data: 'name', name: 'name'},

                    {data: 'status', name:'status', render: function ( data, type, row ) {
                            return (data === 1)  ? '<span class="label label-success">Active</span>'
                                : '<span class="label label-danger">Inactive</span>';
                        }
                    },
                    {
                        data: null,
                        "searchable": false,
                        defaultContent: "<a class='dt-btn-edit'><i class=\"icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green\"></i></a>" +
                            "<a class='dt-btn-delete'><i class=\"feather icon-trash-2 f-w-600 f-16 text-c-red\"></i></a>"
                    },
                ]
            });

            // open create modal
            $("#btn-create").on("click", function (e) {
                e.preventDefault();
                $(".print-error-msg").css('display','none');
                $("#head_text").html('Add Brands');

                $(".dropify-preview").removeAttr('style');
                $('.show-img').addClass('d-none');
                var form = $("#form-create");
                form.attr("action", route('brands.store'));
                form.attr("method", "POST");
                $("input[name=name]").val("");
                $("input[name=image]").val("");
                $("input[name=meta_title]").val("");
                $("textarea[name=meta_description]").val("");
                $('#output').removeAttr('src');
                $("input[name=status]").attr("checked", false);
                $("#modal-create").modal();
            });

            //insert data
            $("#form-create").on("click", ".btn-save", function (e) {
                e.preventDefault();
                $(".print-error-msg").css('display','none');
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
                $("#head_text").html('Edit Brand');
                var data = dtable.row($(this).closest('tr')).data();

                $(".dropify-preview").removeAttr('style');
                $('.show-img').removeClass('d-none');
                $("input[name=name]").val(data.name);
                $("input[name=meta_title]").val(data.meta_title);
                $("textarea[name=meta_description]").val(data.meta_description);

                if(data.status) {
                    $("input[name=status]").attr("checked", true);
                } else {
                    $("input[name=status]").attr("checked", false);
                }

                $("#output").attr("src", '/' + data.image);

                var form = $("#form-create");
                form.attr("action", route('brands.update', data.id));
                form.attr("method", "PUT");

                $("#modal-create").modal();
            });

            //delete data
            dtable.on('click', '.dt-btn-delete', function(e) {
                e.preventDefault();
                var data = dtable.row($(this).closest('tr')).data();
                if (confirm("Delete this item?")) {
                    $.ajax({
                        url: route('brands.destroy', data.id) ,
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
@endpush