<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts\app');
})->name('home');

Route::get('/listar', [ChatController::class, 'list'])->name('listChats');
Route::post('/createChat', [ChatController::class, 'create'])->name('createChat');
Route::get('/createChat', function(){
    return view('createChat');
})->name('formChat');

Route::get('/login', function(){
    return view ('login');
})->name('modoLogin');

Route::get('/register', function(){
    return view ('register');
})->name('modoRegister');

Route::post('/index', [LoginController::class, 'check']);

Route::post('/login', [RegisterController::class, 'create'])->name('registerUser');

Route::get('/messages/{chat_id}', [MessageController::class, 'list'])->name('listMessages');

Route::post('/messages', [MessageController::class, 'create'])->name('createMessage');

Route::post('', [ChatController::class, 'addParticipant'])->name('addParticipant');




