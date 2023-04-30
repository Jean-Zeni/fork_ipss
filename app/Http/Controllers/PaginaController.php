<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pagina;
use App\Models\Arquivo;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginas = Pagina::paginate(20);

        return view('admin.pagina.index', ['paginas' => $paginas, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pagina.create');
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
            $request->validate(Pagina::rules(), Pagina::feedback());
            $pagina = new Pagina();
            $pagina->titulo = $request->input('titulo');
            $pagina->resumo = $request->input('resumo');
            $pagina->descricao = $request->input('descricao');
            $pagina->link_youtube = $request->input('link_youtube');
            if($request->input('ativo')){
                $pagina->ativo = $request->input('ativo');
            }else{
                $pagina->ativo = 0;
            }
            if($pagina->save()){
                alert()->success('Concluído','Registro adicionado com sucesso.');
            }
            $table = 'pagina';
            // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = null;
            
            // Verifica se informou o arquivo e se é válido
            if($request->hasFile('arquivos')){
                for($i = 0; $i < count($request->allFiles()['arquivos']); $i++){
                    if ($request->allFiles()['arquivos'][$i]->isValid()) {
                        $arquivo = new Arquivo();
                        // Define um aleatório para o arquivo baseado no timestamps atual
                        
                        $name = uniqid(date('HisYmd'));
                        // Recupera a extensão do arquivo
                        $extension = $request->allFiles()['arquivos'][$i]->extension();
                
                        // Define finalmente o nome
                        $nameFile = "{$name}.{$extension}";
        
                        $arquivo->arquivo = $nameFile;
                        $arquivo->tamanho = $request->allFiles()['arquivos'][$i]->getSize();
                        $arquivo->tipo_mime = $request->allFiles()['arquivos'][$i]->getMimeType();
                        $arquivo->nome_original = $request->allFiles()['arquivos'][$i]->getClientOriginalName();
                        if($extension == "doc" || $extension == "docx" || $extension == "pdf" || $extension == "txt" || $extension == "ppt" || $extension == "pptx" || 
                        $extension == "odt" || $extension == "xls" || $extension == "xlsx" || $extension == "rar" || $extension == "zip"){
                            $arquivo->tipo = Arquivo::TIPO_DOCUMENTO;
                        }else{
                            $arquivo->tipo = Arquivo::TIPO_IMAGEM;
                        }
                        $arquivo->pagina_id = $pagina->id;
                        $arquivo->save();
                        
                        $uploadPath = "uploads/".$table."/".$arquivo->id;
                        // Faz o upload:
                        $upload = $request->allFiles()['arquivos'][$i]->storeAs($uploadPath, $nameFile);
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
        return redirect()->route('pagina.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pagina $pagina)
    {
        return view('admin.pagina.show', ['pagina' => $pagina]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagina $pagina)
    {
        return view('admin.pagina.edit', ['pagina' => $pagina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagina $pagina)
    {
        if($request->input('_token') != '' && $request->input('id') == ''){
            $request->validate(Pagina::rules(), Pagina::feedback());
        
            // Verifica se informou o arquivo e se é válido
            $table = 'pagina';
            // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = null;

            // Verifica se informou o arquivo e se é válido
            if($request->hasFile('arquivos')){
                for($i = 0; $i < count($request->allFiles()['arquivos']); $i++){
                    if ($request->allFiles()['arquivos'][$i]->isValid()) {
                        $arquivo = new Arquivo();
                        // Define um aleatório para o arquivo baseado no timestamps atual
                        
                        $name = uniqid(date('HisYmd'));
                        // Recupera a extensão do arquivo
                        $extension = $request->allFiles()['arquivos'][$i]->extension();
                
                        // Define finalmente o nome
                        $nameFile = "{$name}.{$extension}";
        
                        $arquivo->arquivo = $nameFile;
                        $arquivo->tamanho = $request->allFiles()['arquivos'][$i]->getSize();
                        $arquivo->tipo_mime = $request->allFiles()['arquivos'][$i]->getMimeType();
                        $arquivo->nome_original = $request->allFiles()['arquivos'][$i]->getClientOriginalName();
                        if($extension == "doc" || $extension == "docx" || $extension == "pdf" || $extension == "txt" || $extension == "ppt" || $extension == "pptx" || 
                        $extension == "odt" || $extension == "xls" || $extension == "xlsx" || $extension == "rar" || $extension == "zip"){
                            $arquivo->tipo = Arquivo::TIPO_DOCUMENTO;
                        }else{
                            $arquivo->tipo = Arquivo::TIPO_IMAGEM;
                        }
                        $arquivo->pagina_id = $pagina->id;
                        $arquivo->save();
                        
                        $uploadPath = "uploads/".$table."/".$arquivo->id;
                        // Faz o upload:
                        $upload = $request->allFiles()['arquivos'][$i]->storeAs($uploadPath, $nameFile);
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
                $pagina->ativo = 0;
            }
            //vai preencher o objeto de acordo com a variavel fillable no model
            if($pagina->update($request->all())){
                alert()->success('Concluído','Registro atualizado com sucesso.');
            }else{
                alert()->error('ErrorAlert','Erro na atualização do registro.');
            }
        }
        
        return redirect()->route('pagina.show', ['pagina' => $pagina->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagina $pagina)
    {
        if($pagina->arquivos){
            foreach($pagina->arquivos as $arquivo){
                if(Storage::exists("/uploads/pagina/{$arquivo->id}/{$arquivo->arquivo}")){
                    if(unlink(public_path('/storage/uploads/pagina/'.$arquivo->id.'/'.$arquivo->arquivo))){
                        rmdir(public_path('/storage/uploads/pagina/'.$arquivo->id));
                    }
                }else{
                    alert()->error('ErrorAlert','Arquivo não existe.');
                }
                $arquivo->delete();
                $pagina->delete();
            }
        }else if(!$pagina->arquivos){
            $pagina->delete();
        }else{
             // Em caso de falhas redireciona o usuário de volta e informa que não foi possível deletar
            return redirect()->back();
            alert()->error('ErrorAlert','Não foi possível deletar.');
        }

        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('pagina.index');
    }
}
