<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reflexao;

class SiteReflexaoController extends Controller
{
    public function index(Request $request){

        $query = Reflexao::query();
        $query->orderBy('id','desc');
        $query->where('ativo',1);
        $reflexoes = $query->simplePaginate(16);

        return view('site.reflexao.index', ['reflexoes' => $reflexoes, 'request' => $request->all()]);
    }

    public function view($id){

        $reflexao = Reflexao::whereId($id)->where('ativo',1)->first();

        if(!$reflexao){
            abort(404, "Reflexão não encontrada.");
        }

        return view('site.reflexao.view', ['reflexao' => $reflexao]);
    }
}
