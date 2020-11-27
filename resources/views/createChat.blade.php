@extends('index')

@section('createChat')
<form method="post" action="{{ route('createChat') }}">
@csrf
<div class="form-group">
    <label for="exampleInputTitle1">Titulo</label>
    <input name="title" class="form-control" id="exampleInputTitle1" aria-describedby="titleHelp" placeholder="Introduce el título">
  </div>
  <div class="form-group">
    <label for="exampleInputDescription1">Descripción</label>
    <input name="description" class="form-control" id="exampleInputDescription1" aria-describedby="descriptionHelp" placeholder="Introduce la descripción del chat">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Crear chat</button>
  <a href="{{ url()->previous() }}">Cancelar</a>
</form>
@endsection