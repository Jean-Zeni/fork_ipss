<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Igreja extends Model
{
    use HasFactory;
    
    protected $attributes = ['congregacao' => false];

    protected $fillable = ['nome', 'resumo', 'endereco', 'link_site', 'latitude', 'longitude', 'ativo', 'igreja_sapucaia', 'congregacao'];

    protected $dates = ['created_at', 'updated_at'];

    public static function rules(): array
    {
        return [
            'nome' => 'required|max:256',
            'latitude' => 'required|max:115',
            'longitude' => 'required|max:115',
            'resumo' => 'max:512',
            'link_site' => 'max:256',
            'ativo' => 'boolean',
            'igreja_sapucaia' => 'boolean',
            'congregacao' => 'boolean',
            'arquivo' => 'image'
        ];
    }

    public static function feedback(): array
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'link_site.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];
    }

    public function arquivo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Arquivo', 'igreja_id');
    }
}
