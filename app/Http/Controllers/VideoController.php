<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $videos = Video::orderBy('id', 'desc')->paginate(10);

        return view('admin.midia-video.index', ['videos' => $videos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.midia-video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Video::rules(), Video::feedback());
        $video = new Video();
        $videoCriado = $video->create($request->all());
        if($videoCriado){
            alert()->success('Concluído','Registro adicionado com sucesso.');
        }
        return redirect()->route('video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('admin.midia-video.show', ['video' => $video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.midia-video.edit', ['video' => $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate(Video::rules(), Video::feedback());
        if($video->update($request->all())){
            alert()->success('Concluído','Registro atualizado com sucesso.');
        }
        return redirect()->route('video.show', ['video' => $video->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        if($video->delete()){
            alert()->success('Concluído','Registro removido com sucesso.');
            return redirect()->route('video.index');
        }
        return redirect()->back();
        alert()->error('ErrorAlert','Não foi possível deletar.');
       
    }
}
