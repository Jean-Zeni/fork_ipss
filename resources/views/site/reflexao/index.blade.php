@extends('site.layouts.main')

@section('titulo', 'Reflexões')

@section('conteudo')
{{ Breadcrumbs::render('reflexao') }}
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Reflexões</h1>
            </div>
            <div class="row g-4">
                @foreach ($reflexoes as $reflexao)
                    @include('site.reflexao._list_item',['reflexao'=>$reflexao])
                @endforeach
                {{ $reflexoes->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
