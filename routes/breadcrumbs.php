<?php
use App\Models\Conselho;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
 
Breadcrumbs::for('site', function ($trail) {
    $trail->push('Home', route('site.index'));
});

//Home > Fale conosco
Breadcrumbs::for('contato', function (BreadcrumbTrail $trail) {
    $trail->parent('site');
    $trail->push('Fale Conosco', route('site.contato'));
});

//Home > Fale conosco
Breadcrumbs::for('agenda', function (BreadcrumbTrail $trail) {
    $trail->parent('site');
    $trail->push('Agenda', route('site.agenda'));
});

//Home > Video
Breadcrumbs::for('video', function (BreadcrumbTrail $trail) {
    $trail->parent('site');
    $trail->push('Galeria de Vídeos', route('site.video'));
});

// Home > Video > [Video]
Breadcrumbs::for('videoView', function (BreadcrumbTrail $trail, $video) {
    $trail->parent('video');
    $trail->push($video->titulo, route('site.video.view', $video));
});

//Home > Conselho view
Breadcrumbs::for('conselho', function (BreadcrumbTrail $trail) {
    $trail->parent('site');
    $trail->push('Conselho', route('site.conselho.view', ['id' => 1]));
});

//Home > Galeria de Fotos
Breadcrumbs::for('foto', function (BreadcrumbTrail $trail) {
    $trail->parent('site');
    $trail->push('Galeria de Fotos', route('site.foto'));
});

// Home > Foto > [Foto]
Breadcrumbs::for('fotoView', function (BreadcrumbTrail $trail, $foto) {
    $trail->parent('foto');
    $trail->push($foto->titulo, route('site.foto.view', $foto));
});

// Home > Pagina > [Pagina]
Breadcrumbs::for('paginaView', function (BreadcrumbTrail $trail, $pagina) {
    $trail->parent('site');
    $trail->push($pagina->titulo, route('site.pagina.view', $pagina));
});


Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('site');
    $trail->push('Page Not Found');
});