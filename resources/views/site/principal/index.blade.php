<?php
use App\Models\Configuracao;

$config = Configuracao::getConfig();
?>

@extends('site.layouts.main')

@section('titulo', 'Igreja Presbiteriana de Sapucaia do Sul')

@section('conteudo')
    <div class="site-index">
        <div class="body-content">
            <section>
                @if($banners)
                    @include('site.principal._components.carousel',['banners'=>$banners])
                @endif
            </section>
            <br><br>
            <section class="margin-section">
                <div class="row container-fluid">
                    <div class="col-12 col-md-12 col-lg-6 margin-bottom-responsiva">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="titulo">Pastor<span class="square"></span></h2>
                            </div>
                            <div class="col-12 pastor text-center">
                                <img src="{{Request::url()}}/images/pastor.jpg" alt="Pastor" width="100%">
                                <a href="">
                                    <h3><strong>Rev. Éverton de Borba Pereira</strong></h3>
                                </a>
                            </div>
                        </div>
                    <br />
                    </div>
                    @if($video)
                        <div class="col-12 col-md-12 col-lg-6 margin-top-responsiva margin-bottom-responsiva">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="titulo">Vídeo em destaque<span class="square"></span></h2>
                                </div>
                                <div class="col-12 text-center">
                                    <iframe width="100%" height="500" src="{{$video->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" class="video-capa" allowfullscreen></iframe>    
                                    <br />
                                </div>
                            </div>   
                        </div>
                    @endif
                </div>   
            </section>
            <br /><br />
            <section class="bg-dark">
                <div class="container-fluid padding20">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 margin-bottom-responsiva">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="titulo">Horários e dias de reunião<span class="square"></span></h2>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 nomargin text-center">
                                    <div class="row">
                                        <div class="text-center"><img src="{{Request::url()}}/images/oracao.png" alt="Oração" width="70px" height="70px" class="elemento-reuniao"></div>
                                    </div>
                                    <div class="row">
                                        <h3 class="titulo-reuniao">Culto de Oração</h3>
                                    </div>
                                    <div class="row text-center ">
                                        <div class="text-center margin-reuniao margin65B"><span>Quinta-feira, ás 19:30h.</span></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 nomargin text-center">
                                    <div class="row">
                                        <div class="text-center"><img src="{{Request::url()}}/images/ebd.png" alt="Ebd" width="70px" height="70px" class="elemento-reuniao"></div>
                                    </div>
                                    <div class="row">
                                        <h3 class="titulo-reuniao">Escola Bíblica Domínical</h3>
                                    </div>
                                    <div class="row text-center ">
                                        <div class="text-center margin-reuniao margin65B"><span>Domingo, ás 9h.</span></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 nomargin text-center">
                                    <div class="row">
                                        <div class="text-center"><img src="{{Request::url()}}/images/Culto.png" alt="Culto" width="70px" height="70px" class="elemento-reuniao"></div>
                                    </div>
                                    <div class="row">
                                        <h3 class="titulo-reuniao">Culto Solene</h3>
                                    </div>
                                    <div class="row text-center ">
                                        <div class="text-center margin-reuniao margin65B"><span>Domingo, ás 19h.</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <br><br>
            <!-- NOTÍCIAS , ATALHOS -->
            <section id="noticia-capa" class="container-fluid">
                <div class="row section-padding-fundo">
                    
                    <div class="col-12 col-md-12 col-lg-6 margin-bottom-responsiva">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="titulo">Galeria de Imagens<span class="square"></span></h2>
                            </div>
                        </div>                
                        @if (count($imagens) != 0)
                            @include('site.principal._components.carousel-fotos',['imagens'=>$imagens])
                        @endif
                    </div>
                    <div class="col-12 col-md-12 col-lg-6 margin-bottom-responsiva">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="titulo">Devocional<span class="square"></span></h2>
                            </div>
                        </div>
                        @if ($devocional)
                            <a href="/video/{{$devocional->id}}">
                                <article class="col-12 nopadding home-noticia-principal">
                                    <img src="{{$devocional->getThumbVideo()}}" alt="{{$devocional->titulo}}" width="100%">
                                    <strong>
                                        <h3>{{$devocional->titulo}}</h3>
                                        <span class="tarja"></span>
                                    </strong>
                                </article>
                            </a>
                        @endif
                    </div>
                </div>
            </section>
        </div>
        <br><br>
    </div>
    @if ($config->googlemaps)        
        
            <?=$config->googlemaps?>
        
    @endif
@endsection
