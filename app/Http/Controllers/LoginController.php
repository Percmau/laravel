<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function check(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');
        $correct = DB::table('users')
        ->select('id','email', 'password')
        ->where(['email' => $email, 'password' => $password])
        ->get();
        if($correct->first()){
            $user_id = $correct[0]->id;
            session(['key' => $user_id]);
            return view('index');
        }else{
            return view('login');
        }
    }
}
