<?php
use App\Models\Configuracao;

$config = Configuracao::getConfig();
?>

@extends('site.layouts.main')

@section('titulo', 'Fale conosco')

@section('conteudo')
@include('sweetalert::alert')
{{ Breadcrumbs::render('contato') }}
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12 margin20T margin-bottom-responsiva">
                <div class="titulo">
                    Dúvidas?
                </div>
                <br>
                <?php if($config->descricao_contato):?>
                    <?=$config->descricao_contato?>
                <?php endif?>
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 margin20T">
                        @include('site.contato-evangelismo._form')
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <?php if($config->arquivo):?>
                        <img src="{{url('/')}}/storage/uploads/configuracao/{{$config->arquivo->id}}/{{$config->arquivo->arquivo}}" alt="Foolder" class="banner-capa" width="100%">
                    <?php endif?>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br>
@endsection
