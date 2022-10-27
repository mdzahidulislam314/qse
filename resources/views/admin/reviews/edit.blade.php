@extends('admin.layouts.master')
@section('coupons') active @stop
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Coupons</h4>
                        <a href="{{route('coupons.index')}}" class="btn btn-info" id="btn-create"><i class="ri-add-fill"></i> View Coupon</a>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-7">
                                    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-wrapper">
                                            <div class="form-group">
                                                <label class="form-label">Coupon Code</label>
                                                <input type="text" class="form-control" name="code" value="{{ $coupon->code }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label d-block">Coupon Type</label>
                                                <select name="type" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="Fixed" {{$coupon->type == 'Fixed' ? 'selected' : ''}}>Fixed</option>
                                                    <option value="Percent" {{$coupon->type == 'Percent' ? 'selected' : ''}}>Percent</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Value (fixed amount)</label>
                                                <input type="text" class="form-control" name="value" value="{{ $coupon->value }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Percent (%)</label>
                                                <input type="text" class="form-control" name="percent_off" value="{{ $coupon->percent_off }}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label d-block">Status</label>
                                                <input type="checkbox" id="switch4" switch="success" name="status" {{$coupon->status == true ? 'checked' : ''}}>
                                                <label for="switch4" data-on-label="Yes" data-off-label="No"></label>
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
            </div>
        </div>
    </div>
@stop

@push('scripts')

    <script>
        function deleteTable(id) {
            if(confirm("Do you want to delete this item?")) {
                document.getElementById('delete-form-'+id).submit();
                toastr.success('Deleted!', "")
            }
        }
    </script>

@endpush