@extends('site.layouts.main')

@section('titulo', 'Reflexões')

@section('conteudo')
    {{ Breadcrumbs::render('reflexaoView', $reflexao) }}
    <div class="container py-5 px-lg-0">
        <div class="row g-5 mx-lg-0">
            <div class="col about-text wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-5">{{$reflexao->nome}}</h1>
                <?php if ($reflexao->resumo) : ?>
                    <i><?= $reflexao->resumo ?></i>
                    <br />
                <?php endif ?>
                <hr />
                @if ($reflexao->descricao)
                    <?=$reflexao->descricao?>
                @endif
                @if ($reflexao->membro)
                    <br>
                    <strong>Autor: </strong> {{ $reflexao->membro->id == 1 ? 'Pr.' : '' }} {{$reflexao->membro->nome}}
                @endif
                <!--<div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="/images/pastor.jpg" style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Éverton</h5>
                            <p class="m-0">Pastor</p>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
@endsection