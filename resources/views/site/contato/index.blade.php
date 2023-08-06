@extends('site.layouts.main')

@section('titulo', 'Fale conosco')

@section('conteudo')
@include('sweetalert::alert')
{{ Breadcrumbs::render('contato') }}

    <!-- Contact Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container contact-page py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="mb-4">Fale Conosco</h1>
                    <p class="mb-4">Para entrar em contato conosco, envie um e-mail para contato@ipss.org.br ou preencha o formulário abaixo.</p>
                    <div class="bg-light p-4">
                        @include('site.contato._form')
                    </div>
                </div>
                <div class="col-md-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3461.4261671055433!2d-51.14801368450476!3d-29.82311828196326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95196f2e50edf619%3A0x6dbbda5f1c37a73e!2sIgreja%20Presbiteriana%20do%20Brasil%20-%20Sapucaia%20do%20Sul!5e0!3m2!1spt-BR!2sbr!4v1676334193254!5m2!1spt-BR!2sbr"
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
