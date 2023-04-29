<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class SiteVideoController extends Controller
{
    public function index(Request $request){

        $query = Video::query();
        $query->orderBy('data_publicacao','desc');
        if ($request->has('termo')) {
            $query->where('titulo', 'LIKE', '%' . $request->termo . '%');
        }
    
        $videos = $query->simplePaginate(16);

        return view('site.midia-video.index', ['videos' => $videos, 'request' => $request->all()]);
    }

    public function view($id){

        $video = Video::find($id);

        if(!$video){
            abort(404, "Midía de Vídeo não encontrado.");
        }

        return view('site.midia-video.view', ['video' => $video]);
    }
}
