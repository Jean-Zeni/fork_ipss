<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;

class SitePaginaController extends Controller
{
    public function view($id){

        $pagina = Pagina::whereId($id)->where('ativo',1)->first();

        if(!$pagina){
            abort(404, "Página não encontrado.");
        }

        return view('site.pagina.view', ['pagina' => $pagina]);
    }
}
