@extends('index')

@section('title', 'Chats')

@section('contenido')
<br>
<h1 class="text-center display-4">Tus grupos</h1>
<br>
@foreach($chats as $chat)
<div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title">{{$chat->title}}</h5>
    <p class="card-text">{{$chat->description}}</p>
    <a type="button" href="{{ route('listMessages', ['chat_id' => $chat->id]) }}">Acceder al chat</a>
  </div>
</div>
<br>
@endforeach
@endsection