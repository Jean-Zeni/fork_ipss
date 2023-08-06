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
                    <p class="mb-5">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="images/reformadores.png" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
