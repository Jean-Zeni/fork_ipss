<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Evento;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eventos = Evento::paginate(10);

        return view('admin.evento.index', ['eventos' => $eventos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.evento.create');
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
            $request->validate(Evento::rules(), Evento::feedback());
            $evento = new Evento();
           
            if($evento->create($request->all())){
                alert()->success('Concluído','Registro adicionado com sucesso.');
            }
        }
        return redirect()->route('evento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('admin.evento.show', ['evento' => $evento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('admin.evento.edit', ['evento' => $evento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $request->validate(Evento::rules(), Evento::feedback());
           
            if($evento->update($request->all())){
                alert()->success('Concluído','Registro atualizado com sucesso.');
            }
        }
        return redirect()->route('evento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        if($evento->delete()){
            alert()->success('Concluído','Registro removido com sucesso.');
            return redirect()->route('evento.index');
        }else{
            alert()->error('ErrorAlert','Não foi possível deletar.');
            return redirect()->route('evento.index');
        }
    }
}
