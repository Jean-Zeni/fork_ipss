<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    use HasFactory;
    protected $table = 'configuracoes';

    protected $fillable = ['nome', 'endereco', 'telefone', 'googlemaps', 'rodape', 'instagram', 'twitter', 'facebook', 'whatsapp', 'youtube', 'spotify', 'descricao_contato'];

    public static function rules(): array
    {
        return [
            'arquivo' => 'image'
        ];
    }

    public static function feedback(): array
    {
        return [
            'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
        ];
    }

    public function arquivo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Arquivo', 'configuracao_id');
    }

    public static function getConfig()
    {
        return Configuracao::find(1);
    }
}
