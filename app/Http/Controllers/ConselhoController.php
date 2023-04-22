<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Conselho;
use App\Models\Membro;
use App\Models\Arquivo;

class ConselhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conselhos = Conselho::paginate(10);

        return view('admin.conselho.index', ['conselhos' => $conselhos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conselho.create');
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
            $request->validate(Conselho::rules(), Conselho::feedback());
            $conselho = new Conselho();
            $conselho->nome = $request->input('nome');
            $conselho->descricao = $request->input('descricao');
            if($request->input('ativo')){
                $conselho->ativo = $request->input('ativo');
            }else{
                $conselho->ativo = 0;
            }
            if($conselho->save()){
                alert()->success('Concluído','Registro adicionado com sucesso.');
            }
            $table = 'conselho';
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
                $arquivo->conselho_id = $conselho->id;
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
        return redirect()->route('conselho.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Conselho $conselho)
    {
        return view('admin.conselho.show', ['conselho' => $conselho]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Conselho $conselho)
    {
        return view('admin.conselho.edit', ['conselho' => $conselho]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conselho $conselho)
    {
        if($request->input('_token') != '' && $request->input('id') == ''){
            
            $request->validate(Conselho::rules(), Conselho::feedback());

            $table = 'conselho';
                // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = null;
        
            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
                //se o conselho tiver arquivo
                if($conselho->arquivo){
                    //remover aquivo do $conselho->arquivo da pasta uploads
                    if(Storage::exists("/uploads/conselho/{$conselho->arquivo->id}/{$conselho->arquivo->arquivo}")){
                        Storage::delete("/uploads/conselho/{$conselho->arquivo->id}/{$conselho->arquivo->arquivo}");
                    }else{
                        alert()->error('ErrorAlert','Arquivo não existe.');
                    }
                    //setar o arquivo do $conselho->arquivo com a $request
                    // Define nome um aleatório para o arquivo baseado no timestamps atual
                    $name = uniqid(date('HisYmd'));
            
                    // Recupera a extensão do arquivo
                    $extension = $request->arquivo->extension();
            
                    // Define finalmente o nome
                    $nameFile = "{$name}.{$extension}";

                    $conselho->arquivo->arquivo = $nameFile;
                    $conselho->arquivo->tamanho = $request->arquivo->getSize();
                    $conselho->arquivo->tipo_mime = $request->arquivo->getMimeType();
                    $conselho->arquivo->nome_original = $request->arquivo->getClientOriginalName();
                    $conselho->arquivo->posicao = 1;
                    $conselho->arquivo->tipo = 'I';
                    
                    $conselho->arquivo->update();
                    
                    $uploadPath = "uploads/".$table."/".$conselho->arquivo->id;
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
                    $arquivo->conselho_id = $conselho->id;
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
                $conselho->ativo = 0;
            }
            //vai preencher o objeto de acordo com a variavel fillable no model
            if($conselho->update($request->all())){
                alert()->success('Concluído','Registro atualizado com sucesso.');
            }else{
                alert()->error('ErrorAlert','Erro na atualização do registro.');
            }
        }
        
        return redirect()->route('conselho.show', ['conselho' => $conselho->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conselho $conselho)
    {
        if($conselho->arquivo){
            if(Storage::exists("/uploads/conselho/{$conselho->arquivo->id}/{$conselho->arquivo->arquivo}")){
                if(unlink(public_path('/storage/uploads/conselho/'.$conselho->arquivo->id.'/'.$conselho->arquivo->arquivo))){
                    rmdir(public_path('/storage/uploads/conselho/'.$conselho->arquivo->id));
                }
            }else{
                alert()->error('ErrorAlert','Arquivo não existe.');
            }
            $conselho->arquivo->delete();
            $conselho->delete();
        }else if(!$conselho->arquivo){
            $conselho->delete();
        }else{
             // Em caso de falhas redireciona o usuário de volta e informa que não foi possível deletar
            return redirect()->back();
            alert()->error('ErrorAlert','Não foi possível deletar.');
        }

        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('conselho.index');
    }
}
