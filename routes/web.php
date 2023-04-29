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

Route::get('/contato', [\App\Http\Controllers\SiteContatoController::class, 'index'])->name('site.contato');

Route::get('/contato-evangelismo', [\App\Http\Controllers\SiteContatoController::class, 'evangelismo'])->name('site.contato.evangelismo');

Route::post('/contato/save-contato', [\App\Http\Controllers\SiteContatoController::class, 'SaveContato'])->name('site.save-contato');

Route::post('/contato/save-contato-evangelismo', [\App\Http\Controllers\SiteContatoController::class, 'SaveContatoEvangelismo'])->name('site.save-contato-evangelismo');

Route::get('/video', [\App\Http\Controllers\SiteVideoController::class, 'index'])->name('site.video');

Route::get('/video/view/{id}', [\App\Http\Controllers\SiteVideoController::class, 'view'])->name('site.video.view');

Route::get('/foto', [\App\Http\Controllers\SiteFotoController::class, 'index'])->name('site.foto');

Route::get('/foto/view/{id}', [\App\Http\Controllers\SiteFotoController::class, 'view'])->name('site.foto.view');

Route::get('/agenda', [\App\Http\Controllers\SiteEventoController::class, 'index'])->name('site.agenda');

Route::get('/conselho/view/{id}', [\App\Http\Controllers\SiteConselhoController::class, 'view'])->name('site.conselho.view');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //banners
    Route::resource('banner', \App\Http\Controllers\BannerController::class);

    //videos
    Route::resource('video', \App\Http\Controllers\VideoController::class);

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

    //configuração
    Route::get('/configuracao/edit/{configuracao}', [\App\Http\Controllers\ConfiguracaoController::class, 'edit'])->name('admin.configuracao.edit');
    //configuração
    Route::put('/configuracao/edit/{configuracao}', [\App\Http\Controllers\ConfiguracaoController::class, 'update'])->name('admin.configuracao.update');

    Route::delete('/arquivo/excluir/{id}/{tabela}', [\App\Http\Controllers\ArquivoController::class, 'excluir'])->name('admin.arquivo.excluir');

});
