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
            //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $request->validate(Configuracao::rules(), Configuracao::feedback());

            $table = 'configuracao';
                // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = null;
        
            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
                //se o configuracao tiver arquivo
                if($configuracao->arquivo){
                    //remover aquivo do $configuracao->arquivo da pasta uploads
                    if(Storage::exists("/uploads/configuracao/{$configuracao->arquivo->id}/{$configuracao->arquivo->arquivo}")){
                        Storage::delete("/uploads/configuracao/{$configuracao->arquivo->id}/{$configuracao->arquivo->arquivo}");
                    }else{
                        alert()->error('ErrorAlert','Arquivo não existe.');
                    }
                    //setar o arquivo do $configuracao->arquivo com a $request
                    // Define nome um aleatório para o arquivo baseado no timestamps atual
                    $name = uniqid(date('HisYmd'));
            
                    // Recupera a extensão do arquivo
                    $extension = $request->arquivo->extension();
            
                    // Define finalmente o nome
                    $nameFile = "{$name}.{$extension}";

                    $configuracao->arquivo->arquivo = $nameFile;
                    $configuracao->arquivo->tamanho = $request->arquivo->getSize();
                    $configuracao->arquivo->tipo_mime = $request->arquivo->getMimeType();
                    $configuracao->arquivo->nome_original = $request->arquivo->getClientOriginalName();
                    $configuracao->arquivo->posicao = 1;
                    $configuracao->arquivo->tipo = 'I';
                    
                    $configuracao->arquivo->update();
                    
                    $uploadPath = "uploads/".$table."/".$configuracao->arquivo->id;
                    // Faz o upload:
                    $upload = $request->arquivo->storeAs($uploadPath, $nameFile);
            
                    // Verifica se NÃO deu certo o upload (Redireciona de volta)
                    if ( !$upload ){
                        alert()->error('ErrorAlert','Não foi possível fazer o upload de arquivo.');
                        return redirect()->back();
                    }
                }else{
                    $arquivo = new Arquivo();
                    // Define um aleatório para o arquivo baseado no timestamps atual
                    $name = uniqid(date('HisYmd'));
            
                    // Recupera a extensão do arquivo
                    $extension = $request->arquivo->extension();
            
                    // Define finalmente o nome
                    $nameFile = "{$name}.{$extension}";

                    $arquivo->arquivo = $nameFile;
                    $arquivo->tamanho = $request->arquivo->getSize();
                    $arquivo->tipo_mime = $request->arquivo->getMimeType();
                    $arquivo->nome_original = $request->arquivo->getClientOriginalName();
                    $arquivo->posicao = 1;
                    $arquivo->tipo = 'I';
                    $arquivo->configuracao_id = $configuracao->id;
                    $arquivo->save();
                    
                    $uploadPath = "uploads/".$table."/".$arquivo->id;
                    // Faz o upload:
                    $upload = $request->arquivo->storeAs($uploadPath, $nameFile);
                    // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
            
                    // Verifica se NÃO deu certo o upload (Redireciona de volta)
                    if ( !$upload ){
                        return redirect()->back();
                        alert()->error('ErrorAlert','Não foi possível fazer upload do arquivo.');
                    }
                }
            }
            
            //vai preencher o objeto de acordo com a variavel fillable no model
            if($configuracao->update($request->all())){
                alert()->success('Concluído','Configurações atualizadas com sucesso.');
            }else{
                alert()->error('ErrorAlert','Erro na atualização das configurações.');
            }
        }
        
        return redirect()->route('admin.configuracao.edit', ['configuracao' => $configuracao->id]);
    }

}
