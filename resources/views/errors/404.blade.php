@extends('site.layouts.main')

@section('titulo', 'Not Found 404')

@section('conteudo')
    {{ Breadcrumbs::render('errors.404') }}
    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">{{$exception->getMessage()}}</h1>
                    <p class="mb-4">Lamentamos, a página que procura não existe no nosso site! Talvez vá para nossa página inicial ou tente usar uma pesquisa?</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="/">Voltar para o ínicio</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->
    <br><br><br><br>
@endsection
