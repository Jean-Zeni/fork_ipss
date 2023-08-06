<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'resumo', 'autor', 'descricao', 'destaque', 'data_publicacao', 'ativo'];

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

    public function getImagemCapa()
    {

        $arquivo = Arquivo::where('noticia_id', $this->id)->where(
            'tipo' , Arquivo::TIPO_IMAGEM
        )->first();

        if (!$arquivo) {
            return null;
        }

        return $arquivo;
    }


    public function getImagems($id)
    {

        $arquivos = Arquivo::where('noticia_id', $this->id)->where(
            'tipo' , Arquivo::TIPO_IMAGEM
        )->where('id', '!=', $id)->get();

        if (!$arquivos) {
            return null;
        }

        return $arquivos;
    }

    public function arquivos(){
        return $this->hasMany('App\Models\Arquivo');
    }
}
