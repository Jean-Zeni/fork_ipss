<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Membro;
use App\Models\Conselho;
use App\Models\Arquivo;

class MembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $membros = Membro::orderBy('id', 'desc')->paginate(10);

        return view('admin.membro.index', ['membros' => $membros, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conselhos = Conselho::all();

        return view('admin.membro.create', ['conselhos' => $conselhos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Membro::rules(), Membro::feedback());
        $membro = new Membro();
        $membroCriado = $membro->create($request->all());
        if($membroCriado){
            alert()->success('Concluído','Registro adicionado com sucesso.');
        }
        $arquivo = new Arquivo();
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $arquivo->salvarArquivo($request, $membroCriado, 'membro', 'I');
        }
        
        return redirect()->route('membro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Membro $membro)
    {
        return view('admin.membro.show', ['membro' => $membro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Membro $membro)
    {
        $conselhos = Conselho::all();
        return view('admin.membro.edit', ['membro' => $membro, 'conselhos' => $conselhos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membro $membro)
    {  
        $request->validate(Membro::rules(), Membro::feedback());
        $arquivo = new Arquivo();
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $arquivo->salvarArquivo($request, $membro, 'membro', 'I');
        }
        
        $membro->update($request->all());
        alert()->success('Concluído','Registro atualizado com sucesso.');
        
        return redirect()->route('membro.show', ['membro' => $membro->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membro $membro)
    {
        if($membro->arquivo){
            $membro->arquivo->excluirPastaArquivo('membro');
            $membro->arquivo->delete();
            $membro->delete();
        }
            
        $membro->delete();
        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('membro.index');
    }
}
