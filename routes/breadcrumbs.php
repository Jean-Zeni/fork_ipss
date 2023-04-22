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
Breadcrumbs::for('conselho', function (BreadcrumbTrail $trail) {
    $trail->parent('site');
    $trail->push('Conselho', route('site.conselho.view', ['id' => 1]));
});

Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('site');
    $trail->push('Page Not Found');
});