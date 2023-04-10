<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Banner;
use App\Models\Arquivo;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banners = Banner::paginate(10);

        return view('admin.banner.index', ['banners' => $banners, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            $regras = [
                'titulo' => 'required|max:256',
                'data_inicio' => 'required',
                'data_fim' => 'required',
                'link' => 'max:256',
                'ordem' => 'required',
                'arquivo' => 'image'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'titulo.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
                'link.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
                'arquivo_id.exists' => "O fornecedor informado não existe!",
                'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
            ];


            $request->validate($regras, $feedback);
            $banner = new Banner();
            //vai preencher o objeto de acordo com o request
            $banner->titulo = $request->input('titulo');
            $banner->data_inicio = $request->input('data_inicio');
            $banner->data_fim = $request->input('data_fim');
            $banner->tipo_documento = $request->input('tipo_documento');
            $banner->link = $request->input('link');
            $banner->tipo_posicao = $request->input('tipo_posicao');
            $banner->ordem = $request->input('ordem');
            if($request->input('nova_guia')){
                $banner->nova_guia = $request->input('nova_guia');
            }else{
                $banner->nova_guia = 0;
            }
            if($request->input('ativo')){
                $banner->ativo = $request->input('ativo');
            }else{
                $banner->ativo = 0;
            }
            if($banner->save()){
                alert()->success('Concluído','Registro adicionado com sucesso.');
            }
            $table = 'banner';
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
                    $arquivo->banner_id = $banner->id;
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
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('admin.banner.show', ['banner' => $banner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
            //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $regras = [
                'titulo' => 'required|max:256',
                'ordem' => 'required',
                'data_inicio' => 'required',
                'data_fim' => 'required',
                'link' => 'max:256',
                'arquivo' => 'image'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'titulo.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
                'link.max' => 'O campo :attribute não pode ultrapassar 256 caracteres.',
                'arquivo.image' => "Tipo não suportado, envie uma imagem ('jpg, jpeg, png...')"
            ];

            $request->validate($regras, $feedback);

            $table = 'banner';
                // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = null;
        
            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
                //se o banner tiver arquivo
                if($banner->arquivo){
                    //remover aquivo do $banner->arquivo da pasta uploads
                    if(Storage::exists("/uploads/banner/{$banner->arquivo->id}/{$banner->arquivo->arquivo}")){
                        Storage::delete("/uploads/banner/{$banner->arquivo->id}/{$banner->arquivo->arquivo}");
                    }else{
                        alert()->error('ErrorAlert','Arquivo não existe.');
                    }
                    //setar o arquivo do $banner->arquivo com a $request
                    // Define nome um aleatório para o arquivo baseado no timestamps atual
                    $name = uniqid(date('HisYmd'));
            
                    // Recupera a extensão do arquivo
                    $extension = $request->arquivo->extension();
            
                    // Define finalmente o nome
                    $nameFile = "{$name}.{$extension}";

                    $banner->arquivo->arquivo = $nameFile;
                    $banner->arquivo->tamanho = $request->arquivo->getSize();
                    $banner->arquivo->tipo_mime = $request->arquivo->getMimeType();
                    $banner->arquivo->nome_original = $request->arquivo->getClientOriginalName();
                    $banner->arquivo->posicao = 1;
                    $banner->arquivo->tipo = 'I';
                    
                    $banner->arquivo->update();
                    
                    $uploadPath = "uploads/".$table."/".$banner->arquivo->id;
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
                    $arquivo->banner_id = $banner->id;
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
                $banner->ativo = 0;
            }
            if($request->has('nova_guia') == null){
                $banner->nova_guia = 0;
            }
            //vai preencher o objeto de acordo com a variavel fillable no model
            if($banner->update($request->all())){
                alert()->success('Concluído','Registro atualizado com sucesso.');
            }else{
                alert()->error('ErrorAlert','Erro na atualização do registro.');
            }
        }
        
        return redirect()->route('banner.show', ['banner' => $banner->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if($banner->arquivo){
            if(Storage::exists("/uploads/banner/{$banner->arquivo->id}/{$banner->arquivo->arquivo}")){
                if(unlink(public_path('/storage/uploads/banner/'.$banner->arquivo->id.'/'.$banner->arquivo->arquivo))){
                    rmdir(public_path('/storage/uploads/banner/'.$banner->arquivo->id));
                }
            }else{
                alert()->error('ErrorAlert','Arquivo não existe.');
            }
            $banner->arquivo->delete();
            $banner->delete();
        }else if(!$banner->arquivo){
            $banner->delete();
        }else{
             // Em caso de falhas redireciona o usuário de volta e informa que não foi possível deletar
            return redirect()->back();
            alert()->error('ErrorAlert','Não foi possível deletar.');
        }

        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('banner.index');
    }

}
