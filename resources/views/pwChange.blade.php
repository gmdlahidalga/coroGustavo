@extends('layouts.master')

@section('content')
<div class="col-md-4 col-md-offset-4">
    <h3>Cambio de contraseña</h3>
    <form method="POST" action="{{url('pwChange')}}">
        @csrf 
        <?php if(session('error')){?>
            <p class="alert alert-danger"><?=session('error')?></p>
        <?php }?>
        <div class="form-group">
            <label>Contraseña actual</label>
            <input type="text" name="currPw" class="form-control">
        </div>
        <div class="form-group">
            <label>Contraseña nueva</label>
            <input type="text" name="newPw" class="form-control">
        </div>    <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Enviar</button>
        </div>
    </form>
</div>
@endsection