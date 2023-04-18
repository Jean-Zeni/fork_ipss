<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class SiteContatoController extends Controller
{
    public function index(){
       
        return view('site.contato.index');
    }

    public function SaveContato(Request $request)
    {
        //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $regras = [
                'nome' => 'required|max:150',
                'email' => 'required|email',
                'telefone' => 'required|max:15',
                'mensagem' => 'required',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.max' => 'O campo :attribute não pode ultrapassar 150 caracteres.',
                'telefone.max' => 'O campo :attribute não pode ultrapassar 15 caracteres.',
                'email.email' => 'Digite um email válido.'
            ];


            $request->validate($regras, $feedback);
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
                alert()->success('Concluído','Contato realizado com sucesso.');
                return redirect()->route('site.contato');
            }else{
                alert()->error('ErrorAlert','Não foi possível realizar o contato.');
            }
        }
    }
}
