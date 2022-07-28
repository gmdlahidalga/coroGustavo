@extends('layouts.master')

@section('content')
<h3>Renovación de contraseña</h3>
<form method="POST" action="{{url('pwReset')}}">
    @csrf 
    <?php if(session('error')){?>
        <p class="alert alert-danger"><?=session('error')?></p>
    <?php }?>
    <div class="form-group">
        <label>Usuario</label>
        <input type="text" name="usuario" class="form-control">
    </div>
    <p>Se enviará a su direccion de email registrada un mensaje con la nueva contraseña.</p>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Enviar</button>
    </div>
    </form>
@endsection