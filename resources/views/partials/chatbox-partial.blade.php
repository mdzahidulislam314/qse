@if(count($mgs) > 0)
    @foreach($mgs as $chat)
        @if ($chat->is_admin == 0)
            <div>
                <div class="chat_msg_item chat_msg_item_user">{{$chat->message}}</div>
                {{--<div class="status">Just now</div>--}}
            </div>
            @if ($chat->files)
            <span class="chat_msg_item chat_msg_item_user">
               <div title="Date">
                   <div class="vendor-product sm-item">
                        <figure class="product-media">
                            <a data-src="{{asset($chat->files)}}" data-fancybox="gallery">
                                <img src="{{asset($chat->files)}}" alt="Vendor Product" class="img-thumbnail" width="200" height="200">
                            </a>
                        </figure>
                    </div>
               </div>
            </span>
            @endif
        @else
            <div>
                <span class="chat_msg_item chat_msg_item_admin" title="this is title">
                    {{$chat->message}}
                </span>
            </div>
                @if ($chat->files)
                    <span class="chat_msg_item chat_msg_item_admin">
                   <div>
                       <div class="vendor-product sm-item">
                            <figure class="product-media">
                                <a data-src="{{asset($chat->files)}}" data-fancybox="gallery">
                                    <img src="{{asset($chat->files)}}" alt="Vendor Product" class="img-thumbnail" width="200" height="200">
                                </a>
                            </figure>
                        </div>
                   </div>
                </span>
                @endif
            </div>
        @endif
    @endforeach
@endif