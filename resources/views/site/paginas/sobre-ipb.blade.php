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
                    <p class="mb-5">
                        Com fins didáticos, a história da IPB tem sido dividida em diferentes períodos, cada um deles marcado por eventos e transformações significativas que ajudaram a moldar a instituição como a conhecemos hoje. A seguir, apresentaremos os principais dados de cada um desses períodos.<br><br><br><br>
                        <a href="https://www.ipbhistoriaeidentidade.com.br/materiais/sintese-historica-da-igreja-presbiteriana-do-brasil-breve/" target="_blank" class="btn btn-primary py-3 px-5">Fonte</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="timeline">
        <div class="time-container left wow fadeInUp" data-wow-delay="0.5s">
          <div class="content">
            <h2>Implantação (1859-1869)</h2>
            <p>O missionário fundador da IPB, Ashbel Green Simonton (1833-1867), da Igreja Presbiteriana do Norte dos Estados Unidos (PCUSA), chegou ao Brasil em 12/08/1859. Nos anos seguintes, ele e alguns colegas iniciaram a Igreja Presbiteriana do Rio de Janeiro (1862), o jornal Imprensa Evangélica (1864), o Presbitério do Rio de Janeiro (1865) e o “Seminário Primitivo” (1867). Outras igrejas locais fundadas nesse período foram as de São Paulo, Brotas, Lorena, Borda da Mata e Sorocaba. Chegaram novos obreiros, como Alexander Blackford, Francis Schneider e George Chamberlain, e foi ordenado o primeiro pastor nacional, José Manoel da Conceição (1822-1873).</p>
          </div>
        </div>
        <div class="time-container right wow fadeInUp" data-wow-delay="0.5s">
          <div class="content">
            <h2>Consolidação (1869-1888)</h2>
            <p>Em 1869, chegaram os primeiros missionários da Igreja do Sul dos Estados Unidos (PCUS), George Nash Morton e Edward Lane, que se estabeleceram em Campinas (SP). Os missionários da PCUS evangelizaram a região da Mogiana, o oeste de Minas, o Triângulo Mineiro e o sul de Goiás. Também atuaram no Nordeste e no Norte, de Alagoas até a Amazônia. Os mais destacados foram John Rockwell Smith, John Boyle, DeLacey Wardlaw e George William Butler. Por sua vez, os missionários da Igreja do Norte atuaram na Bahia e Sergipe e no Sudeste-Sul (do Rio de Janeiro a Santa Catarina). Em 1870, o Rev. Chamberlain fundou a Escola Americana de São Paulo, precursora do Mackenzie College, e em 1873 Morton e Lane criaram o Colégio Internacional, em Campinas. Entre os pastores nacionais desse período estiveram Modesto Carvalhosa, Antônio Trajano, Miguel Torres, Antônio Pedro de Cerqueira Leite, Eduardo Carlos Pereira, Zacarias de Miranda e Belmiro César. As igrejas-mães também enviaram educadoras como Mary Dascomb, Elmira Kuhl e Charlotte Kemper.</p>
          </div>
        </div>
        <div class="time-container left wow fadeInUp" data-wow-delay="0.5s">
          <div class="content">
            <h2>Dissensão (1888-1903)</h2>
            <p>Em setembro de 1888 foi organizado o Sínodo Presbiteriano, composto de três presbitérios, 20 missionários, 12 pastores e 60 igrejas. A IPB tornou-se autônoma, desligando-se das igrejas-mães norte-americanas. O Seminário começou a funcionar em Nova Friburgo e depois se transferiu para São Paulo. O Mackenzie College foi criado em 1891, sendo seu primeiro presidente o Dr. Horace Manley Lane. Por causa da febre amarela, o Colégio Internacional foi transferido de Campinas para Lavras, e mais tarde veio a chamar-se Instituto Gammon. A cidade de Garanhuns começou a se tornar um grande centro da obra presbiteriana no Nordeste. Foram lançadas as bases de duas importantes instituições: o Colégio Quinze de Novembro e o Seminário do Norte. No final desse período a igreja presbiteriana chegou ao Pará, ao Amazonas e a Santa Catarina. A igreja também iniciou a ocupação do leste de Minas. Em 1903, no contexto de uma série de divergências, o Rev. Eduardo Carlos Pereira e seus companheiros deixaram o Sínodo da IPB e organizaram a Igreja Presbiteriana Independente.</p>
          </div>
        </div>
        <div class="time-container right wow fadeInUp" data-wow-delay="0.5s">
          <div class="content">
            <h2>Reconstituição (1903-1917)</h2>
            <p>Em 1906 o Sínodo contava com 77 igrejas e cerca de 6.500 membros. Em fevereiro de 1907, o Seminário foi transferido para Campinas, ocupando a antiga propriedade do Colégio Internacional. No mesmo ano, o Sínodo dividiu-se em dois (Norte e Sul) e em 1910 foi organizada a Assembléia Geral, tendo como primeiro moderador o Rev. Álvaro Reis. Nessa época, a IPB já estava com 10.000 membros comungantes e cerca de 150 igrejas, em sete presbitérios. Em 1911, a igreja enviou a Portugal o seu primeiro missionário, Rev. João Marques da Mota Sobrinho. A Missão Sul da PCUS passou a atuar em duas frentes: Missão Leste (Lavras) e Missão Oeste (Campinas). O Rev. William Alfred Waddell fundou uma influente escola em Ponte Nova, na Bahia. Teve início a obra presbiteriana no Mato Grosso: os pioneiros foram Franklin Graham (1913) e Filipe Landes (1915). Em 1917, foi aprovado o Modus Operandi, um acordo entre a igreja brasileira e as missões norte-americanas pelo qual os missionários se desligaram dos concílios da IPB, separando-se os campos nacionais (presbitérios) dos campos das missões.</p>
          </div>
        </div>
        <div class="time-container left wow fadeInUp" data-wow-delay="0.5s">
          <div class="content">
            <h2>Cooperação (1917-1932)</h2>
            <p>O maior líder desse período foi o Rev. Erasmo Braga (1877-1932). Em 1916, ele participou com dois colegas do Congresso da Obra Cristã na América Latina, no Panamá. Poucos anos depois, tornou-se o secretário da Comissão Brasileira de Cooperação (CBC), entidade que liderou um grande esforço cooperativo entre as igrejas evangélicas do Brasil. Foi fundado no Rio de Janeiro o Seminário Unido. Outros esforços cooperativos do período foram o Instituto José Manoel da Conceição, fundado pelo Rev. William Waddell em Jandira, perto de São Paulo (1928), e a Associação de Catequese dos Índios (1928), depois Missão Evangélica Caiuá, em Dourados (MS). Em 1921, o Seminário do Norte foi transferido para o Recife. Os principais periódicos presbiterianos eram O Puritano e Norte Evangélico. Em 1921 morreu o Rev. Antônio Bandeira Trajano e com ele desapareceu a primeira geração de obreiros presbiterianos no Brasil. Vários pastores deram valiosa contribuição de ordem intelectual e literária. Alguns deles foram autores de apreciados livros didáticos: Antônio Trajano (Álgebra Elementar), Eduardo Carlos Pereira (Gramática Expositiva), Otoniel Mota (O Meu Idioma), Erasmo Braga (Série Braga).</p>
          </div>
        </div>
        <div class="time-container right wow fadeInUp" data-wow-delay="0.5s">
          <div class="content">
            <h2>Organização (1932-1959)</h2>
            <p>Nas décadas de 1930 a 1950, a IPB aperfeiçoou sua estrutura, criando entidades voltadas para o trabalho feminino, a mocidade, missões nacionais e estrangeiras, literatura e ação social. Em 1940 foi organizada a Junta Mista de Missões Nacionais, com representantes da igreja e das missões norte-americanas. Em 1944 surgiu a Junta de Missões Estrangeiras e em 1950 foi criada a Missão Presbiteriana da Amazônia.Também houve a criação da Casa Editora Presbiteriana (1945). Neste período, a IPB participou de vários outros movimentos cooperativos: Associação Evangélica Beneficente, Confederação Evangélica do Brasil, Sociedade Bíblica do Brasil, Centro Áudio-Visual Evangélico. Em 1957 a IPB contava com seis sínodos, 41 presbitérios, 489 igrejas, 369 ministros, 89.741 membros comungantes e 71.650 não-comungantes. O período terminou com a comemoração do centenário do presbiterianismo no Brasil. A Campanha do Centenário fora lançada em 1946. Realizou-se uma grande campanha evangelística em 1952. Outras medidas foram a criação do Museu Presbiteriano, do Seminário do Centenário (Alto Jequitibá e Vitória) e do jornal Brasil Presbiteriano (1958), resultante da fusão de O Puritano e Norte Evangélico. O lema do centenário foi: “Um ano de gratidão por um século de bênçãos”.</p>
          </div>
        </div>
        <div class="time-container left wow fadeInUp" data-wow-delay="0.5s">
          <div class="content">
            <h2>Polarização (1959-1986)</h2>
            <p>Nesse período, a igreja sofreu o forte impacto dos acontecimentos políticos ocorridos no Brasil, que resultaram no regime militar (1964-1984). Intensificou-se a polarização entre conservadores e progressistas que já vinha se manifestando há alguns anos. Os conservadores, defensores da teologia reformada tradicional, foram vitoriosos nesse confronto quando o Rev. Boanerges Ribeiro foi eleito presidente do Supremo Concílio, sendo reeleito duas vezes, a primeira vez em que isso ocorreu na história da IPB (1966-1978). Boanerges foi sucedido por Paulo Breda Filho (1978-1986), o único presbítero a ocupar o cargo maior da igreja. Ao lado de grandes tensões, também houve desdobramentos construtivos como a transferência da Universidade Mackenzie para a IPB, a ampliação do trabalho de missões nacionais e estrangeiras, o aumento significativo do número de igrejas e concílios, e o crescimento numérico da denominação, que se aproximou da marca de meio milhão de membros comungantes e não-comungantes.</p>
          </div>
        </div>
        <div class="time-container right wow fadeInUp" data-wow-delay="0.5s"  >
          <div class="content">
            <h2>Período atual</h2>
            <p>Nas últimas décadas a IPB continuou a crescer e a diversificar as suas atividades. O ambiente político e teológico tornou-se mais conciliador, num ambiente de crescente pluralismo, mas ainda persistem tensões latentes. A igreja sofre o impacto dos novos movimentos que tem afetado o protestantismo brasileiro, especialmente nas áreas litúrgica e doutrinária. O neopentecostalismo tem exercido fascínio sobre muitos pastores e comunidades. No aspecto positivo, destacam-se a maior preocupação com a educação teológica, a criação de vínculos com igrejas reformadas ao redor do mundo, o investimento em missões transculturais, o notável crescimento na área de publicações e a utilização dos meios de comunicação de massa, como a televisão e a Internet.</p>
          </div>
        </div>
    </div>
    <!-- About End -->
@endsection
