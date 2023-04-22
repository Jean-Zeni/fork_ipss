<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'funcao', 'resumo', 'ordem', 'ativo', 'conselho_id'];

    public static function rules(){
        $regras = [
            'nome' => 'required|max:256',
            'telefone' => 'max:18',
            'ordem' => 'required',
            'conselho_id' => 'required|exists:conselhos,id',
            'arquivo' => 'image'
        ];

        return $regras;
    }

    public static function feedback(){
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'telefone.max' => 'O campo :attribute não pode ultrapassar 18 caracteres.',
            'conselho_id.exists' => 'O conselho informado não existe!',
            'conselho_id.required' => 'O campo de conselho deve ser selecionado!',
            'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];

        return $feedback;
    }

    public function arquivo(){
        return $this->hasOne('App\Models\Arquivo', 'membro_id');
    }

    public function conselho(){
        return $this->belongsTo('App\Models\Conselho');
    }
}
