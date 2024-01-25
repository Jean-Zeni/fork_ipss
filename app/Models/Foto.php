<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'resumo', 'descricao', 'credito', 'link', 'data_publicacao', 'ativo', 'destaque'];

    protected $dates = ['created_at', 'updated_at', 'data_publicacao'];

    public static function rules(): array
    {
        return [
            'titulo' => 'required|max:256',
            'resumo' => 'required|max:512',
            'descricao' => 'required',
            'images[]' => 'image'
        ];
    }

    public static function feedback(): array
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'titulo.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'resumo.max' => 'O campo :attribute não pode ultrapassar 512 caracteres.',
            'images.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];
    }

    public function arquivos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Arquivo');
    }
}
