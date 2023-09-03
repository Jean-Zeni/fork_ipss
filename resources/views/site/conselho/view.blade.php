@extends('site.layouts.main')

@section('titulo', 'Conselho')

@section('conteudo')
{{ Breadcrumbs::render('conselho') }}
    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        @if ($conselho->arquivo) 
                            <img class="position-absolute img-fluid w-100 h-100" src="{{url('/')}}/storage/uploads/conselho/{{$conselho->arquivo->id}}/{{$conselho->arquivo->arquivo}}" style="object-fit: cover;" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-5">{{$conselho->nome}}</h1>
                    @if ($conselho->descricao)          
                            <?=$conselho->descricao?>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Membros</h1>
            </div>
            <div class="row g-4">
                @if ($conselho->membros)
                    @foreach ($conselho->membros as $membro)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="team-item p-4">
                                <div class="overflow-hidden mb-4">
                                    @if ($membro->arquivo)
                                        <img class="img-fluid" src="{{url('/')}}/storage/uploads/membro/{{$membro->arquivo->id}}/{{$membro->arquivo->arquivo}}" alt="{{$membro->nome}}" style="width: 252px; height: 252px;object-fit: contain;">
                                    @endif
                                </div>
                                <h5 class="mb-0">{{$membro->nome}}</h5>
                                @if ($membro->funcao)
                                    <p>{{$membro->funcao}}</p>
                                @endif
                                <div class="btn-slide mt-1">
                                    <i class="fa fa-share"></i>
                                    <span>
                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-membro-{{$membro->id}}"><i class="fab fa-plus"></i></a>
                                        <a href="{{$membro->facebook ? $membro->facebook : '#'}}"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{$membro->instagram ? $membro->instagram : '#'}}"><i class="fab fa-instagram"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @include('site.principal._components._modal_membro' , ['membro' => $membro])
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection