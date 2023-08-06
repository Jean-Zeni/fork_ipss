@extends('site.layouts.main')

@section('titulo', $video->titulo)

@section('conteudo')
    {{ Breadcrumbs::render('videoView', $video) }}
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-7 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    @if ($video->link)
                        <iframe width="100%" height="650px" class="rounded-maior" src="https://www.youtube.com/embed/<?=$video->getYouTubeId()?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    @endif
                </div>
                <div class="col-lg-5 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-5">{{$video->titulo}}</h1>
                    <p class="mb-5">
                        @if ($video->descricao)
                            <strong>Data de Publicação: </strong> {{$video->data_publicacao->format('d/m/Y')}}<br>
                        @endif
                    </p>
                    <p class="mb-5">
                        @if ($video->descricao)
                            <?=$video->descricao?>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection