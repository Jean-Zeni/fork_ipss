<?php
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
