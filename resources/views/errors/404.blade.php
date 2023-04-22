@extends('site.layouts.main')

@section('titulo', 'Not Found 404')

@section('conteudo')
{{ Breadcrumbs::render('errors.404') }}
    <section>
        <br/>
        @if ($exception->getMessage())            
            <h2 class="text-center">
                <strong>{{$exception->getMessage()}}</strong>
            </h2>
        @endif
        <div class="container-fluid text-center">
            <hr/><br/>
            <span class="material-symbols-outlined">sentiment_dissatisfied</span>
            <p style="font-size:22px">
                OPS! Ocorreu algum problema.<br />
                Volte a navegar pelo site clicando no botão abaixo.
                <br /><br />
            </p>
            <div class="text-center"> 
                <a href="/" class="btn-padrao"><span class="material-symbols-outlined">home</span> Pagina Inicial</a>
            </div>
        </div>
    </section>
    <br><br><br><br>
@endsection
