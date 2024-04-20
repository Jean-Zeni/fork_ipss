<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.welcome');
});

Route::get('/', [\App\Http\Controllers\SiteController::class, 'site'])->name('site.index');

Route::get('/protestantismo', function(){
    return view('site.paginas.protestantismo');
})->name('site.protestantismo');

Route::get('/sobre-ipss', function(){
    return view('site.paginas.sobre-ipss');
})->name('site.sobre-ipss');

Route::get('/sobre-ipb', function(){
    return view('site.paginas.sobre-ipb');
})->name('site.sobre-ipb');

Route::get('/doutrina', function(){
    return view('site.paginas.doutrina');
})->name('site.doutrina');

Route::get('/contato', [\App\Http\Controllers\SiteContatoController::class, 'index'])->name('site.contato');

Route::get('/mapa-rs', [\App\Http\Controllers\SiteMapaRsController::class, 'index'])->name('site.mapa-rs');

Route::get('/contato-evangelismo', [\App\Http\Controllers\SiteContatoController::class, 'evangelismo'])->name('site.contato.evangelismo');

Route::post('/contato/save-contato', [\App\Http\Controllers\SiteContatoController::class, 'SaveContato'])->name('site.save-contato');

Route::post('/contato/save-contato-evangelismo', [\App\Http\Controllers\SiteContatoController::class, 'SaveContatoEvangelismo'])->name('site.save-contato-evangelismo');

Route::get('/video', [\App\Http\Controllers\SiteVideoController::class, 'index'])->name('site.video');

Route::get('/video/{id}/{nome?}', [\App\Http\Controllers\SiteVideoController::class, 'view'])->name('site.video.view');

Route::get('/noticia', [\App\Http\Controllers\SiteNoticiaController::class, 'index'])->name('site.noticia');

Route::get('/noticia/{id}/{nome?}', [\App\Http\Controllers\SiteNoticiaController::class, 'view'])->name('site.noticia.view');

Route::get('/foto', [\App\Http\Controllers\SiteFotoController::class, 'index'])->name('site.foto');

Route::get('/foto/{id}/{nome?}', [\App\Http\Controllers\SiteFotoController::class, 'view'])->name('site.foto.view');

Route::get('/ipss/{id}/{nome?}', [\App\Http\Controllers\SitePaginaController::class, 'view'])->name('site.pagina.view');

Route::get('/agenda', [\App\Http\Controllers\SiteEventoController::class, 'index'])->name('site.agenda');

Route::get('/conselho/{id}', [\App\Http\Controllers\SiteConselhoController::class, 'view'])->name('site.conselho.view');

Route::get('/admin', function(){
    return redirect()->route('dashboard');
});

/*Route::get('envio-email', function(){
    $contato = new \App\Models\Contato();
    $contato->nome = "Giordani";
    $contato->email = "dani12xbox@gmail.com";
    $contato->status = \App\Models\Contato::STATUS_ABERTO;
    //return new \App\Mail\Contato($contato);
    \Illuminate\Support\Facades\Mail::send(new \App\Mail\Contato($contato));
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\SiteAdminController::class, 'index'])->name('dashboard');

    //banners
    Route::resource('banner', \App\Http\Controllers\BannerController::class);

    //igrejas
    Route::resource('igreja', \App\Http\Controllers\IgrejaController::class);

    //videos
    Route::resource('video', \App\Http\Controllers\VideoController::class);

    //noticias
    Route::resource('noticia', \App\Http\Controllers\NoticiaController::class);

    //contato
    Route::resource('contato', \App\Http\Controllers\ContatoController::class);

    //membros
    Route::resource('membro', \App\Http\Controllers\MembroController::class);

    //conselhos
    Route::resource('conselho', \App\Http\Controllers\ConselhoController::class);

    //arquivos
    Route::resource('arquivo', \App\Http\Controllers\ArquivoController::class);

    //eventos
    Route::resource('evento', \App\Http\Controllers\EventoController::class);

    //fotos
    Route::resource('foto', \App\Http\Controllers\FotoController::class);

    //paginas
    Route::resource('pagina', \App\Http\Controllers\PaginaController::class);

    //configuração
    Route::get('/configuracao/edit/{configuracao}', [\App\Http\Controllers\ConfiguracaoController::class, 'edit'])->name('admin.configuracao.edit');
    //configuração
    Route::put('/configuracao/edit/{configuracao}', [\App\Http\Controllers\ConfiguracaoController::class, 'update'])->name('admin.configuracao.update');

    Route::delete('/arquivo/excluir/{id}/{tabela}', [\App\Http\Controllers\ArquivoController::class, 'excluir'])->name('admin.arquivo.excluir');

});
