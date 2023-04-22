<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conselho extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'ativo'];

    public static function rules(){
        $regras = [
            'nome' => 'required|max:256',
            'arquivo' => 'image'
        ];

        return $regras;
    }

    public static function feedback(){
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];

        return $feedback;
    }

    public function arquivo(){
        return $this->hasOne('App\Models\Arquivo', 'conselho_id');
    }

    public function membros(){
        return $this->hasMany('App\Models\Membro');
    }
}
