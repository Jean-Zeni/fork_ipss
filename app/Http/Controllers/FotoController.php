<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Foto;
use App\Models\Arquivo;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fotos = Foto::orderBy('id', 'desc')->paginate(10);

        return view('admin.midia-foto.index', ['fotos' => $fotos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.midia-foto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Foto::rules(), Foto::feedback());
        $foto = new Foto();
        $fotoCriado = $foto->create($request->all());
        if($fotoCriado){
            alert()->success('Concluído','Registro adicionado com sucesso.');
        }
        
        if($request->hasFile('images')){
            Arquivo::salvarArquivos($request, 'images', $fotoCriado, 'foto');
        }
        
        return redirect()->route('foto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        return view('admin.midia-foto.show', ['foto' => $foto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        return view('admin.midia-foto.edit', ['foto' => $foto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        $request->validate(Foto::rules(), Foto::feedback());
    
        if($request->hasFile('images')){
            Arquivo::salvarArquivos($request, 'images', $foto, 'foto');
        }
        
        $foto->update($request->all());
        alert()->success('Concluído','Registro atualizado com sucesso.');
        return redirect()->route('foto.show', ['foto' => $foto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        if($foto->arquivos){
            foreach($foto->arquivos as $arquivo){
                $arquivo->excluirPastaArquivo('foto');
                $arquivo->delete();
            }
        }
        $foto->delete();
    
        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('foto.index');
    }
}
