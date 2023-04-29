<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Foto;
use App\Models\Arquivo;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fotos = Foto::paginate(10);

        return view('admin.midia-foto.index', ['fotos' => $fotos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.midia-foto.create');
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
            $request->validate(Foto::rules(), Foto::feedback());
            $foto = new Foto();
            $foto->titulo = $request->input('titulo');
            $foto->data_publicacao = $request->input('data_publicacao');
            $foto->resumo = $request->input('resumo');
            $foto->descricao = $request->input('descricao');
            $foto->credito = $request->input('credito');
            $foto->link = $request->input('link');
            if($request->input('ativo')){
                $foto->ativo = $request->input('ativo');
            }else{
                $foto->ativo = 0;
            }
            if($request->input('destaque')){
                $foto->destaque = $request->input('destaque');
            }else{
                $foto->destaque = 0;
            }
            if($foto->save()){
                alert()->success('Concluído','Registro adicionado com sucesso.');
            }
            $table = 'foto';
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
                        $arquivo->foto_id = $foto->id;
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
        return redirect()->route('foto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        return view('admin.midia-foto.show', ['foto' => $foto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        return view('admin.midia-foto.edit', ['foto' => $foto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        if($request->input('_token') != '' && $request->input('id') == ''){
            $request->validate(Foto::rules(), Foto::feedback());
        
            // Verifica se informou o arquivo e se é válido
            $table = 'foto';
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
                        $arquivo->foto_id = $foto->id;
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
                $foto->ativo = 0;
            }
            if($request->has('destaque') == null){
                $foto->destaque = 0;
            }
            //vai preencher o objeto de acordo com a variavel fillable no model
            if($foto->update($request->all())){
                alert()->success('Concluído','Registro atualizado com sucesso.');
            }else{
                alert()->error('ErrorAlert','Erro na atualização do registro.');
            }
        }
        
        return redirect()->route('foto.show', ['foto' => $foto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        if($foto->arquivos){
            foreach($foto->arquivos as $arquivo){
                if(Storage::exists("/uploads/foto/{$arquivo->id}/{$arquivo->arquivo}")){
                    if(unlink(public_path('/storage/uploads/foto/'.$arquivo->id.'/'.$arquivo->arquivo))){
                        rmdir(public_path('/storage/uploads/foto/'.$arquivo->id));
                    }
                }else{
                    alert()->error('ErrorAlert','Arquivo não existe.');
                }
                $arquivo->delete();
                $foto->delete();
            }
        }else if(!$foto->arquivos){
            $foto->delete();
        }else{
             // Em caso de falhas redireciona o usuário de volta e informa que não foi possível deletar
            return redirect()->back();
            alert()->error('ErrorAlert','Não foi possível deletar.');
        }

        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('foto.index');
    }
}
