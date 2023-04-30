<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'resumo', 'descricao', 'link_youtube', 'ativo'];

    public static function rules(){
        $regras = [
            'titulo' => 'required|max:256',
            'resumo' => 'required|max:512',
            'descricao' => 'required',
            'arquivos.*' => 'mimes:jpg,jpeg,png,gif,bmp,webm,webp,svg,doc,docx,pdf,txt,ppt,pptx,odt,xls,xlsx,rar,zip',
        ];

        return $regras;
    }

    public static function feedback(){
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'titulo.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
            'resumo.max' => 'O campo :attribute não pode ultrapassar 512 caracteres.',
            'arquivos.mimes' => 'Arquivo inválido, deve ser de extensões: jpg, jpeg, png, gif, bmp, webm, webp, svg, doc, docx, pdf, txt, ppt, pptx, odt, xls, xlsx, rar, zip'
        ];

        return $feedback;
    }

    public function arquivos(){
        return $this->hasMany('App\Models\Arquivo');
    }

    public function getImagemCapa()
    {

        $arquivo = Arquivo::where('pagina_id', $this->id)->where(
            'tipo' , Arquivo::TIPO_IMAGEM
        )->first();

        if (!$arquivo) {
            return null;
        }

        return $arquivo;
    }


    public function getImagems($id)
    {

        $arquivos = Arquivo::where('pagina_id', $this->id)->where(
            'tipo' , Arquivo::TIPO_IMAGEM
        )->where('id', '!=', $id)->get();

        if (!$arquivos) {
            return null;
        }

        return $arquivos;
    }

    public function getDocumentos()
    {

        $arquivos = Arquivo::where('pagina_id', $this->id)->where(
            'tipo' , Arquivo::TIPO_DOCUMENTO
        )->get();

        if (!$arquivos) {
            return null;
        }

        return $arquivos;
    }

}
