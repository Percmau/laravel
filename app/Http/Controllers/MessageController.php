<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    
    public function list($chat_id){
        $messages = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.user_id')
            ->select('users.name', 'messages.content', 'messages.chat_id')
            ->where('chat_id', '=', $chat_id)
            ->get();

        session(['chat_id' => $messages[0]->chat_id]);

        $participants = DB::table('chat_user')
        ->join('users', 'chat_user.user_id', '=', 'users.id')
        ->select('users.name')
        ->where('chat_user.chat_id', '=', $chat_id)
        ->get();
        
        return view('messages', compact('messages', 'participants'));
    }

    public function create(Request $request){
        DB::table('messages')
        ->insert(['content' => $request->get('content'),
                  'user_id' => session('key'), 
                  'chat_id' => session('chat_id'),
        ]);
        return redirect()->route('listMessages', ['chat_id' => session('chat_id')]);
    }
}
