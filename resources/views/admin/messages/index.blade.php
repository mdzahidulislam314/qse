@extends('admin.layouts.master')
@section('support') active pcoded-trigger @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/pages.css">
@stop

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Chatting</h5>
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
                                    <div class="card-body">
                                        <div class="card-block email-card">
                                            <div class="row">
                                                <!-- Left-side section start -->
                                                <div class="col-lg-12 col-xl-4">
                                                    <div class="user-body">
                                                        <h4>Customer</h4>
                                                        <div class="form-group form-default">
                                                            <input type="text" name="footer-email" class="form-control" required="">
                                                            <span class="form-bar"></span>
                                                        </div>
                                                        <div class="card new-cust-card chatting">
                                                            <div class="card-header">
                                                                <h5>Conversion</h5>
                                                            </div>
                                                            <div class="card-block">
                                                                @forelse($conversations as $chat)
                                                                    <div class="align-middle py-2 px-2 customer" data-id="{{$chat->user->id}}" data-name="{{$chat->user->name}}">
                                                                        <img src="/admin/assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                        <div class="d-inline-block">
                                                                            <a href="#!"><h6>{{ $chat->user->name }}</h6></a>
                                                                            <p class="text-muted m-b-0">{{ Illuminate\Support\Str::limit($chat->last_message, 30) }}</p>
                                                                            @if ($chat->user->isOnline())
                                                                                <span class="status active"></span>
                                                                            @else
                                                                                <span class="status"></span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @empty
                                                                    <span>No Conversion!</span>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-xl-8">
                                                    <div class="mail-body">
                                                        <div class="mail-body-content">
                                                            <div class="card chat-card">
                                                                <div class="card-header">
                                                                    <h5 id="chat-user-title">Chat history</h5>
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="chatbox-wraper" id="chat_converse">

                                                                    </div>
                                                                    <div class="right-icon-control d-none chatting-input">
                                                                        <form action="{{route('message.adminbyajax')}}" id="chatbox-form">
                                                                            @csrf
                                                                            <input type="hidden" name="user_id" value="">
                                                                            <div class="input-group input-group-button">
                                                                                <textarea name="message" class="form-control" cols="5" id="chatSend"></textarea>
                                                                                <div class="input-group-append">
                                                                                    <div class="input--file fab tn btn-light waves-effect waves-light border" id="fab_camera">
                                                                                        <i class="fas fa-camera-retro"></i>
                                                                                        <input name="files" type="file" id="chatFile"/>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="input-group-append">
                                                                                    <button class="btn btn-info waves-effect waves-light" id="fab_send" type="button"><i class="fas fa-paper-plane"></i> Sent</button>
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
    <script>

        function get_chat_box(user_id){
            var user_id = user_id;
            if(user_id){
                $.post('{{ route('getchat.ajax') }}', {_token:'{{ csrf_token() }}', user_id:user_id}, function(data){
                    $('#chat_converse').html(data);
                });
            }
            else{
                $('#chat_converse').html(null);
            }
        }

        $('.customer').on('click', function(){

            $('.customer').removeClass('active');
            $('.chatting-input').removeClass('d-none');
            var user_id = $(this).data('id');
            var name = $(this).data('name');

            $('[name=user_id]').val(user_id);
            $('#chat-user-title').html(name);
            $(this).addClass('active');

            if(user_id){
                $.post('{{ route('getchat.ajax') }}', {_token:'{{ csrf_token() }}', user_id:user_id}, function(data){
                    $('#chat_converse').html(data);
                });
            }
            else{
                $('#chat_converse').html(null);
            }
        });

        $("#fab_send").on("click", function (e) {
                e.preventDefault();
                var form = $("#chatbox-form");
                var action = form.attr("action");
                var data = new FormData(form[0]);

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
                            form.trigger("reset");
                            get_chat_box(data.user_id)
                            toastr.success(data.message, '');
                            console.log('sent');

                        } else {
                            toastr.info(data.message, 'info');
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

    </script>
@endpush