<?php 
$titulo_url = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", 
strtr(utf8_decode(trim($video->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );
?>

<div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
    <div class="service-item p-4">
        <div class="overflow-hidden mb-4">
            <a href="/video/{{$video->id}}/{{preg_replace('/[ -]+/' , '-' , $titulo_url)}}">
                <img class="img-fluid" src="{{$video->getThumbVideo()}}" alt="{{$video->titulo}}">
            </a>
        </div>
        <h4 class="mb-3">{{$video->titulo}}</h4>
        @if ($video->data_publicacao)
            <p>Data de Publicação: {{$video->data_publicacao->format('d/m/Y')}}</p>
        @endif
        <a class="btn-slide mt-2" href="/video/{{$video->id}}/{{preg_replace('/[ -]+/' , '-' , $titulo_url)}}"><i class="fa fa-arrow-right"></i><span>Ver</span></a>
    </div>
</div>
