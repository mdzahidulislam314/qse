

@if(count($mgs) > 0)
    @foreach($mgs as $chat)
        @if ($chat->is_admin == 0)
            <div class="row m-b-20 received-chat">
                <div class="col-auto p-r-0">
                    <img src="/admin/assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40">
                </div>
                <div class="col">
                    <div class="msg">
                        <p class="m-b-0">{{$chat->message}}</p>
                    </div>
                    <p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>{{$chat->created_at->diffForHumans()}}</p>
                </div>
            </div>
            @if ($chat->files)
                <span class="chat_msg_item chat_msg_item_user">
               <div title="Date">
                   <div class="vendor-product sm-item">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="{{asset($chat->files)}}" alt="Vendor Product" class="img-thumbnail" width="200" height="200">
                            </a>
                        </figure>
                    </div>
               </div>
            </span>
            @endif
        @else
            <div class="row m-b-20 send-chat">
                <div class="col">
                    <div class="msg">
                        <p class="m-b-0"> {{$chat->message}}</p>
                    </div>
                    @if (!$chat->files)
                        <p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>{{$chat->created_at->diffForHumans()}}</p>
                    @endif
                </div>
                <div class="col-auto p-l-0">
                    <img src="/admin/assets/images/avatar-3.jpg" alt="user image" class="img-radius img-40">
                </div>
            </div>
            @if ($chat->files)
                <div class="row m-b-20 send-chat">
                    <div class="col">
                        <div class="">
                            <img src="{{asset($chat->files)}}" alt="Vendor Product" class="img-thumbnail" width="200" height="200">
                        </div>
                        <p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>{{$chat->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            @endif
            </div>
            @endif
    @endforeach
@endif