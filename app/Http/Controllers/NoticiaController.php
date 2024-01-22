<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Arquivo;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $noticias = Noticia::orderBy('id', 'desc')->paginate(20);

        return view('admin.noticia.index', ['noticias' => $noticias, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(Noticia::rules(), Noticia::feedback());
        $noticia = new Noticia();
        $noticiaCriado = $noticia->create($request->all());
        if($noticiaCriado){
            alert()->success('Concluído','Registro adicionado com sucesso.');
        }
        if($request->hasFile('images')){
            Arquivo::salvarArquivos($request, 'images', $noticiaCriado, 'noticia');
        }
        return redirect()->route('noticia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticium)
    {
        return view('admin.noticia.show', ['noticium' => $noticium]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticium)
    {
        return view('admin.noticia.edit', ['noticium' => $noticium]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticium)
    {
        $request->validate(Noticia::rules(), Noticia::feedback());
    
        if($request->hasFile('images')){
            Arquivo::salvarArquivos($request, 'images', $noticia, 'noticia');
        }
        
        $noticia->update($request->all());
        alert()->success('Concluído','Registro atualizado com sucesso.');
        return redirect()->route('noticia.show', ['noticium' => $noticium->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticium)
    {
        if($noticia->arquivos){
            foreach($noticia->arquivos as $arquivo){
                $arquivo->excluirPastaArquivo('noticia');
                $arquivo->delete();
            }
        }
        $noticia->delete();

        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('noticia.index');
    }
}
