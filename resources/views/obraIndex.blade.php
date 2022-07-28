@extends('layouts.master')

@section('content')
<h3>Índice de obras</h3>
<?php if(session('error')){?>
    <p class="alert alert-danger"><?=session('error')?></p>
<?php }?>
<div class="table-responsive">
  <table class="table">
    <tr>
      <th>ID</th>
      <th><p>Título</p></h4></th>
      <th><p>Autor</p></th>
      <th>Categorias</th>
      <th>Comentarios</th>
      <th>Acciones</th>
    </tr>
  <?php
  use App\Models\Obra;
  $googleUrl="https://drive.google.com/uc?export=play&id=";
  $obras=Obra::where('grupo', session('grupo'))->orderBy('titulo')->get();
  foreach ($obras as $obra) {
  ?>
  <tr>
    <td>{{$obra->id_obra}}</td>
    <td>{{$obra->titulo}}</td>
    <td>{{$obra->autor}}</td>
    <td>{{$obra->categorias}}</td>
    <td>{{$obra->comentario}}</td>
    <td>
      <div class="btn-toolbar" role="toolbar" aria-label="...">
        <form name="edit{{$obra->id_obra}}" method="GET" action="{{route('obraEdit',$obra->id_obra)}}">
          <a href="javascript:document.edit{{$obra->id_obra}}.submit()"role="button" class="btn btn-success btn-xs">Modificar</a>
        </form>
        <form name="delete{{$obra->id_obra}}" method="POST" action="{{route('obraDelete',$obra->id_obra)}}">
        @csrf
        @method("DELETE")
          <a href="javascript:if(confirm('Seguro que quieres borrar \'{{$obra->titulo}}\'?')) {document.delete{{$obra->id_obra}}.submit()}"role="button" class="btn btn-danger btn-xs">Borrar</a>
        </form>
      </div>
    </td>
  </tr>
  <?php
  }
  ?>
  </table>
</div>
<style>
  th {
    background-color: #E7E7E7;
  }
</style>
@endsection