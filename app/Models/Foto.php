<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'resumo', 'descricao', 'credito', 'link', 'data_publicacao', 'ativo', 'destaque'];

    protected $dates = ['created_at', 'updated_at', 'data_publicacao'];

    public static function rules(){
        $regras = [
            'titulo' => 'required|max:256',
            'resumo' => 'required|max:512',
            'descricao' => 'required',
            'images[]' => 'image'
        ];

        return $regras;
    }

    public static function feedback(){
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'titulo.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'resumo.max' => 'O campo :attribute não pode ultrapassar 512 caracteres.',
            'images.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];

        return $feedback;
    }

    public function arquivos(){
        return $this->hasMany('App\Models\Arquivo');
    }
}
