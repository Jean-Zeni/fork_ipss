<?php
use App\Models\Configuracao;

$config = Configuracao::getConfig();
?>

@extends('site.layouts.main')

@section('titulo', 'Igreja Presbiteriana de Sapucaia do Sul')

@section('conteudo')

    <!-- Carousel Start -->
    @if($banners)
        <div class="container-fluid p-0 pb-5">
            <div class="owl-carousel header-carousel position-relative mb-5">
                @foreach($banners as $banner)
                    <div class="owl-carousel-item position-relative">
                        <a href="<?=$banner->link?>" target="_blank" data-pjax="0">
                            <img class="img-fluid" src="{{url('/')}}/storage/uploads/banner/{{$banner->arquivo->id}}/{{$banner->arquivo->arquivo}}" alt="">
                        </a>
                        <!--<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                            <div class="container">
                                <div class="row justify-content-start">
                                    <div class="col-10 col-lg-8">
                                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Transport & Logistics Solution</h5>
                                        <h1 class="display-3 text-white animated slideInDown mb-4">#1 Place For Your <span class="text-primary">Logistics</span> Solution</h1>
                                        <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                        <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <!-- Carousel End -->

    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        @if($bannerCapa && $bannerCapa->arquivo)
                            <img class="position-absolute img-fluid w-100 h-100" src="{{url('/')}}/storage/uploads/banner/{{$bannerCapa->arquivo->id}}/{{$bannerCapa->arquivo->arquivo}}" style="object-fit: cover;" alt="{{$bannerCapa->titulo}}">
                        @else
                        <img class="position-absolute img-fluid w-100 h-100" src="images/indisponivel-ipss.png" style="object-fit: cover;" alt="Indisponível">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-5">Conheça nossa Igreja</h1>
                    <p class="mb-5">Local onde se prega a Palavra de Deus com fidelidade e sinceridade. Estamos localizados na Rua São Luiz, número 188 - Centro de Sapucaia do Sul - RS, Venha nos visitar!</p>
                    <div class="row g-4 mb-5">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa-solid fa-book-bible fa-3x text-primary mb-3"></i>
                            <h5>Culto de Oração</h5>
                            <p class="m-0">Quinta-feira, ás 19:30h.</p>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa-solid fa-cross fa-3x text-primary mb-3"></i>
                            <h5>Escola Bíblica Domínical</h5>
                            <p class="m-0">Domingo, ás 9h.</p>
                        </div>
                         <div class="col-sm-4 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa-solid fa-church fa-3x text-primary mb-3"></i>
                            <h5>Culto Solene</h5>
                            <p class="m-0">Domingo, ás 19h.</p>
                        </div>
                    </div>
                    <a href="/sobre-ipss" class="btn btn-primary py-3 px-5">Conheça nossa História</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-5">Sobre a Igreja Presbiteriana do Brasil</h1>
                    <p class="mb-5">As origens históricas mais remotas do presbiterianismo remontam aos primórdios da Reforma Protestante do século XVI. Como é bem sabido, a Reforma teve início com o questionamento do catolicismo medieval feito pelo monge alemão Martinho Lutero (1483-1546) a partir de 1517.</p>
                    <div class="d-flex align-items-center">
                        <div class="ps-4">
                            <a href="/sobre-ipb" class="btn btn-primary py-3 px-5">Conheça a IPB</a>
                        </div>
                        <div class="ps-4">
                            <a href="/mapa-rs" class="btn btn-primary py-3 px-5">IPB no RS</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6">
                            <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                                
                                <i class="fa-solid fa-list-check fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">300</h2>
                                <p class="text-white mb-0">Projetos de ação social vinculados à IPB em todo o país.</p>
                            </div>
                            <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                                <i class="fa fa-users fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">650</h2>
                                <p class="text-white mb-0">Mil Membros, segundo dados de 2016.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                                <i class="fa-solid fa-earth-americas fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">6061</h2>
                                <p class="text-white mb-0">Locais, 2805 igrejas, 2263 congregações e 993 pontos de pregação (dados de 2016)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center">
                <h1 class="mb-0">Reflexões</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="images/cleber.jpg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Cleber</h5>
                            <p class="m-0">Tesoureiro</p>
                        </div>
                    </div>
                    <p class="mb-0">“Meus irmãos, considerem motivo de grande alegria o fato de passarem por diversas provações.” (Tiago 1.2)</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="images/cristiano.jpg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Cristiano</h5>
                            <p class="m-0">Vice-Presidente</p>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="images/pastor.jpg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Éverton</h5>
                            <p class="m-0">Pastor</p>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="images/pastor.jpg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Éverton</h5>
                            <p class="m-0">Pastor</p>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>-->

    @if($noticias)
        <div class="container-xxl py-5">
            <div class="container py-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-5">Notícias</h1>
                </div>
                <div class="row g-4">
                    @foreach($noticias as $noticia)
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item p-4">
                                <div class="overflow-hidden mb-4">
                                    <img class="img-fluid" src="{{url('/')}}/storage/uploads/noticia/{{$noticia->arquivos[0]->id}}/{{$noticia->arquivos[0]->arquivo}}" alt="{{$noticia->titulo}}">
                                </div>
                                <h4 class="mb-3">{{$noticia->titulo}}</h4>
                                <p>{{mb_strimwidth(strip_tags($noticia->resumo), 0, 30, " ...")}}</p>
                                <a class="btn-slide mt-4" href="noticia/{{$noticia->id}}"><i class="fa fa-arrow-right"></i><span>Ler mais</span></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if($membros)
        <div class="container-xxl py-5">
            <div class="container py-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-5">Membros do Conselho</h1>
                </div>
                <div class="row g-4" style="justify-content: center;">
                    @foreach($membros as $membro)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="team-item p-4">
                                <div class="overflow-hidden mb-4">
                                    <img class="img-fluid" src="{{url('/')}}/storage/uploads/membro/{{$membro->arquivo->id}}/{{$membro->arquivo->arquivo}}" alt="{{$membro->nome}}" style="width: 252px; height: 252px;object-fit: contain;">
                                </div>
                                <h5 class="mb-0">{{$membro->nome}}</h5>
                                <p>{{$membro->funcao}}</p>
                                <div class="btn-slide mt-1">
                                    <i class="fa fa-share"></i>
                                    <span>
                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-membro-{{$membro->id}}"><i class="fab fa-plus"></i></a>
                                        <a href="{{$membro->facebook ? $membro->facebook : '#'}}"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{$membro->instagram ? $membro->instagram : '#'}}"><i class="fab fa-instagram"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @include('site.principal._components._modal_membro' , ['membro' => $membro])
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
