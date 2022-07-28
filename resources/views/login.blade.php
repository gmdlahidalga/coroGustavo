@extends('layouts.master')
 
@section('content')
<div class="col-md-4 col-md-offset-4">
    <h3>Login</h3>
    <form method="POST" action="{{url('login')}}">
        @csrf 
        <?php if(session('error')){?>
            <p class="alert alert-danger"><?=session('error')?></p>
        <?php }?>
        <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="usuario" class="form-control">
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Enviar</button>
        </div>
        <a href="{{route('pwReset')}}">Contraseña olvidada. Solicitar nueva contraseña.</a>
    </form>
</div>
@endsection