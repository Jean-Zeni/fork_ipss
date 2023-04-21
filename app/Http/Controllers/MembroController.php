<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membro;
use App\Models\Arquivo;

class MembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $membros = Membro::paginate(10);

        return view('admin.membro.index', ['membros' => $membros, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membro.create');
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
            $request->validate(Membro::rules(), Membro::feedback());
            $membro = new Membro();
            //vai preencher o objeto de acordo com o request
            $membro->nome = $request->input('nome');
            $membro->email = $request->input('email');
            $membro->telefone = $request->input('telefone');
            $membro->funcao = $request->input('funcao');
            $membro->resumo = $request->input('resumo');
            $membro->ordem = $request->input('ordem');
            if($request->input('ativo')){
                $membro->ativo = $request->input('ativo');
            }else{
                $membro->ativo = 0;
            }
            if($membro->save()){
                alert()->success('Concluído','Registro adicionado com sucesso.');
            }
            $table = 'membro';
            // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = null;
            $arquivo = new Arquivo();
            
        
            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            
                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(date('HisYmd'));
        
                // Recupera a extensão do arquivo
                $extension = $request->arquivo->extension();
        
                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";

                $arquivo->arquivo = $nameFile;
                $arquivo->tamanho = $request->arquivo->getSize();
                $arquivo->tipo_mime = $request->arquivo->getMimeType();
                $arquivo->nome_original = $request->arquivo->getClientOriginalName();
                $arquivo->posicao = 1;
                $arquivo->tipo = 'I';
                $arquivo->membro_id = $membro->id;
                $arquivo->save();
                
                $uploadPath = "uploads/".$table."/".$arquivo->id;
                // Faz o upload:
                $upload = $request->arquivo->storeAs($uploadPath, $nameFile);
                // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
        
                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if ( !$upload ){
                    return redirect()->back();
                    alert()->error('ErrorAlert','Não foi possível fazer upload do arquivo.');
                }
            }

        }
        return redirect()->route('membro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Membro $membro)
    {
        return view('admin.membro.show', ['membro' => $membro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Membro $membro)
    {
        return view('admin.membro.edit', ['membro' => $membro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membro $membro)
    {
        if($request->input('_token') != '' && $request->input('id') == ''){
            
            $request->validate(Membro::rules(), Membro::feedback());

            $table = 'membro';
                // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = null;
        
            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
                //se o membro tiver arquivo
                if($membro->arquivo){
                    //remover aquivo do $membro->arquivo da pasta uploads
                    if(Storage::exists("/uploads/membro/{$membro->arquivo->id}/{$membro->arquivo->arquivo}")){
                        Storage::delete("/uploads/membro/{$membro->arquivo->id}/{$membro->arquivo->arquivo}");
                    }else{
                        alert()->error('ErrorAlert','Arquivo não existe.');
                    }
                    //setar o arquivo do $membro->arquivo com a $request
                    // Define nome um aleatório para o arquivo baseado no timestamps atual
                    $name = uniqid(date('HisYmd'));
            
                    // Recupera a extensão do arquivo
                    $extension = $request->arquivo->extension();
            
                    // Define finalmente o nome
                    $nameFile = "{$name}.{$extension}";

                    $membro->arquivo->arquivo = $nameFile;
                    $membro->arquivo->tamanho = $request->arquivo->getSize();
                    $membro->arquivo->tipo_mime = $request->arquivo->getMimeType();
                    $membro->arquivo->nome_original = $request->arquivo->getClientOriginalName();
                    $membro->arquivo->posicao = 1;
                    $membro->arquivo->tipo = 'I';
                    
                    $membro->arquivo->update();
                    
                    $uploadPath = "uploads/".$table."/".$membro->arquivo->id;
                    // Faz o upload:
                    $upload = $request->arquivo->storeAs($uploadPath, $nameFile);
            
                    // Verifica se NÃO deu certo o upload (Redireciona de volta)
                    if ( !$upload ){
                        alert()->error('ErrorAlert','Não foi possível fazer o upload de arquivo.');
                        return redirect()->back();
                    }
                }else{
                    $arquivo = new Arquivo();
                    // Define um aleatório para o arquivo baseado no timestamps atual
                    $name = uniqid(date('HisYmd'));
            
                    // Recupera a extensão do arquivo
                    $extension = $request->arquivo->extension();
            
                    // Define finalmente o nome
                    $nameFile = "{$name}.{$extension}";

                    $arquivo->arquivo = $nameFile;
                    $arquivo->tamanho = $request->arquivo->getSize();
                    $arquivo->tipo_mime = $request->arquivo->getMimeType();
                    $arquivo->nome_original = $request->arquivo->getClientOriginalName();
                    $arquivo->posicao = 1;
                    $arquivo->tipo = 'I';
                    $arquivo->membro_id = $membro->id;
                    $arquivo->save();
                    
                    $uploadPath = "uploads/".$table."/".$arquivo->id;
                    // Faz o upload:
                    $upload = $request->arquivo->storeAs($uploadPath, $nameFile);
                    // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
            
                    // Verifica se NÃO deu certo o upload (Redireciona de volta)
                    if ( !$upload ){
                        return redirect()->back();
                        alert()->error('ErrorAlert','Não foi possível fazer upload do arquivo.');
                    }
                }
            }
            
            if($request->has('ativo') == null){
                $membro->ativo = 0;
            }
            //vai preencher o objeto de acordo com a variavel fillable no model
            if($membro->update($request->all())){
                alert()->success('Concluído','Registro atualizado com sucesso.');
            }else{
                alert()->error('ErrorAlert','Erro na atualização do registro.');
            }
        }
        
        return redirect()->route('membro.show', ['membro' => $membro->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membro $membro)
    {
        if($membro->arquivo){
            if(Storage::exists("/uploads/membro/{$membro->arquivo->id}/{$membro->arquivo->arquivo}")){
                if(unlink(public_path('/storage/uploads/membro/'.$membro->arquivo->id.'/'.$membro->arquivo->arquivo))){
                    rmdir(public_path('/storage/uploads/membro/'.$membro->arquivo->id));
                }
            }else{
                alert()->error('ErrorAlert','Arquivo não existe.');
            }
            $membro->arquivo->delete();
            $membro->delete();
        }else if(!$membro->arquivo){
            $membro->delete();
        }else{
             // Em caso de falhas redireciona o usuário de volta e informa que não foi possível deletar
            return redirect()->back();
            alert()->error('ErrorAlert','Não foi possível deletar.');
        }

        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('membro.index');
    }
}
