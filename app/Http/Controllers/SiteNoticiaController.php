<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class SiteNoticiaController extends Controller
{
    public function index(Request $request){

        $query = Noticia::query();
        $query->orderBy('data_publicacao','desc');
        $query->where('ativo',1);
        if ($request->has('termo')) {
            $query->where('titulo', 'LIKE', '%' . $request->termo . '%');
        }
    
        $noticias = $query->simplePaginate(16);

        return view('site.noticia.index', ['noticias' => $noticias, 'request' => $request->all()]);
    }

    public function view($id){

        $noticia = Noticia::whereId($id)->where('ativo',1)->first();

        if(!$noticia){
            abort(404, "Noticia não encontrada.");
        }

        return view('site.noticia.view', ['noticia' => $noticia]);
    }
}
