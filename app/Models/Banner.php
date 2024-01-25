<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'data_inicio', 'data_fim', 'tipo_documento', 'link', 'tipo_posicao', 'ordem', 'ativo', 'nova_guia'];

    protected $dates = ['created_at', 'updated_at', 'data_inicio', 'data_fim'];

    public static function rules(): array
    {
        return [
            'titulo' => 'required|max:256',
            'data_inicio' => 'required',
            'data_fim' => 'required',
            'link' => 'max:256',
            'ordem' => 'required',
            'arquivo' => 'image'
        ];
    }

    public static function feedback(): array
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'titulo.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'link.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'arquivo_id.exists' => "O fornecedor informado não existe!",
            'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];
    }

    public function arquivo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Arquivo', 'banner_id');
    }
}
