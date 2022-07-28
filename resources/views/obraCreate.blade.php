@extends('layouts.master')

@section('content')
<?php
  use App\Models\Grupo;
  $grupoDB=Grupo::where('grupo', session('grupo'))
    ->first();
?>
<div class="col-md-4 col-md-offset-4">
    <h3>Añadir obra</h3>
    <form method="POST" action="{{route('obraStore')}}">
        @csrf
        <?php if(session('error')){?>
            <p class="alert alert-danger"><?=session('error')?></p>
        <?php }?>
        <input type="hidden" name="grupo" value="{{session('grupo')}}">
        <div class="form-group">
            <label>Titulo</label>
            <input type="text" name="titulo" required class="form-control">
        </div>
        <div class="form-group">
            <label>Titulo Alt</label>
            <input type="text" name="titulo_alt" class="form-control">
        </div>
        <div class="form-group">
            <label>Autor</label>
            <input type="text" name="autor" class="form-control">
        </div>
        <div class="form-group">
            <label>Categorias</label>
            <input type="text" name="categorias" class="form-control">
        </div>
        <div class="form-group">
            <label>URL Partitura</label>
            <input type="text" name="url_partitura" class="form-control">
        </div>
        <div class="form-group">
            <label>URL Audio {{$grupoDB->desc_audio1}}</label>
            <input type="text" name="url_audio1" class="form-control">
        </div>
        <div class="form-group">
            <label>URL Audio {{$grupoDB->desc_audio2}}</label>
            <input type="text" name="url_audio2" class="form-control">
        </div>
        <div class="form-group">
            <label>URL Audio {{$grupoDB->desc_audio3}}</label>
            <input type="text" name="url_audio3" class="form-control">
        </div>
        <div class="form-group">
            <label>URL Audio {{$grupoDB->desc_audio4}}</label>
            <input type="text" name="url_audio4" class="form-control">
        </div>
        <div class="form-group">
            <label>URL Audio {{$grupoDB->desc_audio5}}</label>
            <input type="text" name="url_audio5" class="form-control">
        </div>
        <div class="form-group">
            <label>URL Audio {{$grupoDB->desc_audio6}}</label>
            <input type="text" name="url_audio6" class="form-control">
        </div>
        <?php if(isset($mensaje)) {
            echo "<p ".($error?"class=error":"").">".$mensaje."</p>";
            if ($error==1062) {
                echo '<button type="submit" class="btn btn-primary" name="submit" value="submit">Enviar</button>';
            }else{
                echo "<a href='home.php' class='btn btn-primary active' role='button'>Volver</a>";
            }
        }else{
            echo '<button type="submit" class="btn btn-primary" name="submit" value="submit">Enviar</button>';
        }?>
    </form>
</div>
@endsection