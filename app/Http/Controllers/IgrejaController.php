<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Igreja;
use App\Models\Arquivo;

class IgrejaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $igrejas = Igreja::orderBy('id', 'desc')->paginate(10);

        return view('admin.igreja.index', ['igrejas' => $igrejas, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.igreja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Igreja::rules(), Igreja::feedback());
        $igreja = new Igreja();
        $igrejaCriado = $igreja->create($request->all());
        if($igrejaCriado){
            alert()->success('Concluído','Registro adicionado com sucesso.');
        }
        $arquivo = new Arquivo();
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $arquivo->salvarArquivo($request, $igrejaCriado, 'igreja', 'I');
        }
        
        return redirect()->route('igreja.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Igreja $igreja)
    {
        return view('admin.igreja.show', ['igreja' => $igreja]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Igreja $igreja)
    {
        return view('admin.igreja.edit', ['igreja' => $igreja]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Igreja $igreja)
    {
        $request->validate(Igreja::rules(), Igreja::feedback());

        $arquivo = new Arquivo();
    
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $arquivo->salvarArquivo($request, $igreja, 'igreja', 'I');
        }

        $igreja->update($request->all());
        alert()->success('Concluído','Registro atualizado com sucesso.');
        return redirect()->route('igreja.show', ['igreja' => $igreja->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Igreja $igreja)
    {
        if($igreja->arquivo){
            $igreja->arquivo->excluirPastaArquivo('igreja');
            $igreja->arquivo->delete();
            $igreja->delete();
        }
            
        $igreja->delete();
  
        alert()->success('Concluído','Registro removido com sucesso.');
        return redirect()->route('igreja.index');
    }
}
