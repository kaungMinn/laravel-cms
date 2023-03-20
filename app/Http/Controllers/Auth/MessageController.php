<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->content = $request->content;
        $message->save();

        return back();
    }

    public function show()
    {
        $messages = Message::all();
        return view('auth.messages.show',[
            'messages' => $messages
        ]);
    }

    public function detail($id)
    {
        $message = Message::find($id);
        return view('auth.messages.detail',[
            'message' => $message
        ]);
    }
}
