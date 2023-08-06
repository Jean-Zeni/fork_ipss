<?php
use App\Models\Configuracao;

$config = Configuracao::getConfig();
?>

@extends('site.layouts.main')

@section('titulo', 'Fale conosco')

@section('conteudo')
@include('sweetalert::alert')
{{ Breadcrumbs::render('contato') }}
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container contact-page py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-md-5 contact-form wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="mb-4">Dúvidas?</h1>
                    <p class="mb-4">
                        <?php if($config->descricao_contato):?>
                            <?=$config->descricao_contato?>
                        <?php endif?>
                    </p>
                    <div class="bg-light p-4">
                        @include('site.contato._form')
                    </div>
                </div>
                <div class="col-md-7 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="position-relative h-100">
                        <?php if($config->arquivo):?>
                            <img src="{{url('/')}}/storage/uploads/configuracao/{{$config->arquivo->id}}/{{$config->arquivo->arquivo}}" alt="Foolder">
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
