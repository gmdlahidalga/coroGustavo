@extends('layouts.master')

@section('content')
<h3>Repertorio</h3>
<?php if(session('error')){?>
    <p class="alert alert-danger"><?=session('error')?></p>
<?php }?>
<div class="table-responsive">
  <table class="table">
    <tr>
      <th><p><strong>Titulo</strong></p><p class="btn btn-primary disabled">Páginas Ensayo</p></th>
      <th><p>Autor</p><p class="btn btn-primary disabled">Partitura</p></th>
      <th>Categorias</th>
      <th>Comentarios</th>
    </tr>
  <?php
  use App\Models\Obra;
  $googleUrl="https://drive.google.com/uc?export=play&id=";
  $obras=Obra::where('obras.grupo', session('grupo'))
    ->leftJoin('grupos', 'obras.grupo', '=', 'grupos.grupo')
    ->select('*')
    ->orderBy('titulo')->get();
  foreach ($obras as $obra) {
  ?>
  <tr>
    <td>
      <h4>
        <strong>{{$obra->titulo}}</strong>
        @if($obra->titulo_alt!='')<br>{{$obra->titulo_alt}}@endif
      </h4>
      <div class="btn-group" role="group" aria-label="...">
        @if($obra->url_audio1!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio1}}" role="button" class="btn btn-primary">{{$obra->desc_audio1}}</a>@endif
        @if($obra->url_audio2!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio2}}" role="button" class="btn btn-primary">{{$obra->desc_audio2}}</a>@endif
        @if($obra->url_audio3!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio3}}" role="button" class="btn btn-primary">{{$obra->desc_audio3}}</a>@endif
        @if($obra->url_audio4!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio4}}" role="button" class="btn btn-primary">{{$obra->desc_audio4}}</a>@endif
        @if($obra->url_audio5!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio5}}" role="button" class="btn btn-primary">{{$obra->desc_audio5}}</a>@endif
        @if($obra->url_audio6!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio6}}" role="button" class="btn btn-primary">{{$obra->desc_audio6}}</a>@endif
      </div>
    </td>
    <td>
      <p>
        {{$obra->autor}}
        @if($obra->titulo_alt!='')<br><br> @endif
      </p>
      @if($obra->url_partitura!='')<a href="{{$googleUrl.$obra->url_partitura}}" role="button" class="btn btn-primary">Partitura</a>@endif
    </td>
    <td>{{$obra->categorias}}</td>
    <td>{{$obra->comentario}}</td>
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