<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UsuarioController;
use \App\Http\Controllers\MiembrosController;
use \App\Http\Controllers\ObraController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/issel', function () {
    return view('issel');
})->name('issel');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Route::get('/pwReset', function () {
    return view('pwReset');
})->name('pwReset');

Route::get('/pwChange', function () {
    return view('pwChange');
})->name('pwChange');

Route::get('/persChange', function () {
    return view('persChange');
})->name('persChange');

// Route::get('/admin', function () {
//     return view('admin');
// })->name('admin');

Route::get('logout',[UsuarioController::class,'logout'])->name('logout');

Route::post('login',[UsuarioController::class,'login']);
Route::post('registro',[UsuarioController::class,'registro']);
Route::post('pwReset',[UsuarioController::class,'pwReset']);
Route::post('pwChange',[UsuarioController::class,'pwChange']);
Route::post('persChange',[UsuarioController::class,'persChange']);

Route::post('usuarioDelete',[UsuarioController::class,'usuarioDelete'])->name('usuarioDelete');
Route::post('usuarioEdit',[UsuarioController::class,'usuarioEdit'])->name('usuarioEdit');

// Route::get('test',[UsuarioController::class,'test']);

Route::prefix('/miembros')->group(function(){
    // Route::get('/partituras',[MiembrosController::class,'partituras'])->name('partituras')->middleware('LogedMiembros');
    // Route::get('/audios',[MiembrosController::class,'audios'])->name('audios')->middleware('LogedMiembros');
    // Route::get('/fotos',[MiembrosController::class,'fotos'])->name('fotos')->middleware('LogedMiembros');
    // Route::get('/videos',[MiembrosController::class,'videos'])->name('videos')->middleware('LogedMiembros');
    Route::get('/repertorio',function () {return view('repertorio');})->name('repertorio')->middleware('LogedMiembros');
    Route::get('/ensayo',function () {return view('ensayo');})->name('ensayo')->middleware('LogedMiembros');
});

Route::prefix('/obra')->group(function(){
    Route::get('/index',[ObraController::class,'index'])->name('obraIndex');
    Route::get('/create',[ObraController::class,'create'])->name('obraCreate');
    Route::post('/store',[ObraController::class,'store'])->name('obraStore');
    Route::get('/edit/{id}',[ObraController::class,'edit'])->name('obraEdit');
    Route::post('/update/{id}',[ObraController::class,'update'])->name('obraUpdate');
    Route::delete('/delete/{id}',[ObraController::class,'destroy'])->name('obraDelete');
});

Route::prefix('/usuario')->group(function(){
    Route::get('/index',[UsuarioController::class,'index'])->name('usuarioIndex');
});

Route::get('/sobrenosotros', function () {
    return view('sobrenosotros');
})->name('sobrenosotros');

Route::get('/{nombre?}', function () {
    return view('noencontrado');
});
