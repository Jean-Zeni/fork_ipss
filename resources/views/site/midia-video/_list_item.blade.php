<?php 
$titulo_url = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", 
strtr(utf8_decode(trim($video->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

?>

@if ($video->link)
    <div class="col-12 rounded-maior">
        <iframe width="100%" height="300" src="{{$video->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
@endif
<div class="col-12 text-center">
    <a href="/video/{{$video->id}}/{{preg_replace('/[ -]+/' , '-' , $titulo_url)}}">
        <h5><strong>{{$video->titulo}}</strong></h5>
    </a>
    @if ($video->data_publicacao)
        <p>Data de Publicação: {{$video->data_publicacao->format('d/m/Y')}}</p>
    @endif
</div>    
<br><br>
