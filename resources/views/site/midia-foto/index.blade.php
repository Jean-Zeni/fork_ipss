@extends('site.layouts.main')

@section('titulo', 'Galeria de Fotos')

@section('conteudo')
    {{ Breadcrumbs::render('foto') }}
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Galeria de Fotos</h1>
            </div>
            <div class="row g-4">
                @foreach ($fotos as $foto)
                    @include('site.midia-foto._list_item',['foto'=>$foto])
                @endforeach
                {{ $fotos->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
