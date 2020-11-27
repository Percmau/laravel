<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create(Request $request){
        DB::table('users')
        ->insert(['name' => $request->get('name'),
                  'email' => $request->get('email'),
                  'password' => $request->get('password')
                ]);
        return view('login');
    }
}
