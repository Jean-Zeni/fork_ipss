<?php
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(6));
//dd($analyticsData);
?>

@section('titulo', 'Igreja Presbiteriana de Sapucaia do Sul | Administrativo')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="container margin40T">
        <div class="row">
            <div class="card">
                <div class="row">
                    <div class="bg-warning">
                        <div class="padding20">
                            <h4 class="text-center">Olá! Seja bem-vindo à Área Administrativa do Site da IPSS!</h4>
                            <br><br>
                            <p class="text-center">Navegue pelo menu à cima para inserir conteúdos, de forma dinâmica, no site. Caso tenha cadastrado algum conteúdo errado,
                            basta excluí-lo e cadastrar novamente.
                            <br><br>
                            Dúvidas, envie mensagem (51) 98421-9721.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
