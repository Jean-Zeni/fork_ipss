<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
