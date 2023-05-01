<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Video;
use App\Models\Foto;

class SiteController extends Controller
{
    public function site(){
        $banners = Banner::orderBy('ordem','desc')->where('tipo_posicao', 'cap')->where('ativo', 1)->get()->all();
        $imagens = Foto::orderBy('data_publicacao','desc')->where('destaque', 1)->get()->take(5);
        $video = Video::orderBy('data_publicacao','desc')->where('destaque', 1)->get()->take(1)->first();
        $devocional = Video::orderBy('data_publicacao','desc')->where('destaque', 1)->where('devocional', 1)->get()->take(1)->first();
       
        return view('site.principal.index', [
            'banners'=>$banners,
            'video' => $video,
            'imagens' => $imagens,
            'devocional' => $devocional
        ]);
    }
}
