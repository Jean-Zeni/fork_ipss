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

}
