@extends('site.layouts.main')

@section('titulo', 'História da IPB')

@section('conteudo')
@include('sweetalert::alert')
{{ Breadcrumbs::render('sobre-ipb') }}

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="images/sobre-historia.png" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-5">História da Igreja Presbiteriana do Brasil</h1>
                    <p class="mb-5">Ashbel Green Simonton (1833-1867), o fundador da Igreja Presbiteriana do Brasil, nasceu em West Hanover, no sul da Pensilvânia, e passou a infância na fazenda da família, denominada Antigua. Eram seus pais o médico e político William Simonton e D. Martha Davis Snodgrass (1791-1862), filha de um pastor presbiteriano. Ashbel era o mais novo de nove irmãos. Os irmãos homens (William, John, James, Thomas e Ashbel) costumavam denominar-se os "quinque fratres" (cinco irmãos). Um deles, James Snodgrass Simonton, quatro anos mais velho que Ashbel, viveu por três anos no Brasil e foi professor na cidade de Vassouras, no Rio de Janeiro. Uma das quatro irmãs, Elizabeth Wiggins Simonton (1822-1879), conhecida como Lille, veio a casar-se com o Rev. Alexander Latimer Blackford, vindo com ele para o Brasil.  
                        <br/>O surgimento do presbiterianismo no Brasil resultou do pioneirismo e desprendimento do Rev. Ashbel Green Simonton (1833-1867). Nascido em West Hanover, na Pensilvânia, Simonton estudou no Colégio de Nova Jersey e inicialmente pensou em ser professor ou advogado. Influenciado por um reavivamento em 1855, fez a sua profissão de fé e, pouco depois, ingressou no Seminário de Princeton. Um sermão pregado por seu professor, o famoso teólogo Charles Hodge, levou-o a considerar o trabalho missionário no estrangeiro. Três anos depois, candidatou-se perante a Junta de Missões da Igreja Presbiteriana dos Estados Unidos, citando o Brasil como campo de sua preferência. Dois meses após a sua ordenação, embarcou para o Brasil, chegando ao Rio de Janeiro em 12 de agosto de 1859, aos 26 anos de idade.<br><br>
                        <a href="https://ipb.org.br/" target="_blank" class="btn btn-primary py-3 px-5">Site da IPB</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
