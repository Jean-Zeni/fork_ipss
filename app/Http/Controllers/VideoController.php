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
        $videos = Video::paginate(10);

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
        //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $regras = [
                'titulo' => 'required|max:256',
                'data_publicacao' => 'required',
                'link' => 'required|max:256',
                'resumo' => 'required',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'titulo.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
                'link.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.'
            ];


            $request->validate($regras, $feedback);
            $video = new Video();
            //vai preencher o objeto de acordo com o request
            $video->titulo = $request->input('titulo');
            $video->data_publicacao = $request->input('data_publicacao');
            $video->resumo = $request->input('resumo');
            $video->descricao = $request->input('descricao');
            $video->link = $request->input('link');
            if($request->input('destaque')){
                $video->destaque = $request->input('destaque');
            }else{
                $video->destaque = 0;
            }
            if($request->input('devocional')){
                $video->devocional = $request->input('devocional');
            }else{
                $video->devocional = 0;
            }
            if($video->save()){
                alert()->success('Concluído','Registro adicionado com sucesso.');
            }
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
         //inclusao
         if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $regras = [
                'titulo' => 'required|max:256',
                'data_publicacao' => 'required',
                'link' => 'required|max:256',
                'resumo' => 'required',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'titulo.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
                'link.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.'
            ];


            $request->validate($regras, $feedback);
            if($request->has('destaque') == null){
                $video->destaque = 0;
            }
            if($request->has('devocional') == null){
                $video->devocional = 0;
            }
            //vai preencher o objeto de acordo com a variavel fillable no model
            if($video->update($request->all())){
                alert()->success('Concluído','Registro atualizado com sucesso.');
            }else{
                alert()->error('ErrorAlert','Erro na atualização do registro.');
            }
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
        }else{
             // Em caso de falhas redireciona o usuário de volta e informa que não foi possível deletar
            return redirect()->back();
            alert()->error('ErrorAlert','Não foi possível deletar.');
        }

        return redirect()->route('video.index');
    }
}
