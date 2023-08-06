@extends('site.layouts.main')

@section('titulo', 'Doutrina')

@section('conteudo')
@include('sweetalert::alert')
{{ Breadcrumbs::render('doutrina') }}

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="images/confissao-westminster.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-5">Doutrina</h1>
                    <p class="">Os presbiterianos crêem que uma teologia correta, equilibrada e bíblica é essencial para a vida do cristão. Todo crente, mesmo sem o saber, tem concepções teológicas e essas concepções irão influenciar todos os aspectos da sua vida cristã. Os reformados não valorizam a teologia pela teologia, mas como um instrumento para nos proporcionar um melhor conhecimento de Deus e do nosso relacionamento com ele.</p>
                    <ul>
                        <li>O fundamento maior da fé reformada são as Escrituras do Antigo e do Novo Testamento, nossa única regra de fé e prática. Os documentos de Westminster (Confissão de Fé e Catecismos) não tem a mesma autoridade que a Bíblia. Eles são aceitos pelos presbiterianos como expressão histórica do seu entendimento da fé cristã e como um roteiro ou auxílio para o estudo das Escrituras.</li>
                        <li>A fé reformada abraça três categorias de doutrinas: (a) algumas delas são aceitas por todos os cristãos, como a trindade, o caráter divino-humano de Jesus Cristo, a sua ressurreição, sua morte expiatória, a segunda vinda, etc. – essencialmente, as verdades afirmadas pelos grandes concílios da igreja antiga, nos séculos IV e V; (b) outras doutrinas são as que temos em comum com as demais igrejas protestantes ou evangélicas: as Escrituras como única regra de fé e prática, a suficiência da obra redentora de Cristo, a salvação exclusivamente pela graça mediante a fé, o sacerdócio universal dos crentes, os sacramentos do batismo e da santa ceia, etc.; (c) finalmente, existem aquelas doutrinas e práticas mais específicas dos presbiterianos, como a ênfase na absoluta soberania de Deus, a conseqüente crença na eleição ou predestinação, o batismo por “aspersão” e o batismo infantil, e a forma de governo presbiterial.</li>
                        <li>Por causa da sua ênfase nas Escrituras e na boa teologia, os reformados tem dado grande valor à educação, tanto para as pessoas em geral, quanto para os seus pastores – os ministros da Palavra. Essa preocupação intelectual nunca deve ocorrer às expensas da vida espiritual (estudo + devoção).</li>
                    </ul>
                  
                </div>
            </div>
            <br><br>
            <div class="text-center">
                <a href="images/breve-catecismo-westminster.pdf" target="_blank" class="btn btn-primary py-3 px-5">Breve Catecismo de Westminster</a>
                <a href="images/catecismo-maior-westminster.pdf" target="_blank" class="btn btn-primary py-3 px-5">Catecismo Maior de Westminster</a>
                <a href="images/confissao-westminster.pdf" target="_blank" class="btn btn-primary py-3 px-5">Confissão de Fé de Westminster</a>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
