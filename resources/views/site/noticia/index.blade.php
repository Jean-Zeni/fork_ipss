@extends('site.layouts.main')

@section('titulo', 'Notícias')

@section('conteudo')
{{ Breadcrumbs::render('noticia') }}
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Notícias</h1>
            </div>
            <div class="row g-4">
                @foreach ($noticias as $noticia)
                    @include('site.noticia._list_item',['noticia'=>$noticia])
                @endforeach
                {{ $noticias->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
