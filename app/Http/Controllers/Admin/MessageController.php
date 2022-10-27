<?php

namespace App\Http\Controllers\Admin;

use App\Conversation;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $data = [
          'customers' => Customer::all(['id','name','avatar']),
          'conversations' => Conversation::with('user')->get(),
        ];
        return view('admin.messages.index', $data);
    }

    public function getChatAjax(Request $request)
    {
        $mgs = Message::where('user_id', $request->user_id)->orderBy('id', 'ASC')->get();
        return view('admin.messages.chatbox', compact('mgs'));
    }

    public function AdminstoreByAjax(Request $request)
    {
        if ($request->message == null && !$request->hasFile('filse')){
            return response()->json([
                'error' => true,
                'message' => 'Please Type any..'
            ], 200);
        }

        $conver = Conversation::where('user_id', $request->user_id)->first();

        //check exit conersatin
        if (!$conver){
            $conver = new Conversation();
            $conver->last_message = $request->message;
            $conver->user_id = $request->user_id;
            $conver->save();
        }else{
            $conver = Conversation::find($conver->id);
            $conver->last_message = $request->message;
            $conver->save();
        }

        $mgs = new Message();
        $mgs->message = $request->message;
        $mgs->conversation_id = $conver->id;
        $mgs->user_id = $request->user_id;
        $mgs->is_admin = true;
        if ($request->file('files')){
            $mgs->files = image_upload($request->file('files'),'uploads/message/',null);
        }
        $mgs->save();

        return response()->json([
            'success' => true,
            'user_id' => $request->user_id,
            'message' => 'created successfully!'
        ], 200);
    }
}
