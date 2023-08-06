@extends('site.layouts.main')

@section('titulo', 'Galeria de Vídeos')

@section('conteudo')
{{ Breadcrumbs::render('video') }}
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Galeria de Vídeos</h1>
            </div>
            <div class="row g-4">
                @foreach ($videos as $video)
                    @include('site.midia-video._list_item',['video'=>$video])
                @endforeach
                {{ $videos->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
