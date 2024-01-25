<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conselho extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'ativo'];

    public static function rules(): array
    {
        return [
            'nome' => 'required|max:256',
            'arquivo' => 'image'
        ];
    }

    public static function feedback(): array
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];
    }

    public function arquivo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Arquivo', 'conselho_id');
    }

    public function membros(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Membro');
    }
}
