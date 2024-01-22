<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Configuracao;
use App\Models\Arquivo;

class ConfiguracaoController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuracao $configuracao)
    {
        return view('admin.configuracao.edit', ['configuracao' => $configuracao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuracao $configuracao)
    {
        $request->validate(Configuracao::rules(), Configuracao::feedback());
    
        $arquivo = new Arquivo();
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $arquivo->salvarArquivo($request, $configuracao, 'configuracao', 'I');
        }
        
        $configuracao->update($request->all());
        alert()->success('Concluído','Configurações atualizadas com sucesso.');
        
        return redirect()->route('admin.configuracao.edit', ['configuracao' => $configuracao->id]);
    }

}
