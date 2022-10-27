<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required',
            'user_id' => 'required',
        ]);

        $conver = Conversation::where('user_id', $request->user_id)->first();

        //check exit conersatin
        if (!$conver){
            $conver = new Conversation();
            $conver->last_message = $request->message;
            $conver->user_id = $request->user_id;
            $conver->save();
        }

        $mgs = new Message();
        $mgs->message = $request->message;
        $mgs->conversation_id = $conver->id;
        $mgs->user_id = $request->user_id;
        if ($request->file('files')){
            $mgs->image = image_upload($request->file('files'),'uploads/message/',null);
        }
        $mgs->save();
        return redirect()->back()->with('success', 'Message Sent!');

        //if exit or not converssion

        //save masseage

        //
    }

    public function chatboxAjax(Request $request)
    {
        $mgs = Message::where('user_id', $request->user_id)->orderBy('id', 'ASC')->get();
        return view('partials.chatbox-partial', compact('mgs'));
    }

    public function storeByAjax(Request $request)
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
        if ($request->file('files')){
            $mgs->files = image_upload($request->file('files'),'uploads/message/',null);
        }
        $mgs->save();

        return response()->json([
            'success' => true,
            'message' => 'created successfully!'
        ], 200);
    }
}
