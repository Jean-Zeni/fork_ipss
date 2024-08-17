<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use App\Models\Reflexao;
use Illuminate\Http\Request;

class ReflexaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reflexoes = Reflexao::orderBy('id', 'desc')->paginate(20);

        return view('admin.reflexao.index', ['reflexoes' => $reflexoes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $membros = Membro::all();

        return view('admin.reflexao.create', ['membros' => $membros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Reflexao::rules(), Reflexao::feedback());
        $reflexao = new Reflexao();
        $reflexaoCriado = $reflexao->create($request->all());
        if($reflexaoCriado){
            alert()->success('Concluído','Registro adicionado com sucesso.');
        }
        return redirect()->route('reflexao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reflexao  $reflexao
     * @return \Illuminate\Http\Response
     */
    public function show(Reflexao $reflexao)
    {
        return view('admin.reflexao.show', ['reflexao' => $reflexao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reflexao  $reflexao
     * @return \Illuminate\Http\Response
     */
    public function edit(Reflexao $reflexao)
    {
        $membros = Membro::all();

        return view('admin.reflexao.edit', ['reflexao' => $reflexao, 'membros' => $membros]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reflexao  $reflexao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reflexao $reflexao)
    {
        $request->validate(Reflexao::rules(), Reflexao::feedback());
    
        $reflexao->update($request->all());
        alert()->success('Concluído','Registro atualizado com sucesso.');
        return redirect()->route('reflexao.show', ['reflexao' => $reflexao->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reflexao  $reflexao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reflexao $reflexao)
    {
        $reflexao->delete();

        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('reflexao.index');
    }
}
