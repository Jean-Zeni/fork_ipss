<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Conselho;
use App\Models\Membro;
use App\Models\Arquivo;

class ConselhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conselhos = Conselho::orderBy('id', 'desc')->paginate(10);

        return view('admin.conselho.index', ['conselhos' => $conselhos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conselho.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $request->validate(Conselho::rules(), Conselho::feedback());
        $conselho = new Conselho();
        $conselhoCriado = $conselho->create($request->all());
        if($conselhoCriado){
            alert()->success('Concluído','Registro adicionado com sucesso.');
        }
        $arquivo = new Arquivo();
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $arquivo->salvarArquivo($request, $conselhoCriado, 'conselho', 'I');
        }

        return redirect()->route('conselho.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Conselho $conselho)
    {
        return view('admin.conselho.show', ['conselho' => $conselho]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Conselho $conselho)
    {
        return view('admin.conselho.edit', ['conselho' => $conselho]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conselho $conselho)
    {
        $request->validate(Conselho::rules(), Conselho::feedback());

        $arquivo = new Arquivo();
    
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $arquivo->salvarArquivo($request, $conselho, 'conselho', 'I');
        }
        
        $conselho->update($request->all());
        alert()->success('Concluído','Registro atualizado com sucesso.');
        return redirect()->route('conselho.show', ['conselho' => $conselho->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conselho $conselho)
    {
        if($conselho->arquivo){
            $conselho->arquivo->excluirPastaArquivo('conselho');
            $conselho->arquivo->delete();
            $conselho->delete();
        }
            
        $conselho->delete();
        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('conselho.index');
    }
}
