<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;

class SiteFotoController extends Controller
{
    public function index(Request $request){

        $query = Foto::query();
        $query->orderBy('data_publicacao','desc');
        $query->where('ativo',1);
        if ($request->has('termo')) {
            $query->where('titulo', 'LIKE', '%' . $request->termo . '%');
        }
    
        $fotos = $query->simplePaginate(16);

        return view('site.midia-foto.index', ['fotos' => $fotos, 'request' => $request->all()]);
    }

    public function view($id){

        $foto = Foto::whereId($id)->where('ativo',1)->first();

        if(!$foto){
            abort(404, "Midía de Foto não encontrado.");
        }

        return view('site.midia-foto.view', ['foto' => $foto]);
    }
}
