<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    use HasFactory;
    protected $table = 'configuracoes';

    protected $fillable = ['nome', 'endereco', 'telefone', 'googlemaps', 'rodape', 'instagram', 'twitter', 'facebook', 'whatsapp', 'youtube', 'spotify', 'descricao_contato'];

    public static function rules(){
        $regras = [
            'arquivo' => 'image'
        ];

        return $regras;
    }

    public static function feedback(){
        $feedback = [
            'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];

        return $feedback;
    }

    public function arquivo(){
        return $this->hasOne('App\Models\Arquivo', 'configuracao_id');
    }

    public static function getConfig()
    {
        return Configuracao::find(1);
    }
}
