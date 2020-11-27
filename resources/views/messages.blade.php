<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes del chat x</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Aplicacion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('listChats') }}">Volver a mis chats</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href=" {{route('home')}} ">Cerrar sesión</a>
      </li>
      <li class="nav-item active">
        <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Participantes
        </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @foreach($participants as $participante)
            <a class="dropdown-item">{{$participante->name}}</a>
            @endforeach
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>

<br>
<h5 class="text-center display-4">Mensajes del chat {{$messages[0]->chat_id}}</h5>
<br>

<div class="container">
@foreach($messages as $message)
<div class="card text-white bg-dark mb-3">
  <div class="card-body">
    <p class="font-weight-bold">{{$message->name}}</p>
    <p>{{$message->content}}</p>
  </div>
</div>
@endforeach()
</div>

<br>
<br>

<nav class="navbar fixed-bottom navbar-light bg-light">
  <form class="form-inline" method="post" action="{{ route('createMessage') }}">
  @csrf    
  <input name="content" class="form-control" id="exampleInputContent1" aria-describedby="contentHelp" placeholder="Introduce el mensaje">
  <button class="btn btn-success" type="submit">Enviar</button>
  </form>

  <form class="form-inline" method="post" action="{{ route('addParticipant') }}">
  @csrf    
  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce el email del participante">
  <button class="btn btn-success" type="submit">Añadir participante</button>
  </form>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>