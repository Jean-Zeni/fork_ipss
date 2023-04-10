<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'data_inicio', 'data_fim', 'tipo_documento', 'link', 'tipo_posicao', 'ordem', 'ativo', 'nova_guia'];

    protected $dates = ['created_at', 'updated_at', 'data_inicio', 'data_fim'];
    
    public function arquivo(){
        return $this->hasOne('App\Models\Arquivo', 'banner_id');
    }
}
