@extends('site.layouts.main')

@section('titulo', $video->nome)

@section('conteudo')
{{ Breadcrumbs::render('videoView', $video) }}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="titulo">
                        Galeria de Vídeos
                        <span></span>
                    </div>
                    <div class="row">
                        @if ($video->link)
                            <div class="col-12">
                                <iframe width="100%" height="650" class="rounded-maior" src="{{$video->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        @endif
                        <div class="col-12">
                            <br />
                            <h3 class="text-center"><strong>{{$video->titulo}}</strong></h3>
                            <p class="text-justify">
                                @if ($video->data_publicacao)
                                    Data: <?=$video->data_publicacao->format('d/m/Y')?><br />
                                @endif
                                @if ($video->descricao)
                                    <?=$video->descricao?>
                                @endif
                            </p>
                        </div>    
                    </div>
                    <div class="col-12 text-right">
                        <br /><br />
                        @include('site.layouts._partials._botaoVoltar')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection