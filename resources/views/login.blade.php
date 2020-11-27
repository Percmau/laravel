@extends('layouts\app')

@section('login')
<form method="post" action="{{ URL::to('index') }}">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Email usuario</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu email">
    <small id="emailHelp" class="form-text text-muted">Tu email no va a ser visto por otros usuarios.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Recordarme</label>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Acceder</button>
</form>
@endsection