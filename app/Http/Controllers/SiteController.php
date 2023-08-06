<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Video;
use App\Models\Foto;
use App\Models\Noticia;
use App\Models\Membro;

class SiteController extends Controller
{
    public function site(){
        $banners = Banner::orderBy('ordem','asc')->where('tipo_posicao', 'cap')->where('ativo', 1)->get()->all();
        $bannerCapa = Banner::orderBy('ordem','asc')->where('tipo_posicao', 'igr')->where('ativo', 1)->first();
        $noticias = Noticia::orderBy('data_publicacao','desc')->where('ativo', 1)->where('destaque', 1)->get()->take(6);
        $imagens = Foto::orderBy('data_publicacao','desc')->where('destaque', 1)->get()->take(5);
        $video = Video::orderBy('data_publicacao','desc')->where('destaque', 1)->get()->take(1)->first();
        $devocional = Video::orderBy('data_publicacao','desc')->where('devocional', 1)->get()->take(1)->first();
        $membros = Membro::orderBy('ordem', 'asc')->where('ativo', 1)->get()->take(4);
       
        return view('site.principal.index', [
            'banners'=>$banners,
            'video' => $video,
            'bannerCapa' => $bannerCapa,
            'imagens' => $imagens,
            'noticias' => $noticias,
            'devocional' => $devocional,
            'membros' => $membros
        ]);
    }
}
