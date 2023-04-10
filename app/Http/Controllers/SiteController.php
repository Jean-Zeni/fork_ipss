<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class SiteController extends Controller
{
    public function site(){
        $banners = Banner::orderBy('ordem','desc')->where('tipo_posicao', 'cap')->where('ativo', 1)->get()->all();
       
        return view('site.index', [
            'banners'=>$banners
        ]);
    }
}
