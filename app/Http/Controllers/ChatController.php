<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use app\Http\Controllers\LoginController;

class ChatController extends Controller
{
    public function list(){
        $user_id = session('key');

        $chats = DB::table('chat_user')
        ->join('chats', 'chat_user.chat_id', '=', 'chats.id')
        ->select('chats.id', 'chats.title', 'chats.description')
        ->where('chat_user.user_id', '=', $user_id)
        ->get();

        return view('chats', compact('chats'));
    }

    public function create(Request $request){
        $chat_id = DB::table('chats')
        ->insertGetId(['title' => $request->get('title'),
                  'description' => $request->get('description'),
                  'user_id' => session('key')
                    ]);

        DB::table('chat_user')
        ->insert(['chat_id' => $chat_id,
                  'user_id' => session('key')
                ]);
        
        return view('index');
    }

    public function addParticipant(Request $request){
        $user_id = DB::table('users')
        ->select('id')
        ->where('email', 'LIKE', $request->get('email'))
        ->get();

        DB::table('chat_user')
        ->insert(['chat_id' => session('chat_id'),
                  'user_id' => $user_id[0]->id
        ]);
        return redirect()->back();
    }
}
