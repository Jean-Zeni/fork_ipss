<?php
if(count($foto->arquivos) != 0){
    $fotos = $foto->arquivos;
}
?>

@extends('site.layouts.main')

@section('titulo', $foto->titulo)

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

@section('conteudo')
    {{ Breadcrumbs::render('fotoView', $foto) }}
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-7 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    @if ($fotos)
                        <div class="owl-carousel header-carousel position-relative mb-5">
                            @foreach ($fotos as $arquivo)
                                <div class="owl-carousel-item position-relative">
                                    <img class="img-fluid" src="{{url('/')}}/storage/uploads/foto/{{$arquivo->id}}/{{$arquivo->arquivo}}" alt="{{$arquivo->nome_original}}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-lg-5 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-5">{{$foto->titulo}}</h1>
                    <p class="mb-5">
                        @if ($foto->credito)
                            <strong>Crédito: </strong>{{$foto->credito}}<br />
                        @endif
                        @if ($foto->data_publicacao)
                            <strong>Data de Publicação: </strong> {{$foto->data_publicacao->format('d/m/Y')}}<br>
                        @endif
                    </p>
                    <p class="mb-5">
                        @if ($foto->descricao)
                            <?=$foto->descricao?>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    window.onload = function () { 
        document.getElementById('icon-zap').style.cssText = 'margin-top:12px;';
    } 
</script>