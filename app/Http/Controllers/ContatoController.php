<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contatos = Contato::paginate(10);

        return view('admin.contato.index', ['contatos' => $contatos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contato.create');
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
            $request->validate(Contato::rules(), Contato::feedback());

            $contato = new Contato();
            //vai preencher o objeto de acordo com o request
            $contato->nome = $request->input('nome');
            $contato->email = $request->input('email');
            $contato->telefone = $request->input('telefone');
            $contato->mensagem = $request->input('mensagem');
            $contato->status = Contato::STATUS_ABERTO;
            $contato->tipo = Contato::TIPO_CONTATO;
            $contato->ativo = 1;
            if($contato->save()){
                alert()->success('Concluído','Registro adicionado com sucesso.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato)
    {
        return view('admin.contato.show', ['contato' => $contato]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato)
    {
        return view('admin.contato.edit', ['contato' => $contato]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato)
    {
         //inclusao
         if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $regras = [
                'resposta' => 'required'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido'
            ];


            $request->validate($regras, $feedback);
            //vai preencher o objeto de acordo com o request
            $contato->resposta = $request->input('resposta');
            $contato->status = $request->input('status');
            $contato->data_resposta = new \DateTime();
            $contato->status = $request->input('status');
            $contato->tipo = Contato::TIPO_CONTATO;
            $contato->ativo = 1;
            if($contato->update()){
                \Illuminate\Support\Facades\Mail::send(new \App\Mail\Contato($contato));
                alert()->success('Concluído','Registro atualizado com sucesso.');
                return redirect()->route('contato.show', ['contato' => $contato->id]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato)
    {
        if($contato->delete()){
            alert()->success('Concluído','Registro removido com sucesso.');
        }else{
             // Em caso de falhas redireciona o usuário de volta e informa que não foi possível deletar
            return redirect()->back();
            alert()->error('ErrorAlert','Não foi possível deletar.');
        }

        return redirect()->route('contato.index');
    }
}
