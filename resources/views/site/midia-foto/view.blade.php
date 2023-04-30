<?php
if($foto->arquivos){
    $fotos = $foto->arquivos;
}
?>

@extends('site.layouts.main')

@section('titulo', $foto->titulo)

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

@section('conteudo')
{{ Breadcrumbs::render('fotoView', $foto) }}
    <section>
        <div class="container">
            <div class="row">
                <div id="conteudo_view" class="col">
                    <h3><strong>{{$foto->titulo}}</strong></h3><hr />
                    <div class="row">
                    </div>
                    @if ($foto->credito)
                        <strong>Crédito: </strong>{{$foto->credito}}<br />
                    @endif
                    @if ($foto->data_publicacao)
                        <strong>Data de Publicação: </strong>{{$foto->data_publicacao->format('d/m/Y')}}<br />
                    @endif
                    @if ($foto->descricao)
                        <?=$foto->descricao?>
                    @endif
                    @if ($fotos)
                        <br />
                        <div class="row">
                            <div class="col-12">
                                @foreach ($fotos as $arquivo)
                                    <div class="mySlides">
                                        <img src="{{url('/')}}/storage/uploads/foto/{{$arquivo->id}}/{{$arquivo->arquivo}}"  width="100%" alt="{{$arquivo->nome_original}}" title="{{$foto->nome_original}}"> 
                                        @if ($arquivo->legenda)
                                            <span>{{$arquivo->legenda}}</span>
                                        @endif 
                                    </div>  
                                @endforeach
                                <div class="row nomargin">
                                    <div id="fotos" class="col-12">
                                        <ul>    
                                            @foreach ($fotos as $key=>$arquivo)
                                                <li><img class="demo cursor" src="{{url('/')}}/storage/uploads/foto/{{$arquivo->id}}/{{$arquivo->arquivo}}" style="width:100%; height:75px;" onclick="currentSlide(<?=$key+1?>)" alt="<?=$arquivo->nome_original?>"></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-Padrao" id="tras"><</button>
                                        <button class="btn-Padrao" id="frente">></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <br>
                </div>
            </div>
        </div>
    </section>
    <div class="container"> @include('site.layouts._partials._botaoVoltar')</div>
    <script src="{{ asset('js/slider.js')}}"></script>
@endsection