<?php
  use App\Models\Obra;
?>
@extends('layouts.master')
 
<!-- @section('title', 'Bienvenidos a nuestra web') -->

@if(!session('nombreGrupo'))
  @section('content')
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <h3>Estás accediendo a la Web de corales de Gustavo.</h3>
      <h3>En ella encontrarás recursos y herramientas para mejorar tus habilidades corales.</h3>
      <h3>Pulsa en Login en el menú superior para acceder a la web de tu grupo coral.</h3>
      <h3>El acceso es por invitación. Ponte en contacto conmigo si quieres que te de de alta en la web.</h3>
    </div>
  </div>
  @endsection
@else
  @section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3>Bienvenido a la Web de {{session('nombreGrupo')}}</h3>
      <h3>Pulsa en tu nombre en el menú superior para cambiar tus datos, tu contraseña o salir.</h3>
      <h3>Pulsa en Repertorio para acceder a las partituras y páginas de ensayo.</h3>
      <?php if(session('obrasEnsayo')): ?>
        <div  class="bg-info" style="padding: 20px 30px;">
          <h3>Las obras a preparar para los próximos ensayos son:</h3>
              <?php
                $googleUrl="https://drive.google.com/uc?export=play&id=";
                $obras=Obra::where('obras.grupo', session('grupo'))
                  ->leftJoin('grupos', 'obras.grupo', '=', 'grupos.grupo')
                  ->select('*')
                  ->orderBy('titulo')->get();
                foreach ($obras as $obra) {
                  if(str_contains(session('obrasEnsayo').",", $obra->id_obra.","  )): ?>
                    <div class="row">
                      <div class="col-md-4">
                        <h4><a href="{{$googleUrl.$obra->url_partitura}}">{{$obra->titulo}}</a></h4>
                      </div>
                      <div class="col-md-8">
                        @if($obra->url_audio1!='')<a href="/miembros/ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio1}}" role="button" class="btn btn-primary">{{$obra->desc_audio1}}</a>@endif
                        @if($obra->url_audio2!='')<a href="/miembros/ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio2}}" role="button" class="btn btn-primary">{{$obra->desc_audio2}}</a>@endif
                        @if($obra->url_audio3!='')<a href="/miembros/ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio3}}" role="button" class="btn btn-primary">{{$obra->desc_audio3}}</a>@endif
                        @if($obra->url_audio4!='')<a href="/miembros/ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio4}}" role="button" class="btn btn-primary">{{$obra->desc_audio4}}</a>@endif
                        @if($obra->url_audio5!='')<a href="/miembros/ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio5}}" role="button" class="btn btn-primary">{{$obra->desc_audio5}}</a>@endif
                        @if($obra->url_audio6!='')<a href="/miembros/ensayo?partitura={{$obra->url_partitura}}&audio={{$obra->url_audio6}}" role="button" class="btn btn-primary">{{$obra->desc_audio6}}</a>@endif
                      </div>
                    </div>
                    <?php
                  endif;
                }
              ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  @endsection
@endif
