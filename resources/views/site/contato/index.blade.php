@extends('site.layouts.main')

@section('titulo', 'Fale conosco')

@section('conteudo')
@include('sweetalert::alert')
{{ Breadcrumbs::render('contato') }}
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 margin20T margin-bottom-responsiva">
                <div class="titulo">
                    Contato
                </div>
                <br>
                <p>
                Para entrar em contato conosco, envie um e-mail para contato@ipss.org.br ou preencha o formulário abaixo.
                </p>
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 margin20T">
                        @include('site.contato._form')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="titulo">
                    Endereço
                </div>
                <br>
                <div class="row">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3461.4261671055433!2d-51.14801368450476!3d-29.82311828196326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95196f2e50edf619%3A0x6dbbda5f1c37a73e!2sIgreja%20Presbiteriana%20do%20Brasil%20-%20Sapucaia%20do%20Sul!5e0!3m2!1spt-BR!2sbr!4v1676334193254!5m2!1spt-BR!2sbr" width="600" height="450" style="border: solid 1px #044d2b !important;" frameborder="0" ></iframe>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br>
@endsection
