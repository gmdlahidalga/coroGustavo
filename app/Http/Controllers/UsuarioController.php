<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarioIndex');
    }

    public function login(Request $request)
    {
        if(isset($_POST['usuario']) && isset($_POST['password'])){
            function validate ($data) {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $usuario=validate($request->usuario);
            $password=validate($request->password);

            if (empty($usuario)){
                $error="Introduzca un usuario";
            }else if (empty($password)){
                $error="Introduzca un contraseña";
            }else{
                $usuarioDB=Usuario::where('usuario', $usuario)
                ->leftJoin('grupos', 'usuarios.grupo', '=', 'grupos.grupo')
                ->select('*')->first();
                if(!is_null($usuarioDB)){
                    if($usuarioDB->usuario===$usuario) {
                        $pepper = config('app.pepper');
                        $pwd_peppered = hash_hmac("sha256", $password, $pepper);
                        $pwd_hashed = $usuarioDB->password;
                        if (password_verify($pwd_peppered, $pwd_hashed)) {
                            session()->flush();
                            session()->put(['usuario' => $usuarioDB->usuario]);
                            session()->put(['nombre' => $usuarioDB->nombre]);
                            session()->put(['apellidos' => $usuarioDB->apellidos]);
                            session()->put(['email' => $usuarioDB->email]);
                            session()->put(['grupo' => $usuarioDB->grupo]);
                            session()->put(['nombreGrupo' => $usuarioDB->nombre_grupo]);
                            session()->put(['bannerGrupo' => $usuarioDB->banner_grupo]);
                            session()->put(['obrasEnsayo' => $usuarioDB->obras_ensayo]);
                            if(str_contains($usuarioDB->admin, $usuarioDB->usuario)) {
                                session()->put(['admin' => true]);
                            }
                            if(str_contains(config('app.superUser'), $usuarioDB->usuario)) {
                                session()->put(['superUser' => true]);
                            }
                            // print_r(session()->all());
                            // exit();
                            return redirect(route('welcome'))->with('status','Usuario '.$usuarioDB->usuario.' conectado');
                        }
                        else {
                            $error="Usuario y contraseña incorrectos";
                        }
                    }else {
                        $error="Usuario y contraseña incorrectos";
                    }
                }else {
                    $error="Usuario y contraseña incorrectos";
                }
            }
        }
        if ($error) {
            return redirect(route('login'))->with('error',$error);
        }
    }

    public function logout(){
        $usuario=session('usuario');
        session()->flush();
        return redirect(route('welcome'))->with('status','Usuario '.$usuario.' desconectado');
    }

    public function registro(Request $request) {
        if (isset($_POST['submit'])) {
            $usuarioDB=Usuario::where('usuario', $request->usuario)->first();
            if(is_null($usuarioDB)) {
                $pepper = config('app.pepper');
                $pwd_peppered = hash_hmac("sha256", $request->contrasena, $pepper);
                $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
    
                $usuarioDB= new Usuario;
                $usuarioDB->grupo=$request->grupo;
                $usuarioDB->usuario=$request->usuario;
                $usuarioDB->password=$pwd_hashed;
                $usuarioDB->nombre=$request->nombre;
                $usuarioDB->apellidos=$request->apellidos;
                $usuarioDB->email=$request->email;
                $usuarioDB->save();
                return redirect('registro')->with('status','Usuario '.$request->usuario.' añadido correctamente');
            }else{
                return redirect('registro')->with('error','Usuario duplicado');
            }
        }
    }

    public function pwReset (Request $request) {
        if(isset($_POST['submit'])){
            function validate ($data) {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $usuario=validate($request->usuario);
        
            if (empty($usuario)){
                $error="Introduzca un usuario";
            }else{
                $usuarioDB=Usuario::where('usuario', $request->usuario)->first();
                if(!is_null($usuarioDB)) {
                    $pepper = config('app.pepper');
                    $password= random_int(0000,9999);

                    $pwd_peppered = hash_hmac("sha256", $password, $pepper);
                    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
                    $usuarioDB->password=$pwd_hashed;
                    $usuarioDB->save();
                    return redirect('login')->with('status',"Nueva contraseña enviada a $usuarioDB->email.($password)");
                }else{
                    return redirect('login')->with('status',"Nueva contraseña enviada a la direccion de email registrada");
                }
            }
        }
    }

    public function pwChange (Request $request) {
        if(isset($_POST['currPw']) && isset($_POST['newPw'])){
            function validate ($data) {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $usuario=session('usuario');
            $currPw=validate($request->currPw);
            $newPw=validate($request->newPw);

            if (empty($currPw)){
                $error="Introduzca la contraseña actual";
            }else if (empty($newPw)){
                $error="Introduzca la nueva contraseña";
            }else{
                $usuarioDB=Usuario::where('usuario', $usuario)->first();
                if(!is_null($usuarioDB)){
                    if($usuarioDB->usuario===$usuario) {
                        $pepper = config('app.pepper');
                        $pwd_peppered = hash_hmac("sha256", $currPw, $pepper);
                        $pwd_hashed = $usuarioDB->password;
                        if (password_verify($pwd_peppered, $pwd_hashed)) {
                            $pwd_peppered = hash_hmac("sha256", $newPw, $pepper);
                            $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
                            $usuarioDB->password=$pwd_hashed;
                            $usuarioDB->save();
                            return redirect(route('pwChange'))->with('status','Contraseña cambiada correctamente');
                        }
                        else {
                            $error="Contraseña incorrecta";
                        }
                    }else {
                        $error="Usuario incorrecto";
                    }
                }else {
                    $error="Usuario incorrecto";
                }
            }
        }
        if ($error) {
            return redirect(route('pwChange'))->with('error',$error);
        }
    }
    public function persChange (Request $request) {
        if (isset($_POST['submit'])) {
            $usuarioDB=Usuario::where('usuario', session('usuario'))->first();
            if(!is_null($usuarioDB)) {
                $usuarioDB->nombre=$request->nombre;
                $usuarioDB->apellidos=$request->apellidos;
                $usuarioDB->email=$request->email;
                $usuarioDB->save();
                session()->put(['nombre' => $request->nombre]);
                session()->put(['apellidos' => $request->apellidos]);
                session()->put(['email' => $request->email]);
                return redirect('persChange')->with('status','Información personal cambiada correctamente');
            }else{
                return redirect('persChange')->with('error','Error al cambiar la información personal');
            }
        }
    }
    public function usuarioDelete (Request $request) {
        if (isset($_POST['usuarioDel'])) {
            if($request->usuarioDel!=session('usuario')) {
                $usuarioDB=Usuario::where('usuario', $request->usuarioDel)->first();
                if(!is_null($usuarioDB)) {
                    Usuario::destroy($request->usuarioDel);
                    return redirect('usuarioIndex')->with('status','Usuario '.$request->usuarioDel.' eliminado correctamente');
                }else{
                    return redirect('usuarioIndex')->with('error','Error al eliminar el usuario '.$request->usuarioDel);
                }
            }else {
                return redirect('usuarioIndex')->with('error','Un usuario no puede borrarse a si mismo.');
            }
        }
    }
}
