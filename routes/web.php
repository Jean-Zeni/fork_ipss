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

    //arquivos
    Route::resource('arquivo', \App\Http\Controllers\ArquivoController::class);

    Route::delete('/arquivo/excluir/{id}/{tabela}', [\App\Http\Controllers\ArquivoController::class, 'excluir'])->name('admin.arquivo.excluir');

});
