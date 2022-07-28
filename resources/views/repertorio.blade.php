@extends('layouts.master')

@section('content')
<h3>Repertorio</h3>
<hr>
<?php if(session('error')){?>
    <p class="alert alert-danger"><?=session('error')?></p>
<?php }?>
  <?php
  use App\Models\Obra;
  $googleUrl="https://drive.google.com/uc?export=play&id=";
  $obras=Obra::where('obras.grupo', session('grupo'))
    ->leftJoin('grupos', 'obras.grupo', '=', 'grupos.grupo')
    ->select('*')
    ->orderBy('titulo')->get();
  foreach ($obras as $obra) {
  ?>
  <div  class="row">
    <div class="col-md-4">
      <h4>
      <a href="{{$googleUrl.$obra->url_partitura}}"><strong>{{$obra->titulo}}</strong></a>
        @if($obra->titulo_alt!='')<br>{{$obra->titulo_alt}}@endif
        @if($obra->autor!='')<br>{{$obra->autor}}@endif
        @if($obra->categorias!='')<br>{{$obra->categorias}}@endif
        @if($obra->comentario!='')<br>{{$obra->comentario}}@endif
      </h4>
    </div>
      <div class="col-md-8">
        @if($obra->url_audio1!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio1}}" role="button" class="btn btn-primary">{{$obra->desc_audio1}}</a>@endif
        @if($obra->url_audio2!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio2}}" role="button" class="btn btn-primary">{{$obra->desc_audio2}}</a>@endif
        @if($obra->url_audio3!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio3}}" role="button" class="btn btn-primary">{{$obra->desc_audio3}}</a>@endif
        @if($obra->url_audio4!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio4}}" role="button" class="btn btn-primary">{{$obra->desc_audio4}}</a>@endif
        @if($obra->url_audio5!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio5}}" role="button" class="btn btn-primary">{{$obra->desc_audio5}}</a>@endif
        @if($obra->url_audio6!='')<a href="./ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio6}}" role="button" class="btn btn-primary">{{$obra->desc_audio6}}</a>@endif
      </div>
    </div>
  <?php
  }
  ?>
<style>
  th {
    background-color: #E7E7E7;
  }
</style>
@endsection