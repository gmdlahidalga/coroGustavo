@extends('layouts.master')

@section('content')
<div class="col-md-4 col-md-offset-4">
    <h3>Cambio de datos personales</h3>
    <form method="POST" action="{{url('persChange')}}">
        @csrf
        <?php if(session('error')){?>
            <p class="alert alert-danger"><?=session('error')?></p>
        <?php }?>
        <div class="form-group">
            <label>Nombre de usuario</label>
            <input type="text" name="usuario" value="<?=session('usuario') ?? ''?>" disabled class="form-control">
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?=session('nombre') ?? ''?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" name="apellidos" value="<?=session('apellidos') ?? ''?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?=session('email') ?? ''?>" required class="form-control">
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