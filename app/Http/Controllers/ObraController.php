<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('obraIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obraCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($_POST['submit'])) {
            $obraDB= new Obra;
            $obraDB->titulo=$request->titulo;
            $obraDB->titulo_alt=$request->titulo_alt;
            $obraDB->autor=$request->autor;
            $obraDB->categorias=$request->categorias;
            $obraDB->url_audio1=$request->url_audio1;
            $obraDB->url_audio2=$request->url_audio2;
            $obraDB->url_audio3=$request->url_audio3;
            $obraDB->url_audio4=$request->url_audio4;
            $obraDB->url_audio5=$request->url_audio5;
            $obraDB->url_audio6=$request->url_audio6;
            $obraDB->url_partitura=$request->url_partitura;
            $obraDB->comentario=$request->comentario;
            $obraDB->grupo=$request->grupo;

            $obraDB->save();
            return redirect(route('obraCreate'))    ->with('status','Obra '.$request->titulo.' añadida correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    public function edit($id)
    {
        return view('obraEdit',['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obraDB = Obra::find($id);
        $obraDB->titulo=$request->titulo;
        $obraDB->titulo_alt=$request->titulo_alt;
        $obraDB->autor=$request->autor;
        $obraDB->categorias=$request->categorias;
        $obraDB->url_audio1=$request->url_audio1;
        $obraDB->url_audio2=$request->url_audio2;
        $obraDB->url_audio3=$request->url_audio3;
        $obraDB->url_audio4=$request->url_audio4;
        $obraDB->url_audio5=$request->url_audio5;
        $obraDB->url_audio6=$request->url_audio6;
        $obraDB->url_partitura=$request->url_partitura;
        $obraDB->comentario=$request->comentario;

        $obraDB->save();
        return redirect(route('obraIndex'))->with('status','Obra '.$request->titulo.' modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obraDB = Obra::find($id);
        $titulo = $obraDB->titulo;
        $obraDB->delete();
        return redirect(route('obraIndex'))->with('status','Obra '.$titulo.' borrada correctamente');
    }

}
