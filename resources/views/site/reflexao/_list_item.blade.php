<?php 
$titulo_url = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", 
strtr(utf8_decode(trim($reflexao->nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

?>

<div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
    <div class="service-item p-4" style="height: 250px;">
        <h4 class="mb-3">{{$reflexao->nome}}</h4>
        @if ($reflexao->resumo)
            <p>
                <?=mb_strimwidth($reflexao->resumo, 0, 100, " ...")?>
            </p>
        @endif
        <a class="btn-slide mt-3" style="position: absolute !important;" href="/reflexao/{{$reflexao->id}}/{{preg_replace('/[ -]+/' , '-' , $titulo_url)}}"><i class="fa fa-arrow-right"></i><span>Ler mais</span></a>
    </div>
</div>