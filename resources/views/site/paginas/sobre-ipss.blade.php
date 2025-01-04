@extends('site.layouts.main')

@section('titulo', 'Nossa História')

@section('conteudo')
@include('sweetalert::alert')
{{ Breadcrumbs::render('sobre-ipss') }}

<!-- SUBTÍTULO: O COMEÇO -->
<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss-david-maria.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">O Começo</h1>
                <p class="mb-5">A história começa em 1954, com a chegada do simpático casal Sr. David Machado e Sra. Maria Ana Rodrigues Machado juntamente com seus filhos, dentre os quais estava o nosso querido presbítero Jorge, em Sapucaia do Sul. Nesse ano de 1954, a Sra. Maria Ana Rodrigues Machado, que conhecera o Senhor Jesus na Igreja Presbiteriana de Porto Alegre, tendo a ardente vontade de estar próxima ao povo de Deus, procurou o pastor Antônio Elias para que esse pudesse pregar a Palavra do Senhor em sua casa. O pastor aceitou o convite e, assim, a casa da Sra. Maria veio a se tornar um ponto de pregação do Evangelho.</p>

                <strong>Imagem: Sr. David Machado e Sra. Maria Ana Rodrigues</strong>
            </div>
        </div>
    </div>
</div>

<!-- SUBTÍTULO: A PEQUENA IGREJA -->
<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">A Pequena Igreja</h1>
                <p>Depois que o irmão rev. Antônio Elias foi embora em 1957, quem assumiu seu lugar foi o Rev. Odayr Olivetti, o qual, no mesmo ano, comprou dois terrenos em Sapucaia do Sul. Em janeiro do ano seguinte, o senhor David Machado construiu uma casa de madeira com estilo de igreja, a qual serviria para espalhar a sã doutrina por meio dos Cultos e das Escolas Bíblicas Dominicais. (O pastor Odayr Olivetti permaneceu até 1960 e foi substituído pelo Pr. Oscar Ciola).</p>

                <strong>Imagem: a casa de madeira construída pelo Sr. David Machado</strong>
            </div>

            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss2.jpeg" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss3.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">Como se Desfez a Pequena Igreja</h1>
                <p class="mb-5">Em Canoas, um senhor espanhol chamado Francisco Querol e sua família possuíam uma vidraçaria, na qual o Pr. Odair Olivett dava assistência. Naquele mesmo ano, o Pr. Odair inaugurou a congregação em Sapucaia e, desde então, o senhor Francisco Querol e sua família passaram a frequentar a congregação em Sapucaia mantendo, entretanto, o ponto de pregação em sua casa. Essa família abençoadíssima contribuiu de forma significativa nas Escolas Bíblicas Dominicais.<br><br>
                    Os trabalhos naquela congregação estavam indo muito bem, mas, infelizmente, em 1963 um forte vento derrubou a congregação e a partiu ao meio.
                </p>

                <strong>Imagem: desenho da casa de madeira sendo destruída</strong>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Reconstrução</h1>
                <p>Como a primeira igreja estava também começando não havia recursos suficientes para que o templo fosse reconstruído. Sem enxergar outra saída, o conselho decidiu vender os dois terrenos e fechar os trabalhos em Sapucaia. Mas os planos de Deus não podem fracassar! O Senhor tocou o coração de seu servo, o Sr. David Machado, e este, por sua vez, desmanchou e reconstruiu a congregação, porém menor, e tudo isso com os recursos de seu próprio bolso. No dia sete de dezembro de 1963, a congregação foi reinaugurada pelo então pastor, o Sr. Oscar Ciola.
                    <br><br>Nesse meio tempo, o conselho decidiu escalar o presbítero Manoel Junqueira para ficar responsável pelos trabalhos na congregação de Sapucaia. O casal Manoel Junqueira e Marina Junqueira foi uma bênção.
                    <br><br>O pr. Oscar Ciola ficou de 1960 até 1965.
                </p>

                <strong>Imagem: Nova congregação construída pelo Sr. David Machado. O pastor Oscar Ciola aparece no centro, junto com sua esposa, Dona Elba Ciola. O Sr. Manoel Junqueira está na porta com sua esposa, Marina Junqueira, e, à esquerda, podemos ver o Sr. David Machado e Dona Maria Machado.</strong>

            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss4.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss5.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">Sr. e Sra. Greide</h1>
                <p class="mb-5">Em 1965, o casal Sr. Floyd Greide e Sra. Loida Greide, junto com sua família, assumiu a congregação de Sapucaia do Sul. Foi somente a partir desse ano que as reuniões se tornaram mais frequentes. O pastor Floyd também foi responsável pela compra do terreno e pela construção da congregação de Canoas. Vale destacar que o Rev. Floyd precisava retornar periodicamente aos Estados Unidos para renovar seu passaporte.
                    <br><br>O Rev. Floyd permaneceu de fevereiro de 1965 a setembro de 1967, quando deixou a congregação sob a liderança do pastor Alberto Journey, que a pastoreou de setembro de 1967 a maio de 1968. Após o Rev. Alberto Journey, o pastoreio foi assumido pelo Rev. Rubens Sulc, que permaneceu de maio de 1968 até 1970.
                </p>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Templo de Alvenaria</h1>
                <p>No ano de 1970, o Sr. Floyd Greide retornou para reassumir o pastoreio da congregação, exercendo essa função de 1970 a 1975. Ao final desse período, o Sr. Floyd passou a atuar em outros setores, deixando em seu lugar o Rev. Geraldo Camargo, que assumiu este ministério até 1980. Ele foi responsável por desmanchar o antigo edifício de madeira e construir um novo de alvenaria.
                    <br><br>É justo destacar que os tijolos utilizados na construção foram arrecadados pela irmã Zeferina dos Santos, membra da Sociedade Auxiliadora Feminina. Em fevereiro de 1981, o pastor Paulo Edison Petreca assumiu o pastoreio, permanecendo por um curto período, até 1982.

                </p>

                <strong>Imagem: Ao fundo, podemos ver o edifício construído pelo Pr. Geraldo Camargo, embora a imagem seja mais atual</strong>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss7.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss.jpeg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">A Primeira Igreja Fora da Capital</h1>
                <p class="mb-5">Em setembro de 1982, o Rev. William Carraher assumiu a congregação. Foi ele quem construiu o templo de alvenaria que é usado até hoje pela igreja, além de uma casa pastoral de madeira ao lado.
                    <br><br>Em 1985, as congregações de Sapucaia e Canoas se uniram para formar uma única igreja, a primeira fora da capital, Porto Alegre. Assim surgiu o primeiro Presbitério do Rio Grande do Sul, composto pelas igrejas presbiterianas da Azenha, do bairro Tristeza, do bairro Cristo Redentor, Metropolitana e Sapucaia do Sul.
                    <br><br>O pastor Bill retornou aos Estados Unidos, deixando em seu lugar o missionário José Xavier de Oliveira, que liderou a igreja de abril de 1985 a dezembro de 1988.

                </p>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Pastor Levi F.</h1>
                <p>Em janeiro de 1988 o pastor Levi F. da Silva assumiu o cargo de pastor da igreja, permanecendo neste ministério até junho de 1989.

                </p>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss8.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss9.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">Pastor Henry Matthew Haswell Jr.</h1>
                <p class="mb-5">De 1989 a 1993, o senhor Henry Matthew Haswell Jr. assumiu o pastorado da igreja.

                </p>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Presbítero Jailton Galvão</h1>
                <p>De julho de 1993 até dezembro do mesmo ano, foi o presbítero Jailton Galvão quem assumiu os trabalhos da igreja. O Sr. Jailton foi também presidente do presbitério.

                </p>

                <strong>Imagem: o Presbítero Jailton Galvão está à esquerda perto da irmã de amarelo.</strong>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss10.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss11.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">Pastor Célio João Duarte</h1>
                <p class="mb-5">De janeiro de 1994 a dezembro de 1995 foi o pastor Célio João Duarte que pastoreou a igreja.

                </p>

                <strong>Imagem: O senhor que está de costas é o nosso querido irmão, Sr. Jorge David Machado</strong>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Pastor Luiz Alberto de Castro</h1>
                <p>Em janeiro de 1996, o pastor Luiz Alberto de Castro assumiu a igreja, juntamente com sua esposa, Lídia, e seu filho, André. Ele foi responsável por iniciar a construção da casa pastoral, de quatro salas para as Escolas Bíblicas Dominicais, dois banheiros e duas peças destinadas para aluguel. Essa família permaneceu até dezembro de 2001.

                </p>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss12.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss13.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">2002 e 2003</h1>
                <p class="mb-5">De janeiro a dezembro de 2002 foi o senhor Josinaldo C. Nascimento quem pastoreou nossa igreja e, de janeiro a dezembro de 2003, o senhor Antônio Paulo M. de Oliveira assumiu o ministério pastoral da igreja de Sapucaia.

                </p>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Pastor Paulo Roberto Magalhães</h1>
                <p>Em janeiro de 2004 assumiu o pastor Paulo Roberto Magalhães com sua esposa Isabel. Ele foi responsável pela colocação do piso e do reboco interno e pastoreou a igreja até 2008.

                </p>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/historia-ipss14.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-110" src="images/historia-ipss15.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">Pastor Domingos Orlando da Silva</h1>
                <p class="mb-5">Em 2009, o Rev. Domingos Orlando da Silva assumiu a liderança da igreja, dando continuidade aos trabalhos. Ele permaneceu no cargo de pastor até 2010.

                </p>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Momentos de Tribulação</h1>
                <p>Após a saída do Rev. Domingos, o pastor Edvaldo Xavier Gomes assumiu a liderança da igreja, acompanhado por sua esposa. Ele pastoreou a igreja de 2010 até 2017. Infelizmente, nesse período, houve intrigas e desavenças, o que resultou na transformação da Igreja Presbiteriana de Sapucaia do Sul novamente em uma congregação, com poucos membros remanescentes após 31 anos de história como igreja.   

                </p>

                
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/ovelha.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/pastor2.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">Recomeço</h1>
                <p class="mb-5">Contudo, Deus continuava no controle. Inicialmente, o Presbitério entregou a congregação, por um curto período, aos cuidados da Igreja de Sapiranga. Posteriormente, o Presbitério reassumiu a responsabilidade pela congregação, enviando o Rev. Everton de Borba Pereira para pastoreá-la com os poucos membros que restavam. O pastor Everton permanece pastoreando a igreja, sob a graça de nosso Deus, até os dias atuais (2024) juntamente com sua família.
                    <br><br>Deus, em Sua Eterna Sabedoria, permitiu que todas essas coisas acontecessem com essa comunidade. Como Ele é sempre tão bondoso! Em 2020, durante a pandemia de COVID-19, Deus trouxe um novo grupo de pessoas que se tornaram membros da igreja, possibilitando, assim, um novo recomeço para a nossa comunidade. Que essas pessoas possam levar o Evangelho a toda criatura em Sapucaia do Sul.
                    <br><br>Daqui em diante, a história continua com essas pessoas e, sob a bênção de Jesus Cristo, que elas sejam sempre orientadas em Seus caminhos, crescendo em amor e santidade. Amém.


                </p>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container feature py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Considerações</h1>
                <p>Este texto foi <em>adaptado por Jean Pereira Zeni</em>, com base no texto original <em>escrito pelo irmão Sr. Jorge David Machado</em>, filho do Sr. David Machado e da Sra. Maria Ana R. Machado. O Sr. Jorge vivenciou a história desta comunidade e permanece ativo na igreja até hoje (2024). Ele fez sua pública confissão de fé, foi batizado e também se casou nesta mesma igreja.

                </p>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="images/presbiteroJorge.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection