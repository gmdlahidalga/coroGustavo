@extends('layouts.master')

@section('content')
<div class="col-md-4 col-md-offset-4">
    <h3>Registro de nuevo usuario</h3>
    <form method="POST" action="{{url('registro')}}">
        @csrf
        <?php if(session('error')){?>
            <p class="alert alert-danger"><?=session('error')?></p>
        <?php }?>
        <div class="form-group">
            <label>Grupo</label>
            <input type="text" name="grupo" value="<?=$grupo ?? ''?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?=$nombre ?? ''?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" name="apellidos" value="<?=$apellidos ?? ''?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?=$email ?? ''?>" required class="form-control">
        </div>
        <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="usuario" value="<?=$usuario ?? ''?>" required class="form-control">
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="text" name="contrasena" value="<?=$contrasena ?? ''?>" required class="form-control">
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