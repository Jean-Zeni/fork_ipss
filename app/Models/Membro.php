<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'funcao', 'resumo', 'ordem', 'ativo'];

    public static function rules(){
        $regras = [
            'nome' => 'required|max:256',
            'telefone' => 'max:18',
            'ordem' => 'required',
            'arquivo' => 'image'
        ];

        return $regras;
    }

    public static function feedback(){
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'telefone.max' => 'O campo :attribute não pode ultrapassar 18 caracteres.',
            'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];

        return $feedback;
    }

    public function arquivo(){
        return $this->hasOne('App\Models\Arquivo', 'membro_id');
    }
}
