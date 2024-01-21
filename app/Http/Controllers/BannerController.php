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
        $banners = Banner::orderBy('id', 'desc')->paginate(10);

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
        $request->validate(Banner::rules(), Banner::feedback());
        $banner = new Banner();
        $bannerCriado = $banner->create($request->all());
        if($bannerCriado){
            alert()->success('Concluído','Registro adicionado com sucesso.');
        }
        $arquivo = new Arquivo();
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $arquivo->salvarArquivo($request, $bannerCriado, 'banner', 'I');
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
        $request->validate(Banner::rules(), Banner::feedback());

        $arquivo = new Arquivo();
    
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $arquivo->salvarArquivo($request, $banner, 'banner', 'I');
        }
        
        $banner->update($request->all());
        alert()->success('Concluído','Registro atualizado com sucesso.');
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
            $banner->arquivo->excluirPastaArquivo('banner');
            $banner->arquivo->delete();
            $banner->delete();
        }
            
        $banner->delete();
  
        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('banner.index');
    }

}
