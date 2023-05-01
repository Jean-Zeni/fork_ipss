<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class SiteContatoController extends Controller
{
    public function index(){
       
        return view('site.contato.index');
    }

    public function evangelismo(){
       
        return view('site.contato-evangelismo.index');
    }

    public function SaveContato(Request $request)
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
                \Illuminate\Support\Facades\Mail::send(new \App\Mail\Contato($contato));
                alert()->success('Concluído','Contato realizado com sucesso.');
                return redirect()->route('site.contato');
            }else{
                alert()->error('ErrorAlert','Não foi possível realizar o contato.');
            }
        }
    }

    public function SaveContatoEvangelismo(Request $request)
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
            $contato->tipo = Contato::TIPO_CONTATO_EVANGELISMO;
            $contato->ativo = 1;
            if($contato->save()){
                \Illuminate\Support\Facades\Mail::send(new \App\Mail\Contato($contato));
                alert()->success('Concluído','Contato realizado com sucesso.');
                return redirect()->route('site.contato.evangelismo');
            }else{
                alert()->error('ErrorAlert','Não foi possível realizar o contato.');
            }
        }
    }
}
