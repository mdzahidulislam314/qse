<section id="fixed-form-container">
    <div class="button" id="chatbox-btn">
        <i class="w-icon-chat mr-1"></i>Messages
    </div>
    <div class="body">
            @guest('customer')
                <div class="text-center">
                    <h6 class="mb-1">For Sent a Message. You Need to Login First</h6>
                    <small><a href="{{ route('login') }}">Login Here</a></small>
                </div>
            @else
                <div class="chat">
                    <div class="chat_header">
                        <div class="chat_option">
                            <div class="header_img">
                                <img src="https://customerthink.com/wp-content/uploads/avatar-372-456324.png" />
                            </div>
                            <span id="chat_head">Admin</span> <br />
                           <span class="online">(Online)</span>
                            <span id="chat_fullscreen_loader" class="chat_fullscreen_loader" style="display: block;"><i class="fullscreen zmdi zmdi-window-maximize"></i></span>
                        </div>
                    </div>

                    <div id="chat_converse" class="chat_conversion chat_converse" style="display: block;">

                    </div>

                    <div class="fab_field">
                        <form action="{{route('message.storebyajax')}}" id="chatbox-form">
                            @csrf
                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->id()}}">
                            <div class="input--file fab is-visible" id="fab_camera">
                                <i class="fas fa-camera-retro"></i>
                                <input name="files" type="file" id="chatFile"/>
                            </div>
                            <a id="fab_send" class="fab is-visible"><i class="fas fa-paper-plane"></i></a>
                            <textarea id="chatSend" name="message" placeholder="Send a message" class="chat_field chat_message"></textarea>
                        </form>
                    </div>
                </div>

        @endguest
    </div>
</section>