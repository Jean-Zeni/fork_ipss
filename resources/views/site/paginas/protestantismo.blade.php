@extends('site.layouts.main')

@section('titulo', 'Protestantismo')

@section('conteudo')
@include('sweetalert::alert')
{{ Breadcrumbs::render('protestantismo') }}

<!-- About Start -->
<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/protestantismo.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">Protestantismo</h1>
                <p class="mb-5">O protestantismo é uma das três principais divisões do cristianismo, junto com o catolicismo e a ortodoxia, sendo a segunda com o maior número de adeptos e a última a ser criada. Com mais de 900 milhões de adeptos em todo o mundo compreende aproximadamente 40% de todos os cristãos. Originou-se com a Reforma Protestante, um movimento contra o que seus seguidores consideravam erros na Igreja Católica. Desde então, os protestantes rejeitam a doutrina católica romana da supremacia papal e dos sacramentos, mas discordam entre eles sobre a presença real de Cristo na Eucaristia. Eles enfatizam o sacerdócio de todos os crentes, a justificação pela fé (sola fide) em vez das boas obras e a autoridade da Bíblia sozinha (e não com a tradição sagrada) na fé e na moral (sola scriptura). As "Cinco Solas" resumem as diferenças teológicas básicas em oposição à Igreja Católica Romana. O protestantismo é popularmente considerado como tendo começado na Alemanha em 1517, quando Martinho Lutero publicou suas 95 Teses como uma reação contra abusos na venda de indulgências pela Igreja Católica Romana, que pretendia oferecer remissão de pecado aos seus compradores. No entanto, o termo deriva da carta de protesto dos príncipes luteranos alemães em 1529 contra o édito da Dieta de Speyer, que condena os ensinamentos de Martinho Lutero como heréticos. Embora existissem rupturas anteriores e tentativas de reforma da Igreja Católica Romana - notadamente por Pedro Valdo, John Wycliffe e Jan Hus — somente Lutero conseguiu desencadear um movimento mais amplo, duradouro e moderno. No século XVI, o luteranismo se espalhou da Alemanha para Dinamarca, Noruega, Suécia, Finlândia, Letônia, Estônia e Islândia. As denominações reformadas (ou calvinistas) espalharam-se na Alemanha, Hungria, Países Baixos, Escócia, Suíça e França por reformadores como João Calvino, Huldrych Zwingli e John Knox. A separação política da Igreja da Inglaterra do papa sob o governo do rei Henrique VIII fez surgir o anglicanismo na Inglaterra e no País de Gales, parte do movimento mais amplo da Reforma.</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Feature Start -->
<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Os Reformadores</h1>
                <p class="mb-5">Dentre os reformadores há alguns nomes que recebem maior destaque, como por exemplo:
                </p>
                <ul>
                    <li>Martinho Lutero (1483 - 1546)</li>
                    <li>João Calvino (1509 - 1564)</li>
                    <li>Huldrych Zwingli (Ulrico Zuínglio) (1484 - 1531)</li>
                    <li>Jan Hus (1369 - 1415)</li>
                    <li>John Wycliffe (1330 - 1384)</li>
                </ul>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/reformadores.png" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TIMELINE DO PROTESTANTISMO -->
<div class="timeline">

<div class="time-container left wow fadeInUp" data-wow-delay="0.5s">
          <div class="content">
            <h2>Implantação (1859-1869)</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem dignissimos, repellendus dolorum esse sit quod nesciunt reprehenderit sunt eius. Repudiandae sequi ducimus corporis minus distinctio similique eum sint minima laborum. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium vitae aut nostrum officia eligendi consequatur molestiae voluptas quas praesentium eaque laboriosam similique cupiditate ea rem magni, eveniet exercitationem velit illo.</p>
          </div>
        </div>

</div>
@endsection