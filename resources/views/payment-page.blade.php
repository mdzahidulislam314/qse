@extends('layouts.master')

@section('css')
{{--    <link rel="stylesheet" href="/site/assets/css/thankyou.css">--}}
@stop

@section('main')
    <main class="main">
        <div class="thank-you-section payment">
            <h1>Thank you for Your Order!</h1>
            <p>Please Confirm Your payment : {{session('billing_total')}}</p>
            <div class="spacer"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5 class="card-title">To Pay With bkash Please Sent Money to this Number: 017171717171 and Enter The TrxID Below:-</h5>
                                <form class="form-inline mt-4 justify-content-center" action="{{route('confirm.payment')}}" method="POST">
                                    @csrf

                                    @if (session('order_id'))
                                        <input type="hidden" name="order_id" value="{{session('order_id')}}">
                                    @endif

                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inputPassword2" class="sr-only">TrxID Here...</label>
                                        <input type="text" class="form-control" id="inputPassword2" name="trx_id" placeholder="TrxID Here...">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Confirm Payment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
