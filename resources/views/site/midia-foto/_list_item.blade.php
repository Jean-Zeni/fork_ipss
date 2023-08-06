<?php 
$titulo_url = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", 
strtr(utf8_decode(trim($foto->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

?>

<div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
    <div class="service-item p-4">
        <div class="overflow-hidden mb-4">
            <a href="/foto/{{$foto->id}}/{{preg_replace('/[ -]+/' , '-' , $titulo_url)}}">
                @if (count($foto->arquivos) != 0)
                    <img class="img-fluid" src="{{url('/')}}/storage/uploads/foto/{{$foto->arquivos[0]->id}}/{{$foto->arquivos[0]->arquivo}}" alt="{{$foto->titulo}}">
                @else
                    <img src="{{url('/')}}/images/indisponivel-ipss.png" alt="{{$foto->titulo}}" title="{{$foto->titulo}}">
                @endif
            </a>
        </div>
        <h4 class="mb-3">{{$foto->titulo}}</h4>
        @if ($foto->data_publicacao)
            <p>Data de Publicação: {{$foto->data_publicacao->format('d/m/Y')}}</p>
        @endif
        <a class="btn-slide mt-2" href="/foto/{{$foto->id}}/{{preg_replace('/[ -]+/' , '-' , $titulo_url)}}"><i class="fa fa-arrow-right"></i><span>Ver</span></a>
    </div>
</div>