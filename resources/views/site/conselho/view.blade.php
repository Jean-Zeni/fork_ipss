@extends('site.layouts.main')

@section('titulo', 'Conselho')

@section('conteudo')
{{ Breadcrumbs::render('conselho') }}
    <section>
        <div class="container-fluid">
            <div class="row">
                <div id="conteudo_view" class="col-md-12 col-lg-8">
                    <div class="view-news">
                        <div class="titulo">
                            {{$conselho->nome}}
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    @if ($conselho->descricao)             
                                        <div class="text-justify">    
                                            <?=$conselho->descricao?>
                                        </div>
                                    @endif
                                </div>
                                <br><br>
                                @if ($conselho->arquivo)        
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{url('/')}}/storage/uploads/conselho/{{$conselho->arquivo->id}}/{{$conselho->arquivo->arquivo}}" alt="conselho" class="foto-view-conselho" width="100%">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    @if ($conselho->membros)
                        @foreach ($conselho->membros as $membro)
                            @include('site.conselho._membro')
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="container"> @include('site.layouts._partials._botaoVoltar')</div>
@endsection