<?php 
$titulo_url = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", 
strtr(utf8_decode(trim($noticia->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

?>

<div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
    <div class="service-item p-4">
        <div class="overflow-hidden mb-4">
            <a href="/noticia/{{$noticia->id}}/{{preg_replace('/[ -]+/' , '-' , $titulo_url)}}">
                @if (count($noticia->arquivos) != 0)
                    <img class="img-fluid" src="{{url('/')}}/storage/uploads/noticia/{{$noticia->arquivos[0]->id}}/{{$noticia->arquivos[0]->arquivo}}" alt="{{$noticia->titulo}}">
                @else
                    <img src="{{url('/')}}/images/indisponivel-ipss.png" alt="{{$noticia->titulo}}" title="{{$noticia->titulo}}">
                @endif
            </a>
        </div>
        <h4 class="mb-3">{{$noticia->titulo}}</h4>
        @if ($noticia->data_publicacao)
            <p>Data de Publicação: {{$noticia->data_publicacao->format('d/m/Y')}}</p>
        @endif
        <a class="btn-slide mt-4" href="/noticia/{{$noticia->id}}/{{preg_replace('/[ -]+/' , '-' , $titulo_url)}}"><i class="fa fa-arrow-right"></i><span>Ler mais</span></a>
    </div>
</div>