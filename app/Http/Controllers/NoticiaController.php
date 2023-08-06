<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Arquivo;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $noticias = Noticia::orderBy('id', 'desc')->paginate(20);

        return view('admin.noticia.index', ['noticias' => $noticias, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticia.create');
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
            $request->validate(Noticia::rules(), Noticia::feedback());
            $noticia = new Noticia();
            $noticia->titulo = $request->input('titulo');
            $noticia->data_publicacao = $request->input('data_publicacao');
            $noticia->resumo = $request->input('resumo');
            $noticia->descricao = $request->input('descricao');
            $noticia->autor = $request->input('autor');
            if($request->input('ativo')){
                $noticia->ativo = $request->input('ativo');
            }else{
                $noticia->ativo = 0;
            }
            if($request->input('destaque')){
                $noticia->destaque = $request->input('destaque');
            }else{
                $noticia->destaque = 0;
            }
            if($noticia->save()){
                alert()->success('Concluído','Registro adicionado com sucesso.');
            }
            $table = 'noticia';
            // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = null;
            
            // Verifica se informou o arquivo e se é válido
            if($request->hasFile('images')){
                for($i = 0; $i < count($request->allFiles()['images']); $i++){
                    if ($request->allFiles()['images'][$i]->isValid()) {
                        $arquivo = new Arquivo();
                        // Define um aleatório para o arquivo baseado no timestamps atual
                        
                        $name = uniqid(date('HisYmd'));
                        // Recupera a extensão do arquivo
                        $extension = $request->allFiles()['images'][$i]->extension();
                
                        // Define finalmente o nome
                        $nameFile = "{$name}.{$extension}";
        
                        $arquivo->arquivo = $nameFile;
                        $arquivo->tamanho = $request->allFiles()['images'][$i]->getSize();
                        $arquivo->tipo_mime = $request->allFiles()['images'][$i]->getMimeType();
                        $arquivo->nome_original = $request->allFiles()['images'][$i]->getClientOriginalName();
                        $arquivo->tipo = Arquivo::TIPO_IMAGEM;
                        $arquivo->noticia_id = $noticia->id;
                        $arquivo->save();
                        
                        $uploadPath = "uploads/".$table."/".$arquivo->id;
                        // Faz o upload:
                        $upload = $request->allFiles()['images'][$i]->storeAs($uploadPath, $nameFile);
                        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
                
                        // Verifica se NÃO deu certo o upload (Redireciona de volta)
                        if ( !$upload ){
                            return redirect()->back();
                            alert()->error('ErrorAlert','Não foi possível fazer upload do arquivo.');
                        }
                        $nameFile = null;
                        unset($arquivo);
                        
                    }
                }
            }

        }
        return redirect()->route('noticia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticium)
    {
        return view('admin.noticia.show', ['noticium' => $noticium]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticium)
    {
        return view('admin.noticia.edit', ['noticium' => $noticium]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticium)
    {
        if($request->input('_token') != '' && $request->input('id') == ''){
            $request->validate(Noticia::rules(), Noticia::feedback());
        
            // Verifica se informou o arquivo e se é válido
            $table = 'noticia';
            // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = null;

            // Verifica se informou o arquivo e se é válido
            if($request->hasFile('images')){
                for($i = 0; $i < count($request->allFiles()['images']); $i++){
                    if ($request->allFiles()['images'][$i]->isValid()) {
                        $arquivo = new Arquivo();
                        // Define um aleatório para o arquivo baseado no timestamps atual
                        
                        $name = uniqid(date('HisYmd'));
                        // Recupera a extensão do arquivo
                        $extension = $request->allFiles()['images'][$i]->extension();
                
                        // Define finalmente o nome
                        $nameFile = "{$name}.{$extension}";
        
                        $arquivo->arquivo = $nameFile;
                        $arquivo->tamanho = $request->allFiles()['images'][$i]->getSize();
                        $arquivo->tipo_mime = $request->allFiles()['images'][$i]->getMimeType();
                        $arquivo->nome_original = $request->allFiles()['images'][$i]->getClientOriginalName();
                        $arquivo->tipo = Arquivo::TIPO_IMAGEM;
                        $arquivo->noticia_id = $noticium->id;
                        $arquivo->save();
                        
                        $uploadPath = "uploads/".$table."/".$arquivo->id;
                        // Faz o upload:
                        $upload = $request->allFiles()['images'][$i]->storeAs($uploadPath, $nameFile);
                        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
                
                        // Verifica se NÃO deu certo o upload (Redireciona de volta)
                        if ( !$upload ){
                            return redirect()->back();
                            alert()->error('ErrorAlert','Não foi possível fazer upload do arquivo.');
                        }
                        $nameFile = null;
                        unset($arquivo);
                        
                    }
                }
            }
            
            if($request->has('ativo') == null){
                $noticium->ativo = 0;
            }
            if($request->has('destaque') == null){
                $noticium->destaque = 0;
            }
            //vai preencher o objeto de acordo com a variavel fillable no model
            if($noticium->update($request->all())){
                alert()->success('Concluído','Registro atualizado com sucesso.');
            }else{
                alert()->error('ErrorAlert','Erro na atualização do registro.');
            }
        }
        
        return redirect()->route('noticia.show', ['noticium' => $noticium->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticium)
    {
        if($noticium->arquivos){
            foreach($noticium->arquivos as $arquivo){
                if(Storage::exists("/uploads/noticia/{$arquivo->id}/{$arquivo->arquivo}")){
                    if(unlink(public_path('/storage/uploads/noticia/'.$arquivo->id.'/'.$arquivo->arquivo))){
                        rmdir(public_path('/storage/uploads/noticia/'.$arquivo->id));
                    }
                }else{
                    alert()->error('ErrorAlert','Arquivo não existe.');
                }
                $arquivo->delete();
                $noticium->delete();
                alert()->success('Concluído','Registro removido com sucesso.');
            }
        }else if(!$noticium->arquivos){
            $noticium->delete();
            alert()->success('Concluído','Registro removido com sucesso.');
        }else{
             // Em caso de falhas redireciona o usuário de volta e informa que não foi possível deletar
            return redirect()->back();
            alert()->error('ErrorAlert','Não foi possível deletar.');
        }

        return redirect()->route('noticia.index');
    }
}
