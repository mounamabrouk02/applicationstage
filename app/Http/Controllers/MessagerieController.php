<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Messagerie;
use Auth;

class MessagerieController extends Controller
{
    public function index()
    {
        //select all users except logged in user
        $users = User::where('id','!=',Auth::id())->get();
        return view('user.messageries.index')->with('users',$users);
    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();


        // Get all message from selected user
        $messages = Messagerie::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->get();

        return view('user.messageries.messages.index')->with('messages',$messages);
    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receivar_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

    }


}
