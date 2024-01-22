<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pagina;
use App\Models\Arquivo;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginas = Pagina::orderBy('id', 'desc')->paginate(20);

        return view('admin.pagina.index', ['paginas' => $paginas, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pagina.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Pagina::rules(), Pagina::feedback());
        $pagina = new Pagina();
        $paginaCriado = $pagina->create($request->all());
        if($paginaCriado){
            alert()->success('Concluído','Registro adicionado com sucesso.');
        }
        if($request->hasFile('arquivos')){
            Arquivo::salvarArquivos($request, 'arquivos', $paginaCriado, 'pagina');
        }
        
        return redirect()->route('pagina.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pagina $pagina)
    {
        return view('admin.pagina.show', ['pagina' => $pagina]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagina $pagina)
    {
        return view('admin.pagina.edit', ['pagina' => $pagina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagina $pagina)
    {
        $request->validate(Pagina::rules(), Pagina::feedback());
         
        if($request->hasFile('arquivos')){
            Arquivo::salvarArquivos($request, 'arquivos', $pagina, 'pagina');
        }
        
        $pagina->update($request->all());
        alert()->success('Concluído','Registro atualizado com sucesso.');
        
        return redirect()->route('pagina.show', ['pagina' => $pagina->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagina $pagina)
    {
        if($pagina->arquivos){
            foreach($pagina->arquivos as $arquivo){
                $arquivo->excluirPastaArquivo('pagina');
                $arquivo->delete();
            }
        }
        $pagina->delete();
    
        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('pagina.index');
    }
}
