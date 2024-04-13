<?php
if(count($pagina->arquivos) != 0){
    $arquivos = $pagina->arquivos;
}
$imagemCapa = $pagina->getImagemCapa();
if($imagemCapa){
    $imagens = $pagina->getImagems($imagemCapa->id);
    $idImagemCapa = $imagemCapa->id;
}
if($pagina->getDocumentos()){
    $documentos= $pagina->getDocumentos();
}

?>

@extends('site.layouts.main')

@section('titulo', $pagina->titulo)

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

@section('conteudo')
{{ Breadcrumbs::render('paginaView', $pagina) }}
    <!--
    <section>
        <div class="container-fluid">
            <div class="row">
                <div id="conteudo_view" class="col-12">
                    <div class="view-news">
                        <div class="titulo">
                            {{$pagina->titulo}}
                        </div>
                        <br>
                        <div class="row">
                            @if ($pagina->descricao)
                                <div class="text-justify">   
                                    @if ($imagemCapa)
                                        <img src="{{url('/')}}/storage/uploads/pagina/{{$imagemCapa->id}}/{{$imagemCapa->arquivo}}"  width="100%" class="foto-view-pagina" alt="{{$imagemCapa->nome_original}}" title="{{$imagemCapa->nome_original}}">
                                    @endif
                                    <?=$pagina->descricao?>
                                </div>
                            @endif
                        </div>
                        <br><br>
                        @if ($imagemCapa)
                            @if (count($imagens) != 0)
                                <br />
                                <div class="row">
                                    <div class="col-12">
                                        @foreach ($imagens as $arquivo)
                                            <div class="mySlides">
                                                <img src="{{url('/')}}/storage/uploads/pagina/{{$arquivo->id}}/{{$arquivo->arquivo}}"  width="100%" alt="{{$arquivo->nome_original}}" title="{{$arquivo->nome_original}}"> 
                                                @if ($arquivo->legenda)
                                                    <span>{{$arquivo->legenda}}</span>
                                                @endif 
                                            </div>  
                                        @endforeach
                                        <div class="row nomargin">
                                            <div id="fotos" class="col-12">
                                                <ul>    
                                                    @foreach ($imagens as $key=>$arquivo)
                                                        <li><img class="demo cursor" src="{{url('/')}}/storage/uploads/pagina/{{$arquivo->id}}/{{$arquivo->arquivo}}" style="width:100%; height:75px;" onclick="currentSlide(<?=$key+1?>)" alt="<?=$arquivo->nome_original?>"></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn-Padrao" id="tras"><</button>
                                                <button class="btn-Padrao" id="frente">></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        <br>
                        @if ($pagina->link_youtube)
                            <div class="col-12">
                                <iframe width="100%" height="500" class="rounded-maior" src="{{$pagina->link_youtube}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        @endif
                        @if (count($documentos) != 0)
                            <br /><br />
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="nomargin padding10 bg-light"><strong>Anexos</strong></h6>
                                    @foreach ($documentos as $arquivo)
                                        @if ($arquivo->tipo == "D")
                                            <a href="{{url('/')}}/storage/uploads/pagina/{{$arquivo->id}}/{{$arquivo->arquivo}}" class="btn-anexos" target="_blank" title="{{$arquivo->arquivo}}" data-pjax="0">
                                                <span class="material-symbols-outlined font-d text-center">
                                                    description
                                                </span>
                                                @if ($arquivo->legenda)
                                                    <strong>{{$arquivo->getPrettyName(50)}}</strong><br />
                                                @else
                                                    <strong>{{$arquivo->nome_original}}</strong><br />
                                                @endif
                                                {{($arquivo->data_publicacao)?"<small>(Publicado em {$arquivo->data_publicacao})</small>":"" }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        @if ($imagemCapa)
                            <img class="position-absolute img-fluid w-100 h-100" src="{{url('/')}}/storage/uploads/pagina/{{$imagemCapa->id}}/{{$imagemCapa->arquivo}}" style="object-fit: cover;" alt="{{$imagemCapa->nome_original}}">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-5">{{$pagina->titulo}}</h1>
                    <p class="mb-5">
                        @if($pagina->descricao)
                            <?=$pagina->descricao?>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/slider.js')}}"></script>
@endsection

<script type="text/javascript">
    window.onload = function () { 
        document.getElementById('icon-zap').style.cssText = 'margin-top:12px;';
    } 
</script>