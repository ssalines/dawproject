<ul class="sidebar-nav">
  <h2>Ejercicios</h2>

  @foreach($operations as $operation)
  @if ($user->rol == 1)
  <a class="sidebar-item" href="/operations/{{ $operation->id }}">
    <li class="sidebar-link"> {{$operation->title}} </li>
  </a>
  @else
  @foreach($participants as $participant)
  @if ($participant->user_id == $user->id && $operation->id == $participant->operation_id )

  <a class="sidebar-item" href="/operations/{{ $operation->id }}">
    <li class="sidebar-link"> {{$operation->title}} </li>
  </a>

  @endif
  @endforeach
  @endif
  @endforeach

  @if($user->rol)
  <br><a class="btn btn-primary" href="/operations/create" role="button">Crear operación</a>
  @endif
  <br><br><a class="btn btn-primary" href="/" role="button">Volver al inicio</a>

</ul>