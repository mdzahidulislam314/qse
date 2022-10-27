@extends('admin.layouts.master')
@section('backup') active @stop
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Starter page</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-3">File Backup</h6>
                            <form action="{{route('file.backup')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">File Backup</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <form action="{{route('db-backup.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="all-db mb-5">
                                    <div class="mt-4 mt-lg-0">
                                        <h5 class="font-size-14 mb-4">Select DB Table Name</h5>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input select-all" id="customCheck1">
                                            <label class="custom-control-label text-primary bold" for="customCheck1">Select All</label>
                                        </div>
                                        <div class="table_list d-flex flex-wrap">
                                            @foreach($tables as $table)
                                                <div class="custom-control custom-checkbox mb-4 mr-3">
                                                    <input type="checkbox" class="custom-control-input"
                                                           name="tables[]"
                                                           value="{{$table->{$db} }}"
                                                    id="customCheck-{{$table->{$db} }}">
                                                    <label class="custom-control-label" for="customCheck-{{$table->{$db} }}">{{ $table->{$db} }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-primary">DB Backup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')

    <script>
        // Listen for click on toggle checkbox
        $('.select-all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        function deleteTable(id) {
            if(confirm("Do you want to delete this item?")) {
                document.getElementById('delete-form-'+id).submit();
                toastr.success('Deleted!', "")
            }
        }
    </script>

@endpush