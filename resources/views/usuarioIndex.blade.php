@extends('layouts.master')

@section('content')
<h3>Administración usuarios</h3>
<?php if(session('error')){?>
    <p class="alert alert-danger"><?=session('error')?></p>
<?php }?>
<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Usuario</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Email</th>
      <th></th>
    </tr>
  <?php
  use App\Models\Usuario;
  // $usuarios=Usuario::all();
  $usuarios=Usuario::where('grupo', session('grupo'))->orderBy('usuario')->get();
  foreach ($usuarios as $usuario) {
  ?>
  <tr>
    <td>{{$usuario->usuario}}</td>
    <td>{{$usuario->nombre}}</td>
    <td>{{$usuario->apellidos}}</td>
    <td>{{$usuario->email}}</td>
    <td>
      <div class="btn-toolbar" role="toolbar" aria-label="...">
        <form name="edit{{$usuario->usuario}}" method="POST" action="{{route('usuarioEdit')}}">
        @csrf
          <input type="hidden" name="usuario" value="{{$usuario->usuario}}">
          <a href="javascript:document.edit{{$usuario->usuario}}.submit()"role="button" class="btn btn-success btn-xs">Modificar</a>
        </form>
        @if($usuario->usuario!=session('usuario'))
        <form name="delete{{$usuario->usuario}}" method="POST" action="{{route('usuarioDelete')}}">
        @csrf
          <input type="hidden" name="usuarioDel" value="{{$usuario->usuario}}">
          <a href="javascript:if(confirm('Seguro que quieres borrar \'{{$usuario->usuario}}\'?')) {document.delete{{$usuario->usuario}}.submit()}"role="button" class="btn btn-danger btn-xs">Borrar</a>
        </form>
        @endif
      </div>
    </td>
    
  </tr>
  <?php
  }
  ?>
  </table>
</div>

@endsection