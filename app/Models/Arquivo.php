<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class Arquivo extends Model
{
    const TIPO_DOCUMENTO = 'D';
    const TIPO_IMAGEM = 'I';

    use HasFactory;

    public function foto(){
        return $this->belongsTo('App\Models\Foto');
    }

    public function getPrettyName($maxLength = 30)
    {
        $descricao = trim($this->legenda);
        $nomeOriginal = $this->nome_original;

        $nome = ($descricao) ? $descricao : $nomeOriginal;

        if (strlen($nome) > $maxLength){
            $nome = substr($nome,0,$maxLength).'... '.$this->extensao;
        }

        return $nome;
    }

    public function salvarArquivo($request, $model, $tabela, $tipo){
        $name = uniqid(date('HisYmd'));
        $extension = $request->arquivo->extension();
        $nameFile = "{$name}.{$extension}";

        if($model->arquivo){
            $this->verificaExistenciaArquivo($tabela, $model->arquivo);
            $model->arquivo->arquivo = $nameFile;
            $model->arquivo->tamanho = $request->arquivo->getSize();
            $model->arquivo->tipo_mime = $request->arquivo->getMimeType();
            $model->arquivo->nome_original = $request->arquivo->getClientOriginalName();
            $model->arquivo->posicao = 1;
            $model->arquivo->tipo = $tipo;
            $model->arquivo->update();
            $request->arquivo->storeAs("uploads/".$tabela."/".$model->arquivo->id, $nameFile);
            return;
        }
        
        $this->arquivo = $nameFile;
        $this->tamanho = $request->arquivo->getSize();
        $this->tipo_mime = $request->arquivo->getMimeType();
        $this->nome_original = $request->arquivo->getClientOriginalName();
        $this->posicao = 1;
        $this->tipo = $tipo;
        $this[$tabela.'_id'] = $model->id;
        $this->save();
        $request->arquivo->storeAs("uploads/".$tabela."/".$this->id, $nameFile);
    }

    public function verificaExistenciaArquivo($tabela, $arquivo){
        if(Storage::exists("/uploads/{$tabela}/{$arquivo->id}/{$arquivo->arquivo}")){
            Storage::delete("/uploads/{$tabela}/{$arquivo->id}/{$arquivo->arquivo}");
        }   
    }

    public function excluirPastaArquivo($tabela){ 
        if(Storage::exists("/uploads/{$tabela}/{$this->id}/{$this->arquivo}")){
            unlink(public_path('/storage/uploads/'.$tabela.'/'.$this->id.'/'.$this->arquivo));
            rmdir(public_path('/storage/uploads/'.$tabela.'/'.$this->id));
        }   
    }
}
